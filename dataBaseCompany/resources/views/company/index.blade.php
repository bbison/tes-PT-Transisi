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


<div class="d-flex mt-2 justify-content-center">
    <div class="col-8">
        <a href="/company/create" class="btn btn-success m-2">Add Company</a>              <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Import Data company
          </button>
          @error('fileexel')
          <small class="text-danger d-block"> {{$message}}</small>
          @enderror
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success </strong>{{session('success')}} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('field'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Field </strong>{{session('field')}} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="" method="get" class="d-inline mb-3">
            <input type="text" class="form-control " placeholder="Search Company" onkeyup="ajax(this.value)">
            
          </form>
          <div class="show bg-white border" id="show">
        </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/importcompany" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            
                <input type="file" name="fileexel" id="" required>
             
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
      <table class="table mt-2">
        <tr class="table table-primary">
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Website</td>
            <td class="text-center">Logo</td>
            <td>Action</td>
        </tr>
        @foreach ($companys as $company)
            <tr>
                <td>{{$loop->iteration + $companys->firstItem()-1}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{ Str::limit($company->website, 15) }}</td>
                <td class="col-2">
                    <div class="d-flex justify-content-center">
                        <img width="50%" src="{{asset('/storage/'.$company->logo)}}" alt="">
                    </div>
                </td>
                <td class="">
                    <a href="/company/{{$company->id}}/edit" class=" btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                          </svg>
                    </a>

                    <form action="/company/{{$company->id}}" class="d-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to Delete this Data ?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                    </button>
                    </form>
                    <a href="/company/detail/{{$company->id}}" class="btn btn-primary"> Detail</a>
                </td>
            </tr>
        @endforeach
      </table>
    </div>
</div>

<div class="justify-content-center d-flex">
    {{$companys->links()}}
</div>
<script>
    function ajax(str) {
    if (str == "") {
  document.getElementById("show").innerHTML = "";
  return;
    } else {
  var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("show").innerHTML = this.responseText;
  }
  };
  xmlhttp.open("GET","/ajax/company/"+str,true);
      xmlhttp.send();
    }
  }
  </script>

    
@endsection