@extends("company.layouts.master")

@section("title", "Company profile")

@section("style-sheets")
<link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
<link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
@endsection

@section("content")
<div class="row w-75 mx-auto mt-3">
    <!-- Images Section -->
    <div id="image-uploaded-message" class="alert" role="alert" style="z-index: 1000000 !important; display: none; position: fixed; top: 50px;left:12.5%;z-index: 150;width: 75%;"></div>
    <div class="col-12">
        <div class="row align-items-center">
            <div class="col-md-4 col-12 avatar-upload mb-md-0 mb-4">
                <!-- logo Image -->
                <div class="avatar-edit">
                    <form action="" method="post" id="upload-logo-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type='file' id="logoUpload" name="logo">
                        <label for="logoUpload"></label>
                    </form>
                </div>
                <div class="avatar-preview">
                    <div id="logoPreview" style='background-image: url({{asset("avatar/$company->logo")}})'>
                    </div>
                </div>
            </div>
            <!-- Cover Image -->
            <div class="col-md-8 col-12 cover-image-upload mb-md-0 mb-4">
                <div class="cover-image-edit">
                    <form action="" method="post" id="upload-cover-image-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type='file' id="coverImageUpload" name="coverImage">
                        <label for="coverImageUpload"></label>
                    </form>
                </div>
                <div class="cover-image-preview">
                    <div id="coverImagePreview" style='background-image: url({{asset("avatar/$company->cover_image")}})'>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-5">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="col">Company</th>
                    <td scope="row">{{ $company->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Manager</th>
                    <td scope="row">{{ $company->user->first_name." ".$company->user->last_name }}</td>
                </tr>
                <tr>
                    <th scope="col">Industry category</th>
                    <td scope="row">{{ $company->industryCategory->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Number of employees</th>
                    <td scope="row">{{ "From ".$company->numberOfEmployee->min." to ".$company->numberOfEmployee->max }}</td>
                </tr>
                <tr>
                    <th scope="col">Founded date</th>
                    <td scope="row">{{ $company->founded_date }}</td>
                </tr>
                <tr>
                    <th scope="col">Location</th>
                    <td scope="row">{{ $company->city->name.", ".$company->country->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Website</th>
                    <td scope="row"><a href="{{ $company->url }}">{{ $company->url }}</a></td>
                </tr>
                <tr>
                    <th scope="col">About</th>
                    <td scope="row">{{ $company->about }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center text-uppercase text-dark">
                        <h5 class="my-0">Links</h5>
                    </th>
                </tr>
                @forelse($links as $link)
                <tr>
                    <th scope="col">{{$link->name}}</th>
                    <td scope="row">{{$link->url}}</td>
                </tr>
                @empty
                <tr>
                    <th colspan="2" class="text-center text-danger">There is no links</th>
                </tr>
                @endforelse

                <tr>
                    <th colspan="2" class="text-center text-uppercase text-dark">
                        <h5 class="my-0">Phone numbers</h5>
                    </th>
                </tr>
                @forelse($phoneNumbers as $index => $phoneNumber)
                <tr>
                    <th scope="col">Phone{{$index+1}}</th>
                    <td scope="row">{{$phoneNumber->number}}</td>
                </tr>
                @empty
                <tr>
                    <th colspan="2" class="text-center text-danger">There is no phone numbers</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="col-12 text-center">
        <a href='{{ route("company.edit") }}' class="btn btn-warning w-25">Edit Profile</a>
    </div>
</div>
@endsection

@section("scripts")
<script src="{{ asset('js/image-upload-with-preview.js') }}"></script>
@endsection