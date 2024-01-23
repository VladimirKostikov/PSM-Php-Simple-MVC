<?php $view->get_header(); ?>

<main>
   <div class="container mx-auto max-w-4xl p-2 m-7">
        <div class="bg-white p-5 rounded-2xl shadow-sm">
            <div class="border-b-2 pb-3 border-zinc-200 text-center text-sm">
               <span class="text-bold">Main page</span>
            </div>
            <div class="mt-5 mb-5">
               <div class="mt-10 ">
                   <div class="mb-10">
                     <img src="/public/img/logo.png" alt="" class="w-60 mx-auto ">
                   </div>
                   <div class="text-center">
                     <div>
                        <h1 class="text-3xl text-blue-600 font-bold mb-3">PSM - PHP Simple MVC</h1>
                        <p>Made by <a href="https://github.com/VladimirKostikov" class="text-blue-600 font-semibold" style="text-decoration: underline;">Vladimir Kostikov</a></p>
                     </div>
                     <div class="mt-10">
                        <a href="https://github.com/VladimirKostikov/PSM-Php-Simple-MVC/blob/main/README.md" target="_blank" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View docs</a>
                     </div>
                  </div>
               </div>
            </div>
        </div>
   </div>
</main>

<?php $view->get_footer(); ?>