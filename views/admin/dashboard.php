<?php
$title = 'Admin dashboard';
ob_start();
?>




<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total movies
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?= $movieCount ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Revenue
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        ₦ <?= number_format($totalRevenue, 2) ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Tickets Sold
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?= $totalTicketsSold ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2l1.37 3.73 3.88.34-2.96 2.5.88 3.93L10 12l-3.16 1.5.88-3.93-2.96-2.5 3.88-.34L10 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Most Viewed Movie
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?= $mostViewedMovieName ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- New Table -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Recent sales
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Movie Name</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php if (empty($recentSales)) : ?>
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No recent sales found</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($recentSales as $sale) : ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Display client information here -->
                                            <p class="font-semibold"><?= $sale['full_name'] ?> </p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm"><?= $sale['movie_name'] ?></td>
                                    <td class="px-4 py-3 text-sm"> ₦ <?= number_format($sale['price'], 2) ?></td>
                                    <td class="px-4 py-3 text-xs">
                                        <!-- Display payment status with appropriate styling -->
                                        <span class="px-2 py-1 font-semibold leading-tight <?= $sale['payment_status'] ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' ?> rounded-full dark:bg-green-700 dark:text-green-100">
                                            <?= $sale['payment_status']  ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm"><?= date('m/d/Y', strtotime($sale['created_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>


                </table>
            </div>

        </div>


    </div>
</main>




<?php $content = ob_get_clean();

require_once BASE_PATH . '/views/layouts/admin.php';
?>