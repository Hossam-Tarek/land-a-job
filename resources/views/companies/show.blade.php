@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Company</h1>

                <h3>Name: {{ $company->name }}</h3>
                <p>Manager: {{ $company->user->first_name." ".$company->user->last_name }}</p>
                <p>Industry category: {{ $company->industryCategory->name }}</p>
                <p>Number of employees: {{ "From ".$company->numberOfEmployee->min." to ".$company->numberOfEmployee->max }}</p>
                <p>Founded date: {{ $company->founded_date }}</p>
                <p>Location: {{ $company->city->name.", ".$company->country->name }}</p>
                <p>Website: <a href="{{ $company->url }}">{{ $company->url }}</a></p>
                <p>About: {{ $company->about }}</p>
                <div class="mb-3">
                    <img src = '@if(!empty($company->logo)) {{asset("avatar/$company->logo")}} @else {{asset("img/company-default-logo.png")}} @endif' alt="company logo">
                </div>
                <div class="mb-3">
                    <img src = '@if(!empty($company->cover_image)) {{asset("avatar/$company->cover_image")}} @else {{asset("img/company-default-cover-image.png")}} @endif' alt="company cover image">
                </div>

                <a href="{{ route("companies.edit", $company) }}"
                   class="btn btn-primary">Edit industry category</a>
            </div>
        </div>
    </div>
@endsection
