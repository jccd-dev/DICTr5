<div>
    <x-notifications position="bottom-right"  />
    <x-input label="Name" placeholder="your name" wire:model.defer="name" />
    <div class="flex flex-row my-2">
        <div class="basis-1/2 mr-1">
            <x-input label="Email Address" placeholder="your email" wire:model.defer="email" />
        </div>
        <div class="basis-1/2 ml-1">
            <x-input label="Cellphone number" placeholder="09xxxxxxxxx" wire:model.defer="cp_number" />
        </div>
    </div>
    <div class="flex flex-row my-2">
        <div class="basis-1/2 mr-1">
            <x-input label="Organization" placeholder="your organization" wire:model.defer="organization" />
        </div>
        <div class="basis-1/2 ml-1">
            <x-native-select label="Tech4Ed Course" wire:model="tech4ed_course_training">
                <option value="Tech4Ed1">Select Tech4Ed Course/Training</option>
                <option value="Tech4Ed1">Tech4Ed1</option>
                <option value="Tech4Ed2">Tech4Ed2</option>
                <option value="Tech4Ed3">Tech4Ed3</option>
                <option value="Tech4Ed4">Tech4Ed4</option>
            </x-native-select>
        </div>
    </div>
    <div class="text-center mt-7">
        <button wire:click="create_registration" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Submit</button>
    </div>
</div>
