@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="d-flex col-12">
                        <div class="col-6 text-center">
                             <a href="/company" class="nav-link mt-3">
                                <img src="https://asset.kompas.com/crops/x6Fz7jwP6jfFi9lUqk4nGFR5A2M=/1135x0:6669x3689/750x500/data/photo/2022/02/09/620369c5b2b3a.jpg" width="70%" alt=""><br>
                                Company
                            </a> 
                        </div>
                        <div class="col-6 text-center">
                             <a href="/employee" class="nav-link">
                                <img width="80%" src="https://cdn.pixabay.com/photo/2018/11/25/06/19/typing-3836859_640.png" alt="" srcset=""> <br>
                                Employe
                            </a> 
                        </div>
                       
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
