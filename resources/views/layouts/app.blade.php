<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <title>@yield('title', 'Book Exchange Application')</title>
</head>

<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <a href="{{ route('home.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="text-2xl font-semibold dark:text-white"> 📚 Book Exchange Application</span>
            </a>

            <button
                class="md:hidden inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                data-collapse-toggle="navbar-dropdown" type="button" aria-controls="navbar-dropdown"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15m-7 6h7" />
                </svg>
            </button>

            <div class="md:block w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col md:flex-row md:space-x-8 font-medium mt-4 md:mt-0 p-4 md:p-0 border border-gray-100 rounded-lg bg-gray-50 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 rtl:space-x-reverse">
                    <li>
                        {{-- Link to Home using the named route 'home.index' --}}
                        <a href="{{ route('home.index') }}"
                            class="block py-2 px-3 text-white bg-green-700 rounded md:bg-transparent md:text-red-700 dark:bg-green-600 md:dark:bg-transparent md:dark:text-red-500"
                            aria-current="page">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home.about') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('book.index') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                            Books
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('book.add') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                            Add a book
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-green-700 text-white py-5">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-semibold">@yield('subtitle', 'A Laravel App')</h2>
        </div>
    </header>
    <main class="container mx-auto my-8">
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center">
            <small>&copy; {{ date('Y') }} Book Exchange Application. All rights reserved.</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>

</html>
