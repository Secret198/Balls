@extends("layouts.template")



@section("content")
        <section class="hero-section">
            <h2 class="hero-title">
                {{ __("messages.name") }}
            </h2>
            <p class="hero-description">
                {{ __('messages.message1') }}
                <br><br>
                {{ __('messages.message2') }}

            </p>
            <a href="/search" class="btn-hero">
                {{ __("messages.choose") }}
            </a>
        </section>
@endsection

