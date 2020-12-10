<h1>Form to create new company</h1>

<form action="{{ route("companies.store") }}" method="POST">
    @csrf
    <input type="submit" name="submit" value="Submit">
</form>
