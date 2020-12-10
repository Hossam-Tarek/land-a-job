<h1>All industry categories view</h1>

@foreach($industryCategories as $industryCategory)
    {{ $industryCategory }}<br>
    <a href="{{ route("industry-categories.show", $industryCategory) }}">More details</a><br>
@endforeach
