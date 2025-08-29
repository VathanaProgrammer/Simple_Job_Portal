@extends('layout')
@section('title', 'Home Page')

@section('content')
    <h1 class="text-[64px] text-[#4E1BE4] font-bold text-center">Find Your Dream Job</h1>
    <h1 class="text-[64px] text-[#4E1BE4] font-bold text-center">Fast And Easy</h1>
    <div class="relative w-full lg:w-[65%] mx-auto mt-8 mb-8">
        <!-- Input -->
        <input type="text" placeholder="Search..."
            class="w-full pl-12 pr-4 py-3 rounded-lg bg-white text-[24px] focus:outline-none focus:ring-2 text-gray-800 focus:ring-blue-500" />

        <!-- Icon inside input -->
        <span class="absolute left-3 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32">
                <path fill="none" stroke="#333" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m5 27l7.5-7.5M28 13a9 9 0 1 1-18 0a9 9 0 0 1 18 0" />
            </svg>
        </span>
    </div>

    <section class="bg-white rounded-2xl p-12">
        <header class="flex justify-between">
            <h1 class="font-semibold text-[#4E4E4E] text-[32px]">Categories</h1>
            <p class="text-[16px] font-medium text-[#4E4E4E]">24 result found</p>
        </header>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 mt-8">
            <!-- Category Card 1 -->
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/1_SG5-gvb3-NQMUzQsWNu_sA.jpg') }}" alt="Category 1"
                    class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">IT</h2>
                <p class="text-[16px] text-white">120 Jobs Available</p>
            </div>
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/3af020a0c7c286313ecb33435d638ba3.jpg') }}" alt="Category 1"
                    class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">Accounting</h2>
                <p class="text-[16px] text-white">40 Jobs Available</p>
            </div>
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/istockphoto-1454809745-612x612.jpg') }}" alt="Category 1"
                    class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">Banking</h2>
                <p class="text-[16px] text-white">50 Jobs Available</p>
            </div>
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/images (7).jpg') }}" alt="Category 1" class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">Mediea</h2>
                <p class="text-[16px] text-white">12 Jobs Available</p>
            </div>
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/images (8).jpg') }}" alt="Category 1" class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">Administration</h2>
                <p class="text-[16px] text-white">10 Jobs Available</p>
            </div>
            <div class="bg-[#4E1BE4] rounded-lg p-2 text-center">
                <img class="rounded-lg h-40 w-full object-cover mx-auto mb-4"
                    src="{{ asset('build/assets/images/images (9).jpg') }}" alt="Category 1" class="mx-auto mb-4">
                <h2 class="text-[24px] font-semibold text-white mb-2">Design</h2>
                <p class="text-[16px] text-white">32 Jobs Available</p>
            </div>
        </div>

        <section class="mt-8">
            <header class="flex justify-between">
                <h1 class="font-semibold text-[#4E4E4E] text-[32px]">Latest Jobs</h1>
                <p class="text-[16px] font-medium text-[#4E4E4E]">234 result found</p>
            </header>

            <div>
                @for ($i = 0; $i < 6; $i++)
                    <div class="bg-white rounded-2xl p-6 mt-8 flex items-center border-gray-300 border-2 shadow-lg">
                        <div class="for-company-logo w-2/10">
                            <img class="rounded-lg h-20 w-20 object-cover mx-auto mb-4"
                                src="{{ asset('build/assets/images/download.png') }}" alt="Company Logo">
                        </div>
                        <div>
                            <h2 class="text-[16px] font-semibold text-start text-[#4E4E4E] mb-2">Microsoft</h2>
                            <h1 class="text-[20px] font-bold text-start text-[#4E4E4E]">Looking for Software Developer</h1>
                            <div class="flex gap-4 mt-2 mb-2">
                                <p class="text-[12px] bg-gray-500/25 p-2 rounded-lg font-medium text-[#696969]">Full Time
                                </p>
                                <p class="text-[12px] bg-gray-500/25 p-2 rounded-lg font-medium text-[#696969]">$15k - $25k
                                </p>
                                <p class="text-[12px] bg-gray-500/25 p-2 rounded-lg font-medium text-[#696969]">12 hour ago
                                </p>
                            </div>
                            <p class="text-[#3B3B3B] text-[14px] font-medium">Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Dolores accusamus voluptatibus voluptate rerum facilis nam explicabo
                                delectus ullam quod, illo adipisci totam voluptates quo qui recusandae aperiam iusto labore
                                vero culpa architecto temporibus assumenda non possimus! Id odio quaerat nemo eum
                                accusantium! Incidunt eaque dolore labore eligendi expedita laudantium temporibus.</p>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

    </section>


@endsection
