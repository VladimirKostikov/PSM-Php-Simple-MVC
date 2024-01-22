<?php $view->get_header(); ?>

<main>
   <div class="container mx-auto max-w-4xl p-2 m-7">
        <div class="bg-white p-5 rounded-2xl shadow-sm">
            <div class="border-b-2 pb-3 border-zinc-200 text-center text-sm">
               <span class="text-bold">Login</span>
            </div>
            <div class="mt-5">
               <div id="registration">
                  <h1 class="text-xl text-center text-semibold">Authorization</h1>
                  <p class="text-center">If you don't have an account, <a href="/register" class="text-indigo-400">return to the registration page</a></p>
               </div>
               <div class="mt-1">
                  <form action="/post/login" class="pt-6 pb-3 mb-4" method="POST">
                     <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="login">Your login <b class="text-rose-700">*</b></label>
                        <input type="text" name="login" id="login" placeholder="Enter login" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                     </div>
                     <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="login">Your password <b class="text-rose-700">*</b></label>
                        <input type="text" name="login" id="login" placeholder="Enter password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                     </div>
                     <div>
                        <input type="submit" name="login" id="login" value="Log In" class="w-full p-3 bg-indigo-400 rounded text-white" style="cursor: pointer">
                     </div>
                  </form>
               </div>
               <div class="mt-1">
                  <a href="/register" class="block w-full p-3 bg-indigo-400 rounded text-white text-center">Return to the registration page</a>
               </div>

               <?php var_dump($data) ?>

               <?php if(!empty($data) && $data['error']) { ?>
               <div class="p-5 bg-pink-600 text-white mt-5 text-center">
                  <span>Authorization error: <?php echo $data['error'] ?></span>
               </div>
               <?php } ?>
            </div>
        </div>
   </div>
</main>

<?php $view->get_footer(); ?>