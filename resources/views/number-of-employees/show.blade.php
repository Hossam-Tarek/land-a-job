<h1>The view for a single number of employee</h1>

{{ $numberOfEmployee }}<br>

<a href="{{ route("number-of-employees.edit", $numberOfEmployee) }}">Edit number of employee</a>
