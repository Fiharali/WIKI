<?php
require_once __DIR__ . '/../partials/navbarAdmin.php';

?>
<div class="p-4 sm:ml-64 bg-gary-800 h-screen">
    <div class='mt-36  gap-7  px-10 md:px-20 lg:px-36'>
    <form method="post" action="update-user">
                <input type="hidden" id="large-input" value="<?= $user->id?>" name="id" placeholder="add tag here" class="block w-full  p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" id="large-input" value="<?= $user->name?>" name="name" placeholder=" add name" class="block w-full  p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span class="text-gray-950"><?= isset($_SESSION['error_name']) ? $_SESSION['error_name']  : ''; $_SESSION['error_name'] = ''; ?></span>
                <input type="email" id="large-input" value="<?= $user->email?>" name="email" placeholder=" add name" class="block w-full mt-3 p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span class="text-gray-950"><?= isset($_SESSION['error_email']) ? $_SESSION['error_email']  : ''; $_SESSION['error_email'] = ''; ?></span>
                <select name="role"  class="block w-full mt-3 p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> 
                    <option value="">select role</option>
                    <option value="1" <?= ($user->rolename=='admin') ? 'selected': ''?> >Admin</option>
                    <option value="2" <?= ($user->rolename=='author') ? 'selected': ''?>>Author</option>
                </select>
                <span class="text-gray-950"><?= isset($_SESSION['error_role']) ? $_SESSION['error_role']  : ''; $_SESSION['error_role'] = ''; ?></span>
                <input type="submit" value="Update" class="block w-full p-3 mt-3 text-gray-900 border border-gray-300 rounded-lg bg-blue-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </form>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/../partials/footerAdmin.php';

    

    ?>