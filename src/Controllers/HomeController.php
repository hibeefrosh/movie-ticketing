<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class HomeController
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
    public function getFrontPageMovies()
    {
        // Fetch front page movies based on appear_on JSON field
        $query = "SELECT * FROM Movies WHERE JSON_CONTAINS(appear_on, '\"Front Page\"')";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $frontPageMovies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $frontPageMovies;
    }

    public function getLatestMovies()
    {
        // Fetch latest movies based on the release date, assuming you have a 'release_date' column
        $query = "SELECT * FROM Movies ORDER BY release_date DESC LIMIT 10"; // Adjust the LIMIT based on how many latest movies you want to fetch
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $latestMovies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $latestMovies;
    }

    public function getUpcomingEvents()
    {
        // Fetch upcoming events based on the event date, assuming you have an 'event_date' column
        $currentDate = date('Y-m-d');
        $query = "SELECT * FROM Movies WHERE release_date > :currentDate ORDER BY release_date ASC LIMIT 10"; // Adjust the LIMIT based on how many upcoming events you want to fetch
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
        $statement->execute();
        $upcomingEvents = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $upcomingEvents;
    }

    public function getJustArrivedMovies()
    {
        // Fetch just arrived movies based on the arrival date within the last 30 days, assuming you have an 'arrival_date' column
        $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));
        $query = "SELECT * FROM Movies WHERE release_date >= :thirtyDaysAgo ORDER BY release_date DESC LIMIT 10"; // Adjust the LIMIT based on how many just arrived movies you want to fetch
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':thirtyDaysAgo', $thirtyDaysAgo, PDO::PARAM_STR);
        $statement->execute();
        $justArrivedMovies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $justArrivedMovies;
    }

    public function getFreeMovies()
    {
        // Fetch free movies based on 'Free' presence in the JSON 'appear_on' field
        $query = "SELECT * FROM Movies WHERE JSON_CONTAINS(appear_on, '\"Free Movies\"')";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $freeMovies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $freeMovies;
    }

    public function directorChoiceMovies()
    {
        // Fetch movies based on the presence of the specified director in the JSON 'appear_on' field
        $query = "SELECT * FROM Movies WHERE JSON_CONTAINS(appear_on, '\"Directors Choice\"')";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $directorChoiceMovies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $directorChoiceMovies;
    }




    public function index()
    {
        $frontPageMovies = $this->getFrontPageMovies();
        $latestMovies = $this->getLatestMovies();
        $freeMovies = $this->getFreeMovies();
        $directorChoice = $this->directorChoiceMovies();
        $upcomingEvents = $this->getUpcomingEvents();
        $justArrived = $this->getJustArrivedMovies();
        $bestMovieDetails = $this->getBestMovieOfTheMonth();

        include __DIR__ . '/../../views/app/home.php';
    }

    public function about()
    {
        // Your logic for the about route

        // For simplicity, we're just including a view
        include __DIR__ . '/../../views/app/about.php';
    }

    public function services()
    {
        // Your logic for the about route

        // For simplicity, we're just including a view
        include __DIR__ . '/../../views/app/services.php';
    }

    public function buyTicket()
    {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect form data
            $full_name = $_POST['full_name'];
            $card_number = $_POST['card_number'];
            $cardholder_name = $_POST['cardholder_name'];
            $expiration_date = $_POST['expiration_date'];
            $cvv = $_POST['cvv'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $movie_id = $_POST['movie_id'];

            if (
                empty($full_name) || empty($card_number) || empty($cardholder_name) || empty($expiration_date) || empty($cvv) || empty($email) || empty($phone_number) || empty($movie_id)
            ) {
            }
            $seat_number = $this->generateRandomSeatNumber();
            $priceAndName = $this->calculatePrice($movie_id);
            $price = $priceAndName['price'];
            $movie_name = $priceAndName['title'];

            $stmt = $this->pdo->prepare("INSERT INTO tickets (full_name, email, phone_number, movie_id,movie_name, card_number, cardholder_name, expiration_date, cvv, price, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, 'complete')");

            $stmt->execute([$full_name, $email, $phone_number, $movie_id, $movie_name, $card_number, $cardholder_name, $expiration_date, $cvv, $price]);
            // Send confirmation email using PHPMailer
            $this->sendConfirmationEmail($email, $full_name, $movie_name, $price, $seat_number);
            $_SESSION['booking_success'] = true;
            header("Location: /movie-ticketing");
            exit();
        }
    }

    private function sendConfirmationEmail($email, $full_name, $movie_name, $price, $seat_number)
    {
        $subject = "Movie Ticket Booking Confirmation";
        $message = "Thank you for booking a ticket for '$movie_name'. Your payment of  ₦$price was successful. Your seat number is $seat_number.";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ibrahimsobande191@gmail.com';
        $mail->Password = 'ousijquyerrryqly';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('movieticketing@gmail.com', 'movie ticketing');
        $mail->addAddress($email, $full_name);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if ($mail->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    }
    private function generateRandomSeatNumber()
    {
        // Generate a random seat number, adjust the range as needed
        return rand(1, 100);
    }
    private function calculatePrice($movie_id)
    {
        // Fetch movie details from the database
        $stmt = $this->pdo->prepare("SELECT title, price FROM movies WHERE movie_id = ?");
        $stmt->execute([$movie_id]);
        $movie = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($movie) {
            $price = $movie['price'];
            $movie_name = $movie['title'];
            return ['price' => $price, 'title' => $movie_name];
        } else {
            // Handle the case where the movie is not found
            return ['price' => 0, 'title' => 'Unknown Title'];
        }
    }

    public function getBestMovieOfTheMonth()
    {
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = "SELECT m.*
              FROM movies m
              JOIN tickets t ON m.title = t.movie_name
              WHERE MONTH(t.created_at) = :currentMonth AND YEAR(t.created_at) = :currentYear
              GROUP BY m.movie_id
              ORDER BY COUNT(*) DESC
              LIMIT 1";

        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':currentMonth', $currentMonth, PDO::PARAM_INT);
        $statement->bindParam(':currentYear', $currentYear, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : ['movie_name' => 'Unknown Movie', 'other_details' => 'Unknown Details'];
    }





    public function showContactForm()
    {
        // Your logic for the about route

        // For simplicity, we're just including a view
        include __DIR__ . '/../../views/app/contact.php';
    }
}
