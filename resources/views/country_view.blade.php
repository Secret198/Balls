@extends("layouts.template")
@section("content")
    <a href="{{ url()->previous() }}"><-(maybe put a picture here)</a>
    @if (count($country) > 0)
        <p>{{ $country[0]["name"]}}</p>
    @else
        <p>{{__("messages.not_found")}}</p>
    @endif
@endsection

