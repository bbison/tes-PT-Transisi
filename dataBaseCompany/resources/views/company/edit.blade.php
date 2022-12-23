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
    <form action="/company/{{$company->id}}" method="post" class="col-6 mt-2 bg-white p-4" enctype="multipart/form-data">
        <input type="hidden" name="oldimage" value="{{$company->logo}}">
        @csrf
        @method('PUT')
        @if ($company->logo)
        <div class="d-flex justify-content-center">
            <div class="col-sm-4">
                <img class="img-preview " style="display: block;" src="{{ asset('/storage/'.$company->logo) }}" width="100%">
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center">
            <div class="col-sm-4">
                <img class="img-preview " style="display: block;" src="" width="100%">
            </div>
        </div>
        @endif
       
        <label for="name" class="form-label">Company Name</label>
        <input type="text" name="name" value="{{$company->name}}" id="name" placeholder="Company Name..." required class="form-control">
        @error('name')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="name" value="{{$company->email}}" placeholder="Email..." required class="form-control">
        @error('email')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <label for="name" class="form-label">Website</label>
        <input type="text" name="website" value="{{$company->website}}" id="name" placeholder="Company Name..." required class="form-control">
        @error('website')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <label for="logo" class="form-label">Company Logo</label>
        <input type="file" name="logo" id="image" onchange="previewImage()" required class="form-control">
        @error('logo')
        <small class="text-danger d-block"> {{$message}}</small>
        @enderror
        <div class="d-flex mt-2 justify-content-center">
            <button class="btn btn-success col-4">Edit Data</button>
        </div>
       
    </form>
</div>


<script>
    
    function previewImage(){
     const image= document.querySelector('#image');
     const imgPreview = document.querySelector('.img-preview');
 
     imgPreview.style.display='block';
 
     const oFReader = new FileReader();
     oFReader.readAsDataURL(image.files[0]);
 
     oFReader.onload = function(oFREvent){
         imgPreview.src = oFREvent.target.result;
     }
    }
 
 
 </script>
    
@endsection