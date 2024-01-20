<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
                
            }
        }
        }
    </script>
    
</head>
<body class="bg-slate-100">

<header class="bg-white p-5 shadow-lg shadow-sky-50 border-t-4 border-indigo-400">
    <nav class="mx-auto flex max-w-4xl items-center justify-between p-2">
        <div class="flex lg:flex-1">
            <a href="/" class="text-xl font-semibold">Simple MVC Panel</a>
        </div>
        <div class="flex lg:flex-2 gap-10">
            <a href="#" class="hover:text-indigo-400 text-sm leading-6 text-gray-900">Items</a>
            <a href="/docs" class="hover:text-indigo-400 text-sm leading-6 text-gray-900">Docs</a>
            <a href="/profile" class="hover:text-indigo-400 text-sm leading-6 text-gray-900">Profile</a>
            <a href="https://github.com/VladimirKostikov/Simple-Php-MVC" target="_blank" class="hover:text-indigo-400 text-sm leading-6 text-gray-900 flex gap-3">GitHub</a>
        </div>
    </nav>
</header>