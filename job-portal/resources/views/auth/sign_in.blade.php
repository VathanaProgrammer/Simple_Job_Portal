<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login | JobAC')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
</head>

<body class="h-screen flex items-center justify-center bg-[#838383]">
    <div
        class="h-full w-full border-2 border-white lg:h-[720px] lg:w-[675px] backdrop-blur-md  rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <header class="text-start w-full mb-2">
            <a href="/" class="text-[40px] font-semibold text-white">Job<span class="text-[#FFBB00]">AC</span></a>
        </header>
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto px-10">
            @csrf
            <h1 class="text-[40px] font-medium text-white text-center">Welcome Back</h1>
            <p class="text-white text-[14px] font-medium text-center">
                Enter your emal and password to access your account.
            </p>

            <div class="flex flex-col mt-8">
                <label for="email" class="text-white text-[16px] font-medium">Email</label>
                <input type="email"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="email" name="email" placeholder="Enter your email" required>\

                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="password" class="text-white text-[16px] font-medium">Password</label>
                <input type="password"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="password" name="password" placeholder="Enter your password" required>

                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between">
                <div class="flex justify-start items-center w-1/2">
                    <input type="checkbox" id="remember_me" name="remember_me" class="mr-2">
                    <label for="remember_me" class="text-white text-[14px] font-medium">Remember me</label>
                </div>
                <a class="text-white text-[14px] font-medium">Forgot Password?</a>
            </div>
            <button type="submit"
                class="bg-[#004373] mt-2 w-full text-white text-[16px] font-medium rounded-md px-6 py-2 hover:bg-[#3b16b8] transition duration-300">
                Sign In
            </button>

        </form>

    </div>

</body>

</html>
