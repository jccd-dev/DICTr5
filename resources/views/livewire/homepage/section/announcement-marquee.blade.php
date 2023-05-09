<div class="w-full h-full flex items-center ">
    <div class="flex w-full">
        <div class="left font-semibold mr-5 xl:mr-20 text-sm 2xl:text-lg">Announcements:</div>
        <div class="w-full">
            <div class="content font-quicksand font-medium w-full h-full">
                <div class="splide w-full h-full" role="group" aria-label="annoucment">
                    <div class="splide__track h-full w-full flex items-center">
                        <ul class="splide__list w-full ">
                            @forelse($announcements as $ann)
                                <li class="splide__slide text-xs 2xl:text-lg cursor-pointer" wire:click="redirect_announcement({{$ann->id}})">
                                    <p class="whitespace-nowrap">{{$ann->excerpt}}</p>
                                </li>
                            @empty
                                <li class="splide__slide text-xs 2xl:text-lg">
                                    <p class="whitespace-nowrap">NO ANNOUNCEMENT AT THE MOMENT NO ANNOUNCEMENT AT THE MOMENT NO ANNOUNCEMENT AT THE MOMENT</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
