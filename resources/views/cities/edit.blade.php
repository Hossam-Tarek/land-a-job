<h1>Form to edit City</h1>

<form action="{{ route("cities.update", $city) }}" method="POST">
    @csrf
    @method("PUT")
    {{ $city }}<br>
    <input type="submit" name="edit" value="Edit">
</form>
