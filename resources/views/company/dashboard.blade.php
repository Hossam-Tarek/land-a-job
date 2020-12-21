@extends("company.layouts.master")

@section("title", "Dashboard")

@section("style-sheets")
<link rel="stylesheet" href="{{asset('css/company/main.css')}}">
@endsection

@section("content")
    <h1></h1>
    <div class="container mt-5">
        <div class="row">
            <!-- Jobs -->
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="row m-0 admin-card">
                    <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                        <div class="admin-card-text">{{$data['jobs']}} Jobs</div>
                        <div class="card-body-icon">
                            <i class="fab fa-houzz"></i>
                        </div>
                    </div>
                    <a class="col-12 admin-card-footer" href="{{route('all-jobs.index')}}">
                        <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                    </a>
                </div>
            </div>
            <!-- Employee -->
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="row m-0 admin-card">
                    <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                        <div class="admin-card-text">{{$data['numberOfEmploies']['max']}} Employee</div>
                        <div class="card-body-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <a class="col-12 admin-card-footer" href="{{route('all-companies.index')}}">
                        <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                    </a>
                </div>
            </div>
            <!-- Applicants -->
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="row m-0 admin-card">
                    <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                        <div class="admin-card-text ">{{$data['applicants']}} Applicants</div>
                        <div class="card-body-icon">
                            <i class="fas fa-blender-phone"></i>
                        </div>
                    </div>
                    <a class="col-12 admin-card-footer" href="{{route('countries.index')}}">
                        <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                    </a>
                </div>
            </div>
            <!-- Rate -->
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="row m-0 admin-card">
                    <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                        <div class="admin-card-text">{{$data['rate']}} Rate </div>
                        <div class="card-body-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                    </div>
                    <a class="col-12 admin-card-footer" href="{{route('cities.index')}}">
                        <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
@endsection
