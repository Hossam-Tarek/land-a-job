<h1>Form to create new number of employees</h1>

<form action="{{ route("number-of-employees.store") }}" method="POST">
    @csrf
    <input type="submit" name="submit" value="Submit">
</form>
