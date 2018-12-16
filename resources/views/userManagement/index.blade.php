@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table table-active table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    Name
                                </td>
                                <td>
                                    Email
                                </td>
                                <td>
                                    Active
                                </td>
                                <td>
                                    Actions
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->active}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            {{$users->links()}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
