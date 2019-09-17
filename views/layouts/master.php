<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Test</title>
        <link rel="stylesheet" href="/css/tailwind.css">
    </head>
    <body>
        <header class="bg-gray-200 sm:flex sm:items-center sm:justify-between">
        <div class="flex justify-between px-4 py-3 xl:w-72 xl:justify-center xl:py-5" :class="{ 'xl:bg-gray-200': bg_gray_d }">
            <div>
                <a href="/" class="text-gray-900 hover:underline">
                    <!--<svg class="h-8 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>-->
                    <span class="font-semibold font-serif text-xl">LandBook</span>
                </a>
            </div>
            <div class="flex sm:hidden">
                <button @click="toggle" type="button" class="px-2 text-gray-500 hover:text-white focus:outline-none focus:text-white">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path v-if="!isOpen" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                        <path v-if="isOpen" d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                    </svg>
                </button>
            </div>
        </div>
        <nav class="sm:block sm:flex sm:items-center sm:pr-4 sm:px-4" :class="{ 'hidden': !isOpen, 'block': isOpen }">
            <div class="px-2 pt-2 pb-5 border-b border-gray-800 sm:flex sm:border-b-0 sm:py-0">
                <a href="#" class="block px-3 py-1 rounded leading-tight font-semibold text-white hover:bg-gray-400 sm:text-sm sm:px-2 text-gray-900">Vos propriétés</a>
                <a href="#" class="mt-3 block px-3 py-1 rounded leading-tight font-semibold  text-white hover:bg-gray-400 sm:mt-0 sm:text-sm sm:px-2 sm:ml-2 text-gray-900">Trips</a>
                <a href="#" class="mt-3 block px-3 py-1 rounded leading-tight font-semibold text-white hover:bg-gray-400 sm:mt-0 sm:text-sm sm:px-2 sm:ml-2 text-gray-900">Messages</a>
            </div>
            <div class="px-5 py-5 sm:py-0 sm:ml-3 sm:px-0">
                <div class="flex items-center">
                    <img class="h-10 w-10 object-cover rounded-full border-2 border-gray-600 sm:h-8 sm:w-8 xl:border-gray-300" src="/images/author-2.jpg" alt="">
                    <span class="ml-4 font-semibold text-gray-200 sm:hidden">Kuma Stéphane</span>
                </div>
                <div class="mt-5 sm:hidden">
                    <a href="#" class="block text-gray-400 hover:text-white">Paramètres du compte</a>
                    <a href="#" class="mt-3 block text-gray-400 hover:text-white">Support</a>
                    <a href="#" class="mt-3 block text-gray-400 hover:text-white">Déconnexion</a>
                </div>
            </div>
        </nav>
    </header>
        <?= $content ?>
    </body>
</html>