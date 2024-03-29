<?php
$title = 'create movies';
ob_start();
if (isset($_SESSION['appName']) && isset($_SESSION['appUrl'])) {
    $appName = $_SESSION['appName'];
    $appUrl = $_SESSION['appUrl'];
}
?>


<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            movies
        </h2>
        <!-- Button to open the modal -->
        <div class="flex justify-end">
            <a href="<?php echo $appUrl . '/create-movies'; ?>" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add New Movie
            </a>

        </div>


        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Available movies
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Release Date</th>
                            <th class="px-4 py-3">Duration</th>
                            <th class="px-4 py-3">Genres</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($movies as $movie) : ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <?= $movie['title']; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?= $movie['release_date']; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?= $movie['duration_minutes']; ?> mins
                                </td>
                                <td class="px-4 py-3">
                                    <?= implode(', ', json_decode($movie['genres'])); ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- Add relevant actions, e.g., edit and delete buttons -->
                                        <!-- <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button> -->
                                        <form action="/movie-ticketing/delete_movie" method="post">
                                            <input type="hidden" name="movieId" value="<?php echo $movie['movie_id']; ?>">
                                            <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>

                                        <!-- ... existing code ... -->

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>


<?php $content = ob_get_clean();

require_once BASE_PATH . '/views/layouts/admin.php';
?>