<div class="border-b-4 border-blue-900 pt-2">
    <div class="container mx-auto ">
        <div class="flex flex-row">
            <div class="basis-1/2">
                <img class="w-3/5" src="{{asset("img/DICTR5CamSur.png")}}">
            </div>
            <div class="basis-1/2">
                <div class="flex flex-row-reverse p-3">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-avatar md src="https://picsum.photos/300?size=lg" />
                        </x-slot>

                        <x-dropdown.item icon="user" label="Account" />
                        <x-dropdown.item separator label="Logout" />
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</div>
