<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200">
    <!-- Header -->
    <header class="mx-auto max-w-screen-xl">
        <nav class="flex justify-between items-center p-4">
            <div>
                <a href="/" class="text-[40px] font-semibold text-[#4E1BE4]">
                    Job<span class="text-[#FFBB00]">AC</span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @guest
                    <!-- Only show if user is NOT logged in -->
                    <a href="{{ route('create_account') }}" class="text-[24px] font-medium text-[#4E1BE4]">Sign up</a>
                    <a href="{{ route('login') }}" class="text-[24px] font-medium text-[#3B3B3B] bg-white rounded-full px-4 py-2 pb-3">
                        Sign In
                    </a>
                @endguest

                @auth
                    <!-- Display username -->
                    <span class="text-[20px] font-medium text-gray-800">Hello, {{ Auth::user()->name }}</span>

                    <!-- Post button -->
                    <a href="" class="text-[24px] font-medium text-white bg-[#4E1BE4] rounded-full ms-2 px-6 py-2 pb-3">
                        Post
                    </a>

                    <!-- Logout button -->
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="text-[24px] font-medium text-[#3B3B3B] bg-white rounded-full px-4 py-2 pb-3">
                       Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-screen-xl">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center p-4 mt-10 text-gray-500">
        <p>&copy; {{ date('Y') }} My App</p>
    </footer>
</body>

</html>
