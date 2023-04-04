<div>
    <div>
        <form wire:submit.prevent="submit">
            <div>
                <input type="file" wire:model="image">
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

