<h1>Form to edit number of employees</h1>

<form action="{{ route("number-of-employees.update", $numberOfEmployee) }}" method="POST">
    @csrf
    @method("PUT")
    {{ $numberOfEmployee }}<br>
    <input type="submit" name="edit" value="Edit">
</form>
