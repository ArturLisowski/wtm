@extends('layouts.home.index')

@section('timeManagement')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sign your work Time</div>
                    <div class="card-body">
                        @if(empty($_workingTime['startTime']))
                            <form name="StartWork" action="{{route('saveStartTime')}}" method="post">
                                <div class="col-2">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input class="form-control" type="time" name="startTime" autofocus>
                                </div>
                                <div class="col-2">
                                    <input class="form-control btn btn-primary" type="submit" value="Save start time">
                                </div>
                            </form>
                        @else
                            @if(empty($_workingTime['endTime']))
                                <form name="SEndWork" action="{{route('saveEndTime')}}" method="post">
                                    <div class="col-2">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="form-control" type="time" name="endTime" autofocus>
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control btn btn-primary" type="submit" value="Save end time">
                                    </div>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
