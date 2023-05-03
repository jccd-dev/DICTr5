<!-- Slider main container -->

<div class="swiper w-full h-[30rem] 2xl:h-[40rem] border-b-4 border-b-[#FDC500]">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($data as $slider)
            <div class="swiper-slide">
                <div class="w-full h-full flex justify-end">
                    <div class="content w-full md:w-[50%] xl:w-[40%] flex items-center mx-10 md:ml-0 md:mr-10">
                        <div class="w-full md:max-w-[30rem] text-white flex flex-col items-center md:items-start">
                            <h1 class="text-3xl md:text-xl lg:text-3xl font-bold font-inter mb-7">{{ $slider->title }}</h1>
                            <p class="font-inter leading-8 text-center md:text-left">{{ $slider->description }}</p>
                            <a href="{{ $slider->button_links }}" class="bg-red-500 px-4 2xl:px-5 py-2 2xl:py-3 rounded-lg mt-5 font-quicksand font-semibold 2xl:font-normal text-sm 2xl:text-base">Learn more</a>
                        </div>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full -z-[1]">
                        <img src="{{ asset("cms-images/$slider->image") }}" class="w-full h-full object-cover" alt="">
                    </div>
                </div>
            </div>
        @endforeach

        <div class="swiper-slide">
            <div class="w-full h-full flex justify-end">
                <div class="content w-full md:w-[50%] xl:w-[40%] flex items-center mx-10 md:ml-0 md:mr-10">
                    <div class="w-full md:max-w-[30rem] text-white flex flex-col items-center md:items-start">
                        <h1 class="text-3xl md:text-xl lg:text-3xl font-bold font-inter mb-7">SIM Card Registration</h1>
                        <p class="font-inter leading-8 text-center md:text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In placeat dolores dolor similique eaque id vero distinctio aperiam est reiciendis.</p>
                        <a href="" class="bg-red-500 px-4 2xl:px-5 py-2 2xl:py-3 rounded-lg mt-5 font-quicksand font-semibold 2xl:font-normal text-sm 2xl:text-base">Learn more</a>
                    </div>
                </div>
                <div class="absolute top-0 left-0 w-full h-full -z-[1]">
                    <img src="{{ asset("img/sample1.jpg") }}" class="w-full h-full object-cover" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div>
