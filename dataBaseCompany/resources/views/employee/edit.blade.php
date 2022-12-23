@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header"> 
                @include('layouts.nav')
            </div>
    </div>
       
    </div>
</div>

<div class="d-flex justify-content-center">
    <form action="/employee/{{$employee->id}}" method="post" class="col-6 mt-2 bg-white p-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name" class="form-label">Employee Name</label>
        <input type="text" name="name" id="name" placeholder="Employee Name..." value="{{$employee->name}}" class="form-control">
        @error('name')
            <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="name" value="{{$employee->email}}" placeholder="Email..." class="form-control">
        @error('email')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <label for="company" class="form-label">Company</label>
       
        <select required name="company_id" id="" class="form-select">
            <option >==Select a company==</option>
            @foreach ($companys as $company)
            <option value="{{$company->id}}" {{$company->id == $employee->company_id ? 'selected' : ''}}>{{$company->name}}</option>
            @endforeach
        </select>
        @error('company')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <div class="d-flex mt-2 justify-content-center">
            <button class="btn btn-success col-5">Edit Emplooye</button>
        </div>
       
    </form>
</div>



    
@endsection