<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-gray-200">
    <!-- Header -->
    <header class="mx-auto max-w-screen-xl">
        <nav class="flex justify-between items-center p-4">
            <div>
                <a href="/" class="text-[40px] font-semibold text-[#4E1BE4]">Job<span class="text-[#FFBB00]">AC</span></a>
            </div>
            <div>
                <a href="/" class="text-[24px] font-medium text-[#4E1BE4]">Sign up</a>
                <a href="/about" class="text-[24px] font-medium text-[#3B3B3B] bg-white rounded-full px-4 py-2 pb-3">Sign In</a>
                <a href="/about" class="text-[24px] font-medium text-white bg-[#4E1BE4] rounded-full px-6 py-2 pb-3">Post</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-screen-xl">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} My App</p>
    </footer>
</body>

</html>
