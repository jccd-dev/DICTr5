<div class="w-full mt-32" x-data="{ data: [1,2,3] }">
    <div class="w-full flex flex-col justify-center">
        <h1 class="text-center font-bold font-inter text-3xl">Highlight Posts</h1>
        <p class="text-center text-lg mt-3">Lorem ipsum dolor sit amet consectetur. Adipiscing pretium quam sapien leo magna.</p>
    </div>
    <div class="flex justify-center">
        <div class="mt-20 flex gap-10 flex-wrap justify-center">
            <template x-for="i in data">
                <div class="card w-[23rem] rounded-xl border-b-4 border-custom-red">
                    <div class="flex flex-col justify-between">
                        <div>
                            {{-- top --}}
                            <div class="rounded-xl border-b-4 border-b-dark-yellow overflow-hidden">
                                {{-- top img --}}
                                <img src="/img/sample card img.jpg" class="" alt="">
                            </div>
                            <div class="mt-5 px-3">
                                {{-- top content --}}

                                {{-- caategory --}}

                                <div>
                                    <span class="bg-custom-blue rounded-full px-3 py-1 text-xs text-white font-semibold font-inter">News</span>
                                </div>

                                {{-- main content --}}

                                <div>
                                    {{-- title --}}

                                    <h1 class="font-bold font-inter text-xl mt-2 leading-snug">Lorem ipsum dolor sit amet consectetur. Donec eleifend enim dignissim.</h1>

                                    {{-- description --}}

                                    <p class="mt-5 text-justify">
                                        Lorem ipsum dolor sit amet consectetur. Dictum feugiat pretium turpis duis diam luctus amet turpis laoreet. Non aenean nulla sit aliquam lobortis enim a volutpat. Dolor enim pharetra interdum scelerisque aliquam tempus diam.
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
                                    <h3 class="font-semibold font-inter">Content Admin</h3>
                                    <h5 class="text-sm">March 22, 2023 | 6 min read</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
