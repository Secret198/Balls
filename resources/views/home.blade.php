@extends("layouts.template")

@section("content")
    <h1>{{__("messages.name")}}</h1>
    <a href="/search">{{ __("messages.choose") }}</a>
@endsection