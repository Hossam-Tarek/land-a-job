@extends("admin.layouts.master")
@section("title", "All Companies")
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')

<div class="mt-3 mb-2">
    @if(session()->has('success'))
    <div class="container alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
</div>
<h1 class="text-center text-secondary mt-4">All Companies</h1>
<div class="data-table-responsiv ">
    <div class="container my-5">
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
                <tr>
                    <th class="text-center text-white">Company Name</th>
                    <th class="text-center text-white">Owner</th>
                    <th class="text-center text-white">Country </th>
                    <th class="text-center text-white">City</th>
                    <th class="text-center text-white">Logo</th>
                    <th class="text-center text-white">Industry Category</th>
                    <th class="text-center text-white">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->user->first_name}}</td>
                    <td>{{$company->country->name}}</td>
                    <td>{{$company->city->name}}</td>
                    <td><img src="{{asset('avatar/'.$company->logo)}}" alt="" class="user-image"></td>
                    <td> {{$company->industryCategory->name}}</td>
                    <td>
                        <form action="{{route('all-companies.destroy',$company->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
@endsection
