<?php
require_once __DIR__ . '/../partials/navbarAdmin.php';

?>
<div class="p-4 sm:ml-64 bg-gary-800 h-screen">

    <div class='mt-36 flex gap-7 flex-wrap md:flex-nowrap'>

        <div class="basis-1/2">
            <form method="post" action="category">
                <input type="text" id="large-input" name="categoryName" placeholder="add tag here" class="block w-full  p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="submit" value="Save" class="block w-full p-3 mt-3 text-gray-900 border border-gray-300 rounded-lg bg-blue-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </form>
        </div>
        <div class="basis-1/2">
            <table class="w-full p-5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Tag Name
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cats as $cat) { ?>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-2">
                                <?= $cat->id ?>
                            </td>
                            <td class="px-6 py-2">
                                <?= $cat->name ?>

                            </td>
                            <td class="px-6 py-2">
                                <a href="delete-category?id=<?= $cat->id ?>"><lord-icon src="https://cdn.lordicon.com/hjbrplwk.json" trigger="hover" style="width:30px;height:30px"   colors="primary:#646e78,secondary:#c74b16,tertiary:#ebe6ef,quaternary:#3a3347" >
                                    </lord-icon></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/../partials/footerAdmin.php';

    ?>