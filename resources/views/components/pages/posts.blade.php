@extends('layouts.main-layout')


@section("content")
<div>
    <x-layouts.top-banner />
    <x-layouts.navbar />
    <x-layouts.announcement-marquee />
    <x-layouts.banner />

    <div class="relative md:max-xl:flex">
        <img src="img/announcement.png" class="w-full" alt=""/>
        <h1 class="absolute text-center text-5xl text-white top-2 mt-7 left-1/2 -translate-x-1/3 -translate-y-2">
           POST</h1>
           <h2 class="absolute text-center text-white ml-8 text-left text-2xl top-1/3 left-1/2 -translate-x-1/2">Provide every Filipino access to vital ICT infostructure and services. Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs. Establish a One Digitized Government, One Nation. Support the administration in fully achieving its goals.</h2>
    </div>

    <div class="container my-24 px-6 mx-auto">
      <div class="flex flex-wrap items-center">
        <div class="hidden lg:flex grow-0 shrink-0 basis-auto lg:w-6/12 xl:w-4/12">
          <img src="img/simreg.jpg" alt=""
            class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
        </div>

        <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
          <div class="px-6 py-12 md:px-12">
            <h2 class="text-2xl font-bold mb-4">DICT supports the immediate implementation of Republic Act No. 11934 or the “Subscriber Identity Module (SIM) Registration Act”</h2>
            <p class=" text-bold text-black-500 mb-6">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum maxime voluptas
              ipsam aliquam itaque cupiditate provident architecto expedita harum culpa odit,
              inventore rem molestias laborum repudiandae corporis pariatur quo eius iste!
              Quaerat, assumenda voluptates! Molestias, recusandae? Maxime fuga omnis ducimus.
              <br>Commodi ut nisi assumenda alias maxime necessitatibus ad rem repellat explicabo,
              reiciendis illum suscipit iusto? Provident dignissimos similique, reiciendis
              inventore accusantium unde mollitia, deleniti quae atque error id perspiciatis
              illum. Laboriosam aperiam ab illo dignissimos obcaecati corporis similique a odio,
              optio iste quis placeat alias amet rerum sint quos dolor pariatur inventore
              possimus ad consequuntur fugiat perferendis consectetur laudantium.
            </p>
            </div>
        </div>
            <p class="text-left text-black-500">
                 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum maxime voluptas
              ipsam aliquam itaque cupiditate provident architecto expedita harum culpa odit,
              inventore rem molestias laborum repudiandae corporis pariatur quo eius iste!
              Quaerat, assumenda voluptates! Molestias, recusandae? Maxime fuga omnis ducimus.
          Duis sagittis, turpis in ullamcorper venenatis, ligula nibh porta dui, sit amet rutrum
          enim massa in ante. Curabitur in justo at lorem laoreet ultricies. Nunc ligula felis,
          sagittis eget nisi vitae, sodales vestibulum purus. Vestibulum nibh ipsum, rhoncus vel
          sagittis nec, placerat vel justo. Duis faucibus sapien eget tortor finibus, a eleifend
          lectus dictum. Cras tempor convallis magna id rhoncus. Suspendisse potenti. Nam mattis
          faucibus imperdiet. Proin tempor lorem at neque tempus aliquet. Phasellus at ex
          volutpat, varius arcu id, aliquam lectus. Vestibulum mattis felis quis ex pharetra
          luctus. Etiam luctus sagittis massa, sed iaculis est vehicula ut.
        </p>
      </div>
    </div>
    <div class="w-full mt-32" x-data="{ data: [1,2,3] }">
    <div class="w-full flex flex-col justify-center">
    <h1 class="text-left ml-10  font-bold font-inter text-3xl">Related News</h1>
        <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-100 dark:opacity-150" />
    <div class="flex justify-center">
        <div class="mt-20 flex gap-10 flex-wrap justify-center">
		<template x-for="d in data">
                <div class="card w-[23rem] rounded-xl border-b-4 border-custom-red">
                    <div class="flex flex-col justify-between">
                        <div>
                            {{-- top --}}
                            <div class="rounded-xl border-b-4 border-b-dark-yellow overflow-hidden w-[23rem] h-[13rem]">
                                {{-- top img --}}
                                <img class="w-full h-full object-cover" src="{{ asset('img/posts.jpg') }}" class="" alt="">
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
    <x-footer />
</div>
@endsection
