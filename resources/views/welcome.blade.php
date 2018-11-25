@extends('layouts.welcome')

@section('content')
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-xs-12 col-md-12 col-lg-12 title">
            Working Time Management
        </div>
    </div>
    <div class="row">
        <form name="login" action="{{ route('login') }}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <input type="text" name="email" placeholder="Email" class="form-control" required autofocus>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <input type="password" name="password" placeholder="Password" class="form-control" required >
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <input type="submit" value="LogIn" class="btn btn-danger form-control">
            </div>
        </form>


    </div>
</div>
@endsection