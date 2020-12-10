<h1>Form to edit company</h1>

<form action="{{ route("companies.update", $company) }}" method="POST">
    @csrf
    @method("PUT")
    {{ $company }}<br>
    <input type="submit" name="edit" value="Edit">
</form>
