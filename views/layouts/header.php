<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple MVC Panel</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-slate-100">

<header class="bg-white p-5 shadow-lg shadow-sky-50 border-t-4 border-blue-600">
    <nav class="mx-auto flex max-w-4xl items-center justify-between p-2">
        <div class="flex lg:flex-1">
            <a href="<?php echo $GLOBALS["route"]->getRoute('welcome'); ?>" class="text-xl text-blue-600 font-semibold">
                PSM
            </a>
        </div>
        <div class="flex lg:flex-2 gap-10">
            <a href="/docs" class="hover:text-indigo-400 text-sm leading-6 text-gray-900">Docs</a>
            <a href="<?php echo $GLOBALS["route"]->getRoute('profile'); ?>" class="hover:text-indigo-400 text-sm leading-6 text-gray-900">Profile</a>
            <a href="https://github.com/VladimirKostikov/Simple-Php-MVC" target="_blank" class="hover:text-indigo-400 text-sm leading-6 text-gray-900 flex gap-3">GitHub</a>
        </div>
    </nav>
</header>