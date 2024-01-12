<?php
require_once __DIR__ . '/../partials/navbar.php';

?>
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="md:flex    p-10 ">
        <div class="bg-slate-800 p-10 mx-6 basis-1 md:basis-3/4 mt-10 text-slate-50">
            <img src="/wiki2/public/img/<?= $wiki->photo ?>" alt="image" class="mx-auto" />
            
            <h1 class="text-slate-50 text-center text-4xl pt-3 font-bold my-4"><?= $wiki->title ?> (<?= $wiki->category ?>)</h1>
            <p><?= $wiki->content ?></p>
            <div class="flex relative mt-10">
                <span><?= $wiki->date ?></span>
                <span class="absolute bottom-0 right-10 bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300"><?= $wiki->tagNames ?></span>


            </div>
        </div>
        <div class=" basis-1 md:basis-1/4 p-6 bg-slate-800 text-slate-50 mt-10  mx-6 max-h-min">
            <div class="flex mt-10 ">
                <img class="w-1/4 basis-1/4 rounded-full" src="/wiki2/public/img/profile.jpg">
                <span class="basis-2/3 ms-2">
                    <h2 class="text-2xl mt-3"><?= $wiki->username ?> </h2>
                    <!-- <a href='#'>VIEW PROFILE</a> -->
                </span>
            </div>
            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $wiki->writer) { ?>
                <button  data-modal-target="default-modal2" data-modal-toggle="default-modal2"  type="button" class=" text-center mt-8 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full">Edit</button> <br>
                <a href="delete-wiki?id=<?= $wiki->id ?>" type="button" class=" text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full">Delete</a>
            <?php } ?>
        </div>

    </div>

    <div id="default-modal2" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white ">
                            Add new Wiki
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal2">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form class="p-4 md:p-5" method="post" enctype="multipart/form-data" action="update-wiki">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="hidden" name="id" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your title" value="<?= $wiki->id ?>">
                                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your title" value="<?= $wiki->title ?>">
                                </div>
                                <div class="col-span-2">
                                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                    <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" accept="image/*">
                                </div>
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="category">
                                        <option value="">Choose Category</option>
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category->id ?> "  <?= ($wiki->categoryId == $category->id) ?   'selected' :'' ?> ><?= $category->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                    <select class=" select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 " name="tags[]" multiple >
                                        <option value="">Choose Tgs</option>
                                        <?php foreach ($tags as $tag) { ?>
                                            <option value="<?= $tag->id ?>" <?php if (in_array($tag->id, explode(',', $wiki->tagNamesId))) echo 'selected'; ?> ><?= $tag->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">wiki content </label>
                                    <textarea id="content" rows="4" class=" custom-textarea block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write wiki content here" name="content" > <?= $wiki->content ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
require_once __DIR__ . '/../partials/footer.php';

?>