<!--<header id="header" class="bg-gray-800 w-full px-6 py-5 z-50 fixed top-0 shadow-md transition-all transform ease-in-out duration-500">
    <div class="max-w-5xl mx-auto flex items-center flex-wrap justify-between">
        <div class="sm:mr-8">
            <a class="flex items-center" href="{{route('posts.index')}}">
                <span class="text-xl text-teal-400 font-semibold self-center">Personal Blog</span>
            </a>
        </div>
        <nav id="menu" class="order-last md:order-none items-center flex-grow w-full md:w-auto md:flex hidden mt-2 md:mt-0">
            <a href="#" target="_blank" rel="noopener" class="block mt-4 md:inline-block md:mt-0 font-medium text-slate-400 hover:text-teal-700 text-base mr-4">Hola</a>
        </nav>
        {{-- flex justify-between items-center --}}
        <form id="search" action="" class="order-last sm:order-none flex-row flex-grow items-center justify-end hidden sm:block mt-6 sm:mt-0">
            <input type="text" id="header-searchbox" name="search" placeholder="Search here ..." class="w-full lg:max-w-sm max-w-xs bg-slate-200 border border-transparent float-left focus:bg-white focus:border-slate-300 focus:outline-none h-10 p-4 placeholder-slate-500 rounded text-slate-700 text-sm">
            <button class="inline-block bg-teal-600 hover:bg-teal-700 active:bg-teal-800 focus-visible:ring ring-teal-300 text-white text-sm md:text-base font-semibold text-center rounded outline-none transition duration-100 ml-2 px-4 h-10"><i class="fa-solid fa-magnifying-glass text-white"></i>{{--🔍--}}</button>
        </form>
    </div>
</header>-->

<style>
.noscroll::-webkit-scrollbar{
  height:5px;
  

}

.noscroll::-webkit-scrollbar-track {
  background: #20202000;
  border-radius:15px;
}

/* Handle */
.noscroll::-webkit-scrollbar-thumb {
  background: #28324e;
  border-radius:15px;

}

/* Handle on hover */
.noscroll::-webkit-scrollbar-thumb:hover {
  background: #162544;
}

</style>

<header class="mb-4 fixed top-0 left-0 right-0 w-full z-10">
    <nav class=" bg-white  border-gray-200 px-4 lg:px-6 py-5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{route('posts.index')}}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"><i class="fa-solid fa-user-lock text-2xl mr-5"></i> Personal Blog</span>
            </a>
            <div class="w-auto justify-between items-center w-full md:flex md:w-auto md:order-1">
                <ul class="flex mt-4 font-medium flex-row space-x-8 md:mt-0 overflow-x-auto overflow-hidden noscroll">
                    <li>
                        <a href="{{route('posts.index')}}" class="{{request()->routeIs('posts.index') ? 'dark:text-white' : 'dark:text-gray-400'}} rounded bg-primary-700 bg-transparent text-primary-700 p-0 ">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact.index')}}" class="{{request()->routeIs('contact.index') ? 'dark:text-white' : 'dark:text-gray-400'}} rounded bg-primary-700 bg-transparent text-primary-700 p-0">
                            Contacto
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 hover:bg-transparent border-0 hover:text-primary-700 p-0 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:hover:bg-transparent dark:border-gray-700">Features</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 hover:bg-transparent border-0 hover:text-primary-700 p-0 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:hover:bg-transparent dark:border-gray-700">Team</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 hover:bg-transparent border-0 hover:text-primary-700 p-0 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                    <li>
                        <form action="{{route('auth.logout')}}">
                            <button type="submit" class="rounded-full px-1 bg-red-600 hover:bg-red-500 text-white">
                                <i class="fa-solid fa-power-off"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="mb-24 relative"></div>