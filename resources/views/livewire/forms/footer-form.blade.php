<div class="max-w-sm">
    <x-forms.input-form name="Email Address" required="false" type="email" placeholder="Email Address" model="email"/>
    <br>
    <x-textarea label="Message" placeholder="Message" wire:model.lazy="message" />
    <br>
    <x-button info label="Submit" wire:click="submit" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            window.addEventListener('FeedbackCreated', event => {
                Swal.fire("Successfully Sent Message", "You have just sent a feedback/message to DICT CamSur", "success");
        });
    </script>
</div>
