@extends('layout')
@section('title', 'create Post')
@section('content')
    <div class="w-full p-8 rounded-lg mt-10">
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-[#3B3B3B] text-[32px] font-semibold">Add Your New Post Job</h1>
            <a href="{{ route('manage_page', ['username' => Str::slug(Auth::user()->name)]) }}"
                class="text-white text-[16px] px-4 py-2 bg-[#4195F6] rounded-md">Back</a>
        </header>

        <section class="bg-white w-full p-4 rounded-md">
            <form action="{{ route('post.create.create')}}" method="POST" class="w-full flex lg:flex-row flex-col gap-2">
                 @csrf
                <div class="lg:w-1/2 w-full">
                    <div class="w-full mb-4">
                        <label for="job_title" class="text-[#3B3B3B] text-[20px] font-semibold">Job Position</label>
                        <input type="text" id="job_title" name="title" placeholder="Enter job title"
                            class="w-full border border-gray-300 text-[16px] font-medium rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B]">
                    </div>
                    <div class="w-full mb-4">
                        <label for="job_category" class="text-[#3B3B3B] text-[20px] font-semibold">Job Category</label>
                        <select id="countries" name="job_category"
                            class="border border-gray-300 text-[16px] font-medium rounded-md focus:ring-blue-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B] block w-full py-2 mt-2 px-4">
                            <option value="" selected disabled>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mb-4">
                        <label for="employment_type" class="text-[#3B3B3B] text-[20px] font-semibold">Employment
                            Type</label>
                        <select id="countries" name="employment_type"
                            class="border border-gray-300 text-[16px] font-medium rounded-md focus:ring-blue-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B] block w-full py-2 mt-2 px-4">
                            <option value="" selected disabled>Choose a employment type</option>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                        </select>
                    </div>
                    <div class="w-full mb-2">
                        <label for="experience" class="text-[#3B3B3B] text-[20px] font-semibold">Experience</label>
                        <select id="countries" name="experience"
                            class="border border-gray-300 text-[16px] font-medium rounded-md focus:ring-blue-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B] block w-full py-2 mt-2 px-4">
                            <option value="" selected disabled>Choose a experience</option>
                            <option value="1 Year +">1 Year +</option>
                            <option value="2 Year +">2 Year +</option>
                            <option value="3 Year +">3 Year +</option>
                            <option value="4 Year +">4 Year +</option>
                        </select>
                    </div>
                    <div class="w-full mb-2">
                        <label for="range" class="text-[#3B3B3B] block text-center text-[20px] font-semibold">Salary
                            Range</label>
                        <div class="flex w-full justify-between gap-4">
                            <div class="w-full mb-4">
                                <label for="" class="text-[#3B3B3B] text-[20px] font-semibold">From</label>
                                <input type="text" id="job_title" name="salary_from" placeholder="Enter job title"
                                    class="w-full border border-gray-300 text-[16px] font-medium rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B]">
                            </div>
                            <div class="w-full mb-4">
                                <label for="job_title" class="text-[#3B3B3B] text-[20px] font-semibold">To</label>
                                <input type="text" id="job_title" name="salary_to" placeholder="Enter job title"
                                    class="w-full border border-gray-300 text-[16px] font-medium rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full flex flex-col">
                    <div class="w-full mb-4">
                        <label for="company_location" class="text-[#3B3B3B] text-[20px] font-semibold">Company Location</label>
                        <input type="text" name="company_location" placeholder="Enter job title"
                            class="w-full border border-gray-300 text-[16px] font-medium rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B]">
                    </div>
                    <div class="w-full mb-4">
                        <label for="job_des" class="text-[#3B3B3B] text-[20px] font-semibold">Job Description</label>
                        <textarea name="job_des" placeholder="Enter job title"
                            class="w-full border border-gray-300 text-[16px] font-medium rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-[#3B3B3B]">
                        </textarea>
                    </div>
                    <div class="w-full mt-auto mb-4 justify-end flex">
                        <button type="submit" class="text-white bg-[#4195F6] rounded-md text-[16px] px-4 py-2">Post</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
