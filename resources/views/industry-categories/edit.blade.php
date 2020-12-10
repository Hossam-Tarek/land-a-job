<h1>Form to edit industry category</h1>

<form action="{{ route("industry-categories.update", $industryCategory) }}" method="POST">
    @csrf
    @method("PUT")
    {{ $industryCategory }}<br>
    <input type="submit" name="edit" value="Edit">
</form>
