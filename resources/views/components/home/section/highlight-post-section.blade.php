<div class="w-full mt-32" x-data="{ data: [1,2,3] }">
    <div class="w-full flex flex-col justify-center">
        <h1 class="text-center font-bold font-inter text-3xl">Highlight Posts</h1>
        <p class="text-center text-lg mt-3">Lorem ipsum dolor sit amet consectetur. Adipiscing pretium quam sapien leo magna.</p>
    </div>

    <div class="flex justify-center">
        <div class="mt-20 flex gap-10 flex-wrap justify-center">
            @foreach($data as $index => $post)
                @php
                    if ($index === 3) break;
                @endphp
                <div class="card w-[23rem] rounded-xl border-b-4 border-custom-red">
                    <div class="flex flex-col justify-between">
                        <div>
                            {{-- top --}}
                            <div class="rounded-xl border-b-4 border-b-dark-yellow overflow-hidden w-[23rem] h-[13rem]">
                                {{-- top img --}}
                                <img class="w-full h-full object-cover" src="{{ asset('storage/images/'. $post->thumbnail) }}" class="" alt="">
                            </div>
                            <div class="mt-5 px-3">
                                {{-- top content --}}

                                {{-- caategory --}}

                                <div>
                                    <span class="bg-custom-blue rounded-full px-3 py-1 text-xs text-white font-semibold font-inter">{{ $post->category->category }}</span>
                                </div>

                                {{-- main content --}}

                                <div>
                                    {{-- title --}}

                                    <h1 class="font-bold font-inter text-xl mt-2 leading-snug">{{ $post->title }}</h1>

                                    {{-- description --}}

                                    <p class="mt-5 text-justify">
                                        {{ $post->excerpt }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="px-3 mt-10">
                            {{-- bottom --}}

                            <div class="py-3 flex gap-3">
                                {{-- left --}}

                                <div>
                                    <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </div>

                                {{-- right --}}
                                <div>
                                    <h3 class="font-semibold font-inter">{{ $post->author }}</h3>
                                    <h5 class="text-sm">{{ date("M j, Y", strtotime($post->timestamp)) }} | {{ $post->elapsed }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
