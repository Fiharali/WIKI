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
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        photo
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        status
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Writer
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        category
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wikisArchived as $wiki) { ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-2">
                            <?= $wiki->id ?>
                        </td>
                        <td class="px-6 py-2">
                            <?= $wiki->title ?>
                        </td>
                        <td class="px-6 py-2">
                            <?= $wiki->date ?>
                        </td>
                        <td class="px-6 py-2">
                            <?= $wiki->photo ?>
                        </td>

                        <td class="px-6 py-2">
                            <?= ($wiki->status == 'pending') ? '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>' : '<span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Approve</span>' ?>
                        </td>
                        <td class="px-6 py-2">
                            <?= $wiki->writer ?>
                        </td>
                        <td class="px-6 py-2">
                            <?= $wiki->category ?>
                        </td>

                        <td class="px-6 py-2">
                            <a href="restore-wiki?id=<?= $wiki->id ?>">
                                <lord-icon src="https://cdn.lordicon.com/afixdwmd.json" trigger="hover" style="width:25px;height:25px">
                                </lord-icon>
                            </a>
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