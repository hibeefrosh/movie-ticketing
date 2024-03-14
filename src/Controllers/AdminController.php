<?php

class AdminController
{
    private $pdo;

    public function __construct()
    {
        $config = require BASE_PATH . '/config/config.php';
        $dbConfig = $config['database'];

        try {
            $this->pdo = new PDO(
                "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
                $dbConfig['username'],
                $dbConfig['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function index()
    {
        // Display the login form
        include BASE_PATH . '/views/admin/login.php';
    }

    public function authenticate()
    {
        // Handle form submission and authentication
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input
            $email = $_POST['email'];
            $password = $_POST['password'];


            // Validate user input
            $errors = [];

            if (empty($email) || empty($password)) {
                $errors[] = 'Email and password are required.';
            }

            if (empty($errors)) {
                $stmt = $this->pdo->prepare("SELECT id, password FROM admin WHERE email = ?");
                $stmt->execute([$email]);
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                echo $admin;

                if ($admin && password_verify($password, $admin['password'])) {
                    // Authentication successful
                    $_SESSION['admin'] = $admin;

                    header("Location: /movie-ticketing/admindashboard");
                    exit;
                } else {
                    $errors[] = 'Invalid email or password.';
                }
            }

            $_SESSION['login_errors'] = $errors;

            // Redirect back to the login page with errors
            header("Location: /movie-ticketing/login");
            exit;
        }
    }

    public function getMovieCount()
    {
        $query = "SELECT COUNT(*) as movie_count FROM movies";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC)['movie_count'];
    }

    public function getTotalRevenue()
    {
        $query = "SELECT SUM(price) as total_revenue FROM tickets WHERE payment_status = 'complete'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC)['total_revenue'];
    }

    public function getMostViewedMovieName()
    {
        $query = "SELECT movie_name
              FROM tickets
              GROUP BY movie_name
              ORDER BY COUNT(*) DESC
              LIMIT 1";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['movie_name'] : 'Unknown Movie';
    }


    public function getTotalTicketsSold()
    {
        $query = "SELECT COUNT(*) as total_tickets_sold FROM tickets WHERE payment_status = 'complete'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC)['total_tickets_sold'];
    }

    public function getRecentSales()
    {
        $query = "SELECT * FROM tickets ORDER BY created_at DESC LIMIT 10";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSales()
    {
        $query = "SELECT * FROM tickets ORDER BY created_at DESC";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function dashboard()
    {
        // Fetch counts
        $movieCount = $this->getMovieCount();
        $totalRevenue = $this->getTotalRevenue();
        $totalTicketsSold = $this->getTotalTicketsSold();
        $mostViewedMovieName = $this->getMostViewedMovieName();

        // Fetch recent sales
        $recentSales = $this->getRecentSales();

        // Display the dashboard
        include BASE_PATH . '/views/admin/dashboard.php';
    }

    public function movies()
    {
        // Fetch all movies from the database
        $query = "SELECT * FROM Movies";
        $statement = $this->pdo->query($query);
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Display the movies on the movies page
        include BASE_PATH . '/views/admin/movies.php';
    }


    public function submitMovieForm()
    {


        // Validate user input
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input
            $movieName = $_POST['movieName'];
            $releaseDate = $_POST['releaseDate'];
            $duration = $_POST['duration']; // Assuming the form field is named 'durationMinutes'
            $genres = $_POST['genres']; // An array of selected genres
            $appearOn = $_POST['appearOn']; // An array of selected appear on options
            $description = $_POST['description'];
            $imdbRating = $_POST['imdbRating'];
            $price = $_POST['price'];



            // Validate user input
            if (empty($movieName) || empty($releaseDate) || empty($duration) || empty($genres) || empty($appearOn) || empty($description) || empty($imdbRating) || empty($price)) {
                $errors[] = 'All fields are required.';
            }

            if (empty($errors)) {
                // Check if the "file" key exists in $_FILES
                if (isset($_FILES["picture"])) {
                    $targetDir = "uploads/";
                    $targetFile = $targetDir . uniqid('', true) . '_' . basename($_FILES["picture"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    // Check if image file is a valid image
                    $check = getimagesize($_FILES["picture"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $errors[] = 'File is not an image.';
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["picture"]["size"] > 500000) {
                        $errors[] = 'Sorry, your file is too large.';
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!in_array($imageFileType, $allowedFormats)) {
                        $errors[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $errors[] = 'Sorry, your file was not uploaded.';
                    } else {
                        // Move the file to the specified directory
                        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
                            // File uploaded successfully, now insert data into the database

                            // SQL statement to insert into Movies table (modify as needed)
                            $query = "INSERT INTO Movies (title, release_date, duration_minutes, genres, appear_on, description, imdb_rating, price, picture_url) VALUES (:title, :release_date, :duration_minutes, :genres, :appear_on, :description, :imdb_rating, :price, :picture_url)";

                            // Prepare the SQL statement
                            $statement = $this->pdo->prepare($query);

                            // Bind parameters using parameterized queries
                            $statement->bindParam(':title', $movieName);
                            $statement->bindParam(':release_date', $releaseDate);
                            $statement->bindParam(':duration_minutes', $duration);
                            $statement->bindParam(':genres', json_encode($genres));
                            $statement->bindParam(':appear_on', json_encode($appearOn));
                            $statement->bindParam(':description', $description);
                            $statement->bindParam(':imdb_rating', $imdbRating);
                            $statement->bindParam(':price', $price);
                            $statement->bindParam(':picture_url', $targetFile);

                            // Execute the statement
                            if ($statement->execute()) {
                                $_SESSION['form_message'] = 'Form submitted successfully!';
                                header("Location: /movie-ticketing/movies");
                                exit;
                            } else {
                                $errors[] = 'Error storing data in the database.';
                            }
                        } else {
                            $errors[] = 'Sorry, there was an error uploading your file.';
                        }
                    }
                } else {
                    $errors[] = 'File is missing.';
                }
            }

            // Store all errors in the session
            $_SESSION['form_errors'] = $errors;

            // Redirect back to the form page
            header("Location: /movie-ticketing/create-movies");
            exit;
        }
    }


    public function addmovies()
    {
        // Display the login form
        include BASE_PATH . '/views/admin/addnew-movie.php';
    }

    public function sales()
    {
        $Sales = $this->getAllSales();
      
        include BASE_PATH . '/views/admin/sales.php';
    }
    public function deleteMovie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movieId = $_POST['movieId'];

            // Validate movie ID (add more validation as needed)
            if (!is_numeric($movieId) || $movieId <= 0) {
                echo 'Invalid movie ID.';
                exit;
            }

            // Implement your logic to delete the movie from the database
            // Example:
            $query = "DELETE FROM Movies WHERE movie_id = :movie_id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':movie_id', $movieId);
            $success = $statement->execute();

            if ($success) {
                // Redirect on success
                header("Location: /movie-ticketing/movies");
                exit;
            } else {
                // Handle deletion failure
                echo 'Failed to delete the movie.';
            }
        } else {
            // Handle invalid request method
            echo 'Invalid request method.';
        }
    }

    public function logout()
    {
        // Start the session
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page or any other page
        header("Location: /movie-ticketing/login");
        exit;
    }
}
