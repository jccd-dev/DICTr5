<style>
    #banner-con {
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    }
</style>

<div id="banner-con" class="banner-con w-full h-[5.5rem] md:h-[7rem] flex justify-center items-center">
    <div class="mx-5 sm:mx-10 xl:mx-24 w-full flex items-center justify-between">
        <div class="left">
            <img src="{{ asset('img/DICT Standard Logos-06 1.png') }}" class="h-[4rem] 2xl:h-[5rem]" alt="">
        </div>
        <div class="right hidden lg:flex gap-20 ">
            <div class="ph-time flex flex-col items-center justify-center text-lg font-quicksand text-white">
                <h3 class="text-xs 2xl:text-sm">Tuesday, March 21, 2023</h3>
                <h3 class="text-xl 2xl:text-3xl">03:54:56 PM</h3>
            </div>
            <div class="qoute flex flex-col items-center font-lucida text-base 2xl:text-xl text-white">
                <h1>DICT to the People</h1>
                <h1>DICT for the People</h1>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/utils/date-config.js'])
