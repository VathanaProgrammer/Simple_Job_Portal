@extends('layout')

@section('title', 'Manage Jobs')

@section('content')
    <div class="w-full p-4">
        <header class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-center mb-6 text-[#3B3B3B]">Manage your jobs post</h1>
            <a href="{{ route('post.create') }}" class="text-white bg-[#4195F6] px-4 py-2 rounded-md">Add New Post</a>
        </header>

        <div class="bg-white p-4 rounded-md font">
            <section class="flex gap-2">
                <h1 class="text-[16px] text-[#3F98F7] font-semibold border-2 border-[#3F98F7] px-4 py-2 rounded-md">All Posts
                </h1>
                <h1 class="text-[16px] text-[#A3A6B3] font-semibold bg-[#A3A6B3]/20 px-4 py-2 rounded-md">Active
                </h1>
                <h1 class="text-[16px] text-[#A3A6B3] font-semibold bg-[#A3A6B3]/20 px-4 py-2 rounded-md">Close
                </h1>
            </section>
            @foreach ($posts as $post)
                <div id="job-{{ $post->id }}" class="mt-4 grid grid-cols-3 border-t-2 pt-2">
                    <section class="flex flex-col gap-2">
                        <h1 class="text-[16px] text-[#3B3B3B] font-semibold">
                            {{ $post->title }} |
                            <span class="text-[14px] font-medium text-[#3B3B3B] status-text">
                                {{ $post->status ? 'Active' : 'Closed' }}
                            </span>
                        </h1>
                        @php
                            $range = explode('-', $post->salary_range);
                        @endphp
                        <h1 class="text-[14px] text-[#3B3B3B] font-semibold">
                            {{ $post->employment_type }} | ${{ trim($range[0]) }} - ${{ trim($range[1]) }}
                        </h1>
                    </section>

                    <section class="flex flex-col gap-2">
                        <h1 class="text-[16px] text-[#3B3B3B] font-semibold">
                            Category: <span
                                class="text-[14px] font-medium text-[#3B3B3B]">{{ $post->category->name }}</span>
                        </h1>
                        <h1 class="text-[14px] text-[#3B3B3B] font-semibold italic">
                            Created: {{ $post->created_at->format('d/m/Y') }}
                        </h1>
                    </section>

                    <section class="flex flex-col gap-2 justify-center items-end">
                        <button
                            class="px-4 py-2 text-white rounded-md toggle-job-btn
                            {{ $post->status ? 'bg-[#3F98F7]' : 'bg-[#3F98F7]' }}"
                            data-id="{{ $post->id }}">
                            {{ $post->status ? 'Close' : 'Repost' }}
                        </button>
                    </section>

                </div>
            @endforeach


            @if ($posts->isEmpty())
                <p class="text-center text-gray-500">You haven't posted any jobs yet.</p>
            @endif
        </div>
    </div>
    <script>
        document.querySelectorAll('.toggle-job-btn').forEach(button => {
            button.addEventListener('click', function() {
                let jobId = this.dataset.id;
                let token = '{{ csrf_token() }}';
                let row = document.getElementById(`job-${jobId}`);

                fetch(`/jobs/${jobId}/toggle-status`, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            let statusText = row.querySelector('.status-text');
                            if (data.status) {
                                statusText.textContent = 'Active';
                                button.textContent = 'Close';
                                button.classList.remove('bg-gray-400');
                                button.classList.add('bg-[#3F98F7]');
                            } else {
                                statusText.textContent = 'Closed';
                                button.textContent = 'Repost';
                                button.classList.remove('bg-[#3F98F7]');
                                button.classList.add('bg-[#3F98F7]');
                            }
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>
@endsection
