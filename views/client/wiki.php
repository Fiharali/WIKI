<?php
require_once __DIR__ . '/../partials/navbar.php';

?>
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="md:flex    p-10 ">
        <div class="bg-slate-800 p-10 mx-6 basis-1 md:basis-3/4 mt-10 text-slate-50">
            <img src="/wiki2/public/img/<?= $wiki->photo ?>" alt="image"  class="mx-auto"/>
            <h1 class="text-slate-50 text-center text-4xl pt-3 font-bold my-4"><?=$wiki->title?></h1>
            <p><?=$wiki->content?></p>
            <div class="flex relative mt-10">
                <span><?=$wiki->date?></span> 
                <span class="absolute bottom-0 right-10 bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300"><?=$wiki->tagNames?></span> 

                
            </div>
        </div>
        <div class=" basis-1 md:basis-1/4 p-6 bg-slate-800 text-slate-50 mt-10  mx-6 max-h-min">
        <div class="flex mt-10 ">
                <img class="w-1/4 basis-1/4 rounded-full"  src="/wiki2/public/img/profile.jpg">
                <span class="basis-2/3 ms-2">
                    <h2 class="text-2xl mt-3"><?= $wiki->username ?> </h2>
                    <!-- <a href='#'>VIEW PROFILE</a> -->
                </span>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/../partials/footer.php';

?>