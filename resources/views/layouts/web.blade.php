<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/web.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white border-b border-gray-100 py-3 text-md text-gray-900">
            <div class="container flex items-center">
                <a class="text-lg mr-4 whitespace-nowrap font-semibold" href="/">
                    WOS Dental Clinic
                </a>

                <div class="w-full flex align-item-center justify-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex">
                        @auth
                            <li class="mr-4">
                                <a href="{{ route('admin.users') }}">Users</a>
                            </li>
                            <li class="mr-4">
                                <a href="/admin/services">Services</a>
                            </li>
                            <li class="mr-4">
                                <a href="/admin/schedules">Schedules</a>
                            </li>
                            <li class="mr-4">
                                <a href="/admin/appointments">Appointments</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="flex">
                        <!-- Authentication Links -->
                        @guest
                            <li class="ml-4">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="ml-4">
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest
                        @auth
                            <li class="ml-4 relative">
                                <a
                                    id="navbarDropdown"
                                    class=""
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ auth()->user()->name }}
                                </a>

                                <div class="absolute bg-white border border-gray-100 w-full">
                                    <button
                                        class="py-1 px-2"
                                        form="logout-form"
                                    >
                                        Logout
                                    </button>

                                    <form
                                        id="logout-form"
                                        class="d-none"
                                    >
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer footer-transparent d-print-none mt-auto py-3">
            <div class="container-xl">
                <div class="row text-center align-items-center justify-content-center">
                    <div class="text-lg mb-1">Visit / Contact us</div>
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            <a
                                href="#"
                                class="link-secondary"
                            >
                                Mondays - Saturdays: 9:00am - 5:00pm
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="#"
                                class="link-secondary"
                            >
                                1521 Ma. Clara St. Sta. Cruz, Manila
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="#"
                                class="link-secondary"
                            >
                                1532-D Nisus Bldg. A.H. Lacson St. Sta. Cruz, Manila
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="tel:89499225"
                                class="link-secondary"
                            >
                                8949-9225
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="tel:09276136426"
                                class="link-secondary"
                            >
                                0927-613-6426
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
