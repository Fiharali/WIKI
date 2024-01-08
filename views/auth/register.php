

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
    body{
        background-color: #e4e4e4;
        flex-shrink: 0;
        
    }
    *{
        font-family: 'Roboto', sans-serif;
    }
    .pageLogin{
       background-image: url('Public/imgs/login.jpg'); 
       background-size: cover;
       height: 93vh;
       border: 0px solid var(--color4, #000);
        /* backdrop-filter: blur(2px); */
        flex-shrink: 0;
        backdrop-filter: blur(4px);


    }
    .pageLogin form{
      background-color: #0003;
    }
   i{
    color :#000;
    
}

</style>
</head>



<body>
<div class="pageLogin md:p-10 pt-20 m-8  ">
  <form class="lg:w-2/4   md:w-2/4 w-full  mx-auto block  px-14 p-10  h-fit " action="user/register" method="post">
        <h3 class="text-5xl font-bold text-center  leading-9  ">SINGN UP</h3>   
       
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="mt-10  ">
            <label for="email" class="block mb-2 text-stone-50 text-sm font-medium text-gray-900 dark:text-white">first name</label>
            <input type="text" name="firstname" id="firstN" class="bg-gray-50 border w-1/2	h-14	 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="first name" required>
        </div>
        <div class="mt-10">
            <label for="email" class="block mb-2 text-stone-50 text-sm font-medium text-gray-900 dark:text-white">lastname</label>
            <input type="text" name="lastname" id="email" class="bg-gray-50 border w-64	h-14	 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@exemple.com" required>
        </div>
     </div>
     <div>
            <label for="email" class="block mb-2 text-stone-50 text-sm font-medium text-gray-900 dark:text-white">email</label>
            <input type="email" name="email" id="firstN" class="bg-gray-50 border w-64	h-14	 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="first name" required>
        </div>
    <div class="flex grid md:grid-cols-2 md:gap-6">
         <div class="mt-10">
            <label for="email" class="block mb-2 text-stone-50 text-sm font-medium text-gray-900 dark:text-white">password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border w-64	h-14	 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••" required>
        </div>
        <div class="mt-10">
            <label for="password" class="block mb-2 text-stone-50 text-sm font-medium text-gray-900 dark:text-white">verify password</label>
            <input type="password" name="verify" id="password" placeholder="••••••••" class="bg-gray-50 border w-64	h-14   border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-600 dark:border-gray-500 w-full dark:placeholder-gray-400 dark:text-white" required>
        </div>
    </div>
       
        <button type="submit" name="submit_register" class="w-full md:mt-10   text-white bg-blue-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">register</button>
        <div class="text-center md:mt-10 font-medium mx-auto block  text-gray-500 dark:text-gray-300">
        <i class="fa-brands fa-x-twitter  text-3xl "></i>
        <i class="fa-brands fa-facebook text-3xl "></i>
        <i class="fa-brands fa-square-instagram text-3xl "></i>
        </div>
</form>

</div>


</body>
</html>