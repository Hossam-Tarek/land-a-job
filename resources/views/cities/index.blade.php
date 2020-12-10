<h1>All cities view</h1>

@foreach($cities as $city)
    {{ $city }}<br>
    <a href="{{ route("cities.show", $city) }}">More details</a><br>
@endforeach
