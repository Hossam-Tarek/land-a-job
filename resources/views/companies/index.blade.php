<h1>All companies view</h1>

@foreach($companies as $company)
    {{ $company }}<br>
    <a href="{{ route("companies.show", $company) }}">More details</a><br>
@endforeach
