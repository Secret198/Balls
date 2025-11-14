@extends("layouts.template")

@section("content")
    <h1>{{__("messages.choose")}}</h1>
    <div class="mb-6">
        <label for="destination-country" class="input-label">Where are you going?</label>
<br>
        <select name="destination" id="destination" class="select-input">
            <option value="-">--{{__("messages.choose_one")}}--</option>
            @foreach($countries as $country)
                <option value="{{ $country["id"] }}">{{$country["name"]}}</option>
            @endforeach
        </select>
    </div>


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