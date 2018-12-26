@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table table-active table-hover table-striped table-bordered text-center">
                            <thead>
                            <tr>

                                <td>
                                    #
                                </td>
                                <td>
                                    <a href="{{url('/userManagement/name/'.$formMethod)}}">
                                        <div style="height:100%;width:100%">
                                            Name
                                            @if($orderBy == 'name')
                                                @if($formMethod == 'ASC')
                                                    <i class="fas fa-arrow-down"></i>
                                                @else
                                                    <i class="fas fa-arrow-up"></i>
                                                @endif
                                            @endif
                                        </div>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{url('/userManagement/email/'.$formMethod)}}">
                                        <div style="height:100%;width:100%">
                                            Email
                                            @if($orderBy == 'email')
                                                @if($formMethod == 'ASC')
                                                    <i class="fas fa-arrow-down"></i>
                                                @else
                                                    <i class="fas fa-arrow-up"></i>
                                                @endif
                                            @endif
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('/userManagement/active/'.$formMethod)}}">
                                        <div style="height:100%;width:100%">
                                            Active
                                            @if($orderBy == 'active')
                                                @if($formMethod == 'ASC')
                                                    <i class="fas fa-arrow-down"></i>
                                                @else
                                                    <i class="fas fa-arrow-up"></i>
                                                @endif
                                            @endif
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('/userManagement/isAdmin/'.$formMethod)}}">
                                        <div style="height:100%;width:100%">
                                            Admin
                                            @if($orderBy == 'isAdmin')
                                                @if($formMethod == 'ASC')
                                                    <i class="fas fa-arrow-down"></i>
                                                @else
                                                    <i class="fas fa-arrow-up"></i>
                                                @endif
                                            @endif
                                        </div>
                                    </a>
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
                                    <td>
                                        @if($user->active)
                                            <i class="fas fa-lock-open"></i>
                                        @else
                                            <i class="fas fa-lock"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->isAdmin)
                                            <i class="far fa-check-circle"></i>
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->active)
                                            <a href="{{url('/userManagement/setActive/'.$user->id)}}"
                                               onclick="return confirm('You Are trying deactivate: {{$user->name}}, {{$user->email}}. Are you sure?')" title="Deactivate">
                                                <i class="fas fa-lock"></i>
                                            </a>
                                        @else
                                            <a href="{{url('/userManagement/setActive/'.$user->id)}}"
                                               onclick="return confirm('You Are trying activate: {{$user->name}}, {{$user->email}}. Are you sure?')" title="Activate">
                                                <i class="fas fa-lock-open"></i>
                                            </a>
                                        @endif
                                        <a href="" title="edit">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        @if($user->isAdmin)
                                            <a href="{{url('/userManagement/setAdmin/'.$user->id)}}"
                                               onclick="return confirm('You Are trying make not admin: {{$user->name}}, {{$user->email}}. Are you sure?')"
                                               title="Make this user not admin">
                                                <i class="fas fa-user-tie disactive"></i>
                                            </a>
                                        @else
                                            <a href="{{url('/userManagement/setAdmin/'.$user->id)}}"
                                               onclick="return confirm('You Are trying make an admin: {{$user->name}}, {{$user->email}}. Are you sure?')"
                                               title="Make this user admin">
                                                <i class="fas fa-user-tie active"></i>
                                            </a>
                                        @endif

                                    </td>
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
