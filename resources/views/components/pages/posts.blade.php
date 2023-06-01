@extends('layouts.main-layout')


@section("content")
<div>
    <x-layouts.top-banner />
    <x-layouts.navbar />
    <x-layouts.announcement-marquee />
    <x-layouts.banner />

    <div class='h-[25rem] md:h-[27rem] lg:h-[30rem] w-full flex flex-col items-center bg-cover bg-center' style="background-image: url({{ asset('img/announcement.png') }})">
        {{-- <img src="{{ asset('img/announcement.png') }}" class="w-full" alt="posts"/> --}}
        <div class="py-10 flex flex-col gap-10">
            <h1 class="text-center font-quicksand font-semibold text-3xl lg:text-5xl text-white">
                DICT POSTS</h1>
            <h2 class="text-center leading-loose text-white text-lg sm:text-xl lg:text-2xl max-w-3xl">Provide every Filipino access to vital ICT infostructure and services. Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs. Establish a One Digitized Government, One Nation. Support the administration in fully achieving its goals.</h2>
        </div>
    </div>

    <div class="container my-24 px-6 mx-auto">
        <div class="block rounded-lg bg-white">
        <div class="flex flex-wrap items-center">
            <div class="w-full h-full lg:w-6/12 xl:w-5/12">
            <!-- Slider main container -->
                <div class="swiper w-full h-full">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper w-full h-full">
                    <!-- Slides -->
                    {{-- @dd($data['cur_post']) --}}
                    {{-- @foreach($data['cur_post']->)
                    @endforeach --}}
                        @foreach ($data['cur_post']->images as $img)
                            <div class="swiper-slide w-full" style="height:initial">
                                <img src="{{ asset("storage/images/".$img->image_filename) }}" alt=""
                    class="w-full h-full object-cover" />
                            </div>
                        @endforeach

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>

            <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-7/12">
                <div class="px-6 py-12 md:px-12">
                    <h2 class="text-2xl font-bold mb-4">{{ $data['cur_post']->title }}</h2>
                    <p class=" text-bold text-black-500 mb-4">
                        @php
                            echo htmlspecialchars_decode($data['cur_post']->content);
                        @endphp
                    </p>
                </div>
            </div>
            <div class="w-full">
                <h1 class="mt-20 mb-5 font-bold font-inter text-xl 2xl:text-2xl">Watch our events</h1>
                <div class="w-full flex justify-center h-[80vh]" id="embedd-con">

                    @if (strstr($data['cur_post']->vid_link, 'youtube'))
                        <iframe class="w-full rounded-[2rem] h-auto" src="{{ $data['cur_post']->vid_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    @elseif(strstr($data['cur_post']->vid_link, 'drive'))
                        <iframe class="w-full rounded-[2rem] h-auto" src="{{ $data['cur_post']->vid_link }}" allow="autoplay"></iframe>
                    @endif
                </div>
            </div>
        </div>
        </div>
        {{-- @dd($data) --}}
    <div class="w-full mb-10 mt-32">
        <div class="w-full flex flex-col justify-center">
            <h1 class="text-left ml-10  font-bold font-inter text-3xl">Related News</h1>
            <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-100 dark:opacity-150" />
            <div class="flex justify-center">
                <div class="mt-20 flex gap-10 flex-wrap justify-center">
                    @foreach ($data['posts'] as $post)
                        <div class="card w-[23rem] rounded-xl border-b-4 border-custom-red cursor-pointer" onclick="(() => location.href = '/posts/{{ $post->id }}')()">
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
                                                @php
                                                    echo htmlspecialchars_decode($post->content)
                                                @endphp
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
                                            <h5 class="text-sm">{{ date('F j, Y', strtotime($post->timestamp)) }} | {{ $post->elapsed }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr class="my-24 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-100 dark:opacity-150" />
</div>
<div class =  'flex justify-center w-full items-center bg-[#00509d] py-3' >
    <div class = 'gap-5 flex justify-center items-center md:justify-around container flex-col md:flex-row'>
        <div class = 'p-2 w-[25rem] text-white flex flex-col items-center md:block'>
            <h1 class = 'font-3xl'>FOLLOW US ONLINE</h1>
            <br>
                <div class = 'flex flex-row gap-3'>
                    <a href="#"><img src="{{ asset('/img/Facebook.png')}}" class = 'w-[2.5rem]' ></img></a>
                    <a href="#"><img src="{{ asset('/img/Twitter Squared.png')}}" class = 'w-[2.5rem]' ></img></a>
                    <a href="#"><img src="{{ asset('/img/Instagram.png')}}" class = 'w-[2.5rem]' ></img></a>
                    <a href="#"><img src="{{ asset('/img/YouTube.png')}}" class = 'w-[2.5rem]' ></img></a>
                </div>

        </div>

        <div class = 'p-2 w-[25rem] text-white  flex flex-col items-center md:block'>
            <p class = ' font-3xl'>E-MAIL US</p>
            <br>
            <a href = "#" class = 'font-3xl'>INFORMATION@DICT.GOV.PH</a>

        </div>

    </div>
</div>

<x-footer :data="$data['visitors']" />
<script>
    const embedCon = document.querySelector('#embedd-con')

</script>
@endsection
