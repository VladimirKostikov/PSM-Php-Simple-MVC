<?php $view->get_header(); ?>

<main>
   <div class="container mx-auto max-w-4xl p-2 m-7">
        <div class="bg-white p-5 rounded-2xl shadow-sm">
            <div class="border-b-2 pb-3 border-zinc-200 text-center text-sm">
               <span class="text-bold">Profile</span>
            </div>
            <div class="mt-5">
                <ul>
                    <li>Login: <?php echo $data["login"] ?></li>
                    <li>Email: <?php echo $data["email"] ?></li>
                    <li><a href="<?php echo $GLOBALS['route']->getRoute('exit') ?>" style="color: blue">Exit</a></li>
                </ul>
            </div>
        </div>
   </div>
</main>

<?php $view->get_footer(); ?>