@extends("layouts.template")

@section("content")
    <h1>{{__("messages.choose")}}</h1>
    <select name="destination" id="destination">
        <option value="-">--{{__("messages.choose_one")}}--</option>
        @foreach($countries as $country)
            <option value="{{ $country["id"] }}">{{$country["name"]}}</option>
        @endforeach
    </select>

    <script>
        const country = document.getElementById('destination')
        country.addEventListener('change', () => {
        const countryId = country.value;
            console.log(countryId)
            if (countryId) {
                window.location.href = '/search/'+countryId;
            }
        });
            
    </script>
@endsection