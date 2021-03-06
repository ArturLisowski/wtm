@extends('layouts.userManagement.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                <form name="userEdit" action="{{route('editUser')}}" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="userEditModalId" name="id" value="">
                        <input type="text" id="userEditModalName" name="name" class="form-control" placeholder="Name" autofocus required>
                        <input type="email" id="userEditModalEmail" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <input type="password" name="rePassword" class="form-control" placeholder="Retype password">
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
            document.getElementById("userEditModalName").value = name;
            document.getElementById("userEditModalEmail").value = email;
            document.getElementById("userEditModalId").value = id;
        }
    </script>

@endsection
@section('logs')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Last changes</div>
                    <div class="card-body">
                        <table class="table table-active table-hover table-striped table-bordered text-center">
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>
                                        <a class="text-black" href="" title="edit" data-toggle="modal" data-target="#detailedLogsModal"
                                           onclick="insertDataForDetailedLogsModal('{{$log->message}}','{{$log->url}}','{{$log->created_at}}','{{$log->level}}','{{$log->userId}}')">
                                            {{$log->message}} <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            {{$logs->links()}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailedLogsModal" tabindex="-1" role="dialog" aria-labelledby="detailedLogsModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailedLogsModalLongTitle">Log details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                        <h3>Message</h3><span id="detailLogMessage"></span>
                        <h3>Url</h3><span id="detailLogUrl"></span>
                        <h3>Date</h3><span id="detailLogDate"></span>
                        <h3>Level</h3><span id="detailLogLevel"></span>
                        <h3>User</h3><span id="detailLogUser"></span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function insertDataForDetailedLogsModal(message, url, data, level, user) {
            document.getElementById("detailLogMessage").innerHTML = message;
            document.getElementById("detailLogUrl").innerHTML = url;
            document.getElementById("detailLogDate").innerHTML = data;
            document.getElementById("detailLogLevel").innerHTML = level;
            document.getElementById("detailLogUser").innerHTML = user;
        }
    </script>
@endsection
