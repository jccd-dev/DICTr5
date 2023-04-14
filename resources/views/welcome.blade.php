@extends('layouts.main-layout')

@section("content")

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<x-layouts.announcement-marquee />

<x-home.section.home-slider />

<x-home.section.exam-section />

<x-home.section.highlight-post-section />

<x-home.section.calendar-section />

<x-home.section.services-section />

<x-home.section.contact-center-section />



<x-home.section.details-section />
<x-layouts.footer/>

<x-layouts.modal-button name="Modal" target="modal1" />

<x-layouts.modal title="Modal1" target="modal1" method="POST" action="#">

    <x-forms.input required="true" name="Name" type="text" placeholder="Enter name" />

    <x-forms.textarea required="true" name="Name" placeholder="Enter name" />

</x-layouts.modal>


@endsection

