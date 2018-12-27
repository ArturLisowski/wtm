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
                                        <a href="" title="edit" data-toggle="modal" data-target="#userEditModal"
                                           onclick="insertDataForUserEditModal('{{$user->id}}', '{{$user->name}}', '{{$user->email}}')">
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

    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="userEditModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userEditModalLongTitle">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="userEdit" action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="userEditModalId" name="id" value="">
                        <input type="text" id="userEditModalName" name="name" class="form-control" placeholder="Name" autofocus required>
                        <input type="email" id="userEditModalEmail" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <input type="rePassword" name="rePassword" class="form-control" placeholder="Retype password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>


            </div>
        </div>
    </div>

    <script>
        function insertDataForUserEditModal(id, name, email) {
            document.getElementById("userEditModalName").value=name;
            document.getElementById("userEditModalEmail").value=email;
            document.getElementById("userEditModalId").value=id;
        }

    </script>

@endsection
