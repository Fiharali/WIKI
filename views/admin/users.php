<?php
require_once __DIR__ . '/../partials/navbarAdmin.php';

?>
<div class="p-4 sm:ml-64 bg-gary-800 h-screen">
    <div class='mt-36  gap-7 '>
            <table class="w-full p-5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            User Email
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            User Role
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-2">
                                <?= $user->id ?>
                            </td>
                            <td class="px-6 py-2">
                                <?= $user->name ?>
                            </td>
                            <td class="px-6 py-2">
                                <?= $user->email ?>
                            </td>
                            <td class="px-6 py-2">
                            <?= ($user->rolename == 'admin') ? '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Admin</span>' : '<span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Author</span>' ?>
                            </td>
                            <td class="px-6 py-2">
                                <a href="delete-user?id=<?= $user->id ?>"><lord-icon src="https://cdn.lordicon.com/hjbrplwk.json" trigger="hover" style="width:30px;height:30px" colors="primary:#646e78,secondary:#c74b16,tertiary:#ebe6ef,quaternary:#3a3347">
                                    </lord-icon></a>
                                <a href="edit-user?id=<?= $user->id ?>"><lord-icon src="https://cdn.lordicon.com/ylvuooxd.json" trigger="hover" style="width:30px;height:30px">
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