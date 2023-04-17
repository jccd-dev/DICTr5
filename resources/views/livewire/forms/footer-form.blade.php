<div class="max-w-sm">
    <x-forms.input-form name="Email Address" required="false" type="email" placeholder="Email Address" model="email" />
    <br>
    <x-textarea label="Message" placeholder="Message" wire:model.lazy="message" />
    <br>
    <x-button info label="Submit" />
</div>
