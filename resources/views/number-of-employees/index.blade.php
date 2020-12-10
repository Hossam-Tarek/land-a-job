<h1>All number of employees view</h1>

@foreach($numberOfEmployees as $numberOfEmployee)
    {{ $numberOfEmployee }}<br>
    <a href="{{ route("number-of-employees.show", $numberOfEmployee) }}">More details</a><br>
@endforeach
