<h1>Form to create new City</h1>

<form action="{{ route("cities.store") }}" method="POST">
    @csrf
    <input type="submit" name="submit" value="Submit">
</form>
