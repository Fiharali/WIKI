<?php
require_once __DIR__ . '/../partials/navbarAdmin.php';

?>
<div class="p-4 sm:ml-64 bg-gary-800 h-screen">

    <div class='mt-36 flex gap-7 flex-wrap md:flex-nowrap'>
        <div class="lg:basis-1/3 md:basis-2/3 basis-1 max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><?= $totalWikis ?></h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Wikis </p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                    66%
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                
            </div>
        </div>
        <div class="lg:basis-1/3 md:basis-2/3 basis-1 max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><?= $totalUsers ?></h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users </p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                    12%
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                
            </div>
        </div>
        <div class="lg:basis-1/3 md:basis-2/3 basis-1 max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><?= $totalCategories ?></h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Category </p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                    5%
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                
            </div>
        </div>
        <!-- <div class="basis-1/3">d</div>
        <div class="basis-1/3">d</div> -->
    </div>

    <?php
    require_once __DIR__ . '/../partials/footerAdmin.php';

    ?>