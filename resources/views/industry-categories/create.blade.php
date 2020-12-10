<h1>Form to create new industry category</h1>

<form action="{{ route("industry-categories.store") }}" method="POST">
    @csrf
    <input type="submit" name="submit" value="Submit">
</form>
