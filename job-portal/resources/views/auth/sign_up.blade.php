<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login | JobAC')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen flex items-center justify-center bg-[#838383]">
    <div
        class="h-full w-full border-2 border-white lg:h-[720px] lg:w-[675px] backdrop-blur-md  rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <header class="text-start w-full mb-2">
            <a href="/" class="text-[40px] font-semibold text-white">Job<span class="text-[#FFBB00]">AC</span></a>
        </header>
        <form action="{{ route('create_account')}}" method="POST" enctype="multipart/form-data" class="w-full mx-auto px-10">
            @csrf
            <h1 class="text-[40px] font-medium text-white text-center">Create your account</h1>
            <p class="text-white text-[14px] font-medium text-center">
                Enter your personal details to create your account.
            </p>

            <div class="flex flex-col mt-4">
                <label for="username" class="text-white text-[16px] font-medium">Username</label>
                <input type="text"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="flex flex-col">
                <label for="email" class="text-white text-[16px] font-medium">Email</label>
                <input type="email"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-white text-[16px] font-medium">Password</label>
                <input type="password"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-white text-[16px] font-medium">Company name</label>
                <input type="text"
                    class="rounded-lg px-4 focus:ring-2 focus:outline-none focus:ring-[#4E1BE4] py-[6px] text-gray-800 bg-white mt-2 mb-4"
                    id="email" name="company_name" placeholder="Enter your email">
            </div>

            <div class="flex flex-col">
                <label for="file_input" class="text-white text-[16px] font-medium">Company logo</label>
                <input type="file" id="file_input" name="company_logo"
                    class="mt-2 mb-4 block w-full text-sm text-gray-800
               rounded-lg border border-gray-300 bg-white cursor-pointer
               focus:outline-none focus:ring-2 focus:ring-[#4E1BE4] file:mr-4 file:py-2 file:px-4
               file:rounded-lg file:border-0 file:text-sm file:font-semibold
               file:bg-gray-500 file:text-white hover:file:bg-gray-500">
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
                Sign Up
            </button>

        </form>

    </div>

</body>

</html>
