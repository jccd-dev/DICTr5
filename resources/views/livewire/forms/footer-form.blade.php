<div class="max-w-sm">
    <x-forms.input-form name="Email Address" id="email" required="false" type="email" placeholder="Email Address" model="email" />
    <br>
    <x-forms.input-form name="Name" id="name" required="false" type="text" placeholder="Name" model="name" />
    <br>
    <x-forms.input-form name="Mobile Number" id="cp_number" required="false" type="text" placeholder="09XXXXXXXXX" model="cp_number" />
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
