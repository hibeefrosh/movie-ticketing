<?php
$title = 'sales';
ob_start();
?>




<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Sales
        </h2>
        

        <!-- New Table -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            sales
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
                        <?php if (empty($Sales)) : ?>
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No recent sales found</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($Sales as $sale) : ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Display client information here -->
                                            <p class="font-semibold"><?= $sale['full_name'] ?></p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm"><?= $sale['movie_name'] ?></td>
                                    <td class="px-4 py-3 text-sm">$ <?= number_format($sale['price'], 2) ?></td>
                                    <td class="px-4 py-3 text-xs">
                                        <!-- Display payment status with appropriate styling -->
                                        <span class="px-2 py-1 font-semibold leading-tight <?= $sale['payment_status'] ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' ?> rounded-full dark:bg-green-700 dark:text-green-100">
                                            <?= $sale['payment_status'] ? 'Approved' : 'Denied' ?>
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