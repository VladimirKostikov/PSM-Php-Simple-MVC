<?php $view->get_header(); ?>

<main>
   <div class="container mx-auto max-w-4xl p-2 m-7">
        <div class="bg-white p-5 rounded-2xl shadow-sm">
            <div class="border-b-2 pb-3 border-zinc-200 text-center text-sm">
               <span class="text-bold">Registration</span>
            </div>
            <div class="mt-5">
               <div id="registration">
                  <h1 class="text-xl text-center text-semibold">New account</h1>
                  <p class="text-center">You are not authorized, create an account or register</p>
               </div>
               <div class="mt-1">
                  <form action="<?php echo $GLOBALS["route"]->getRoute('post_reg'); ?>" class="pt-6 pb-3 mb-4">
                     <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="login">Your login <b class="text-rose-700">*</b></label>
                        <input type="text" name="login" id="login" placeholder="Enter login" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                     </div>
                     <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Your email <b class="text-rose-700">*</b></label>
                        <input type="text" name="login" id="email" placeholder="Enter email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                     </div>
                     <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="login">Your password <b class="text-rose-700">*</b></label>
                        <input type="text" name="login" id="login" placeholder="Enter password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                     </div>
                     <div>
                        <input type="submit" name="login" id="login" value="Register" class="w-full p-3 bg-indigo-400 rounded text-white" style="cursor: pointer">
                     </div>
                  </form>
               </div>
               <div class="mt-1">
                  <a href="<?php echo $GLOBALS["route"]->getRoute('login'); ?>" class="block w-full p-3 bg-indigo-400 rounded text-white text-center">Already have an account? Log in</a>
               </div>
            </div>
        </div>
   </div>
</main>

<?php $view->get_footer(); ?>