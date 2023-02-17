<style>
    .noscroll::-webkit-scrollbar {
        height: 5px;


    }

    .noscroll::-webkit-scrollbar-track {
        background: #20202000;
        border-radius: 15px;
    }

    /* Handle */
    .noscroll::-webkit-scrollbar-thumb {
        background: #28324e;
        border-radius: 15px;

    }

    /* Handle on hover */
    .noscroll::-webkit-scrollbar-thumb:hover {
        background: #162544;
    }
</style>

<header class="mb-4 fixed top-0 left-0 right-0 w-full z-10">
    <nav class=" bg-white  border-gray-200 px-4 lg:px-6 py-5 dark:bg-gray-800"">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ route('posts.index') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"><i
                        class="fa-solid fa-user-lock text-2xl mr-5"></i> PrivBlog</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:flex md:w-auto" id="navbar-default">
                
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('posts.index') }}"
                            class="{{ request()->routeIs('posts.index') ? 'dark:text-white' : 'dark:text-gray-400' }} block py-2 mt-1 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Inicio </a>
                    </li>
                    <li>
                        <a href="{{ route('search') }}"
                            class="{{ request()->routeIs('search') ? 'dark:text-white' : 'dark:text-gray-400' }} block py-2 mt-1 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">PrivBlogers</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}"
                            class="{{ request()->routeIs('contact.index') ? 'dark:text-white' : 'dark:text-gray-400' }} block py-2 mt-1 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Contactanos </a>
                    </li>
                    <li>
                        <a href="{{ route('profile',Auth::user()->username) }}"
                            class="{{ request()->routeIs('profile') ? 'dark:text-white' : 'dark:text-gray-400' }} block py-2 mt-1 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Mi perfil </a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="block py-2 mt-1 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li> --}}
                    <li>
                        <form action="{{ route('auth.logout') }}">
                            <button title="Cerrar sessión" type="submit" class="text-start w-full">
                                <span
                                    class="hidden md:block md:text-white hover:text-gray-200 bg-red-600 hover:bg-red-700 transition ease-in-out delay-50 hover:text-gray-100 rounded-full px-2 py-1">
                                    <i class="fa-solid fa-power-off"></i>
                                </span>
                                <span
                                    class="block py-2 mt-1 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-100 md:hidden w-full">
                                    Cerrar sesion
                                </span>
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="mb-32 relative"></div>
