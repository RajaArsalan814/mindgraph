@extends('layouts.master')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Event List</h2>
                </div>
                <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{route('events.search_filter')}}" method="POST">
            <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                    </div>
                </div>
                @csrf
                <div class="col-md-2">
                    <br>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Search">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Slug</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @if (isset($events))
            @foreach ($events as $key => $event)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->slug }}</td>
                    <td>
                        <a class="border-0 btn-transition btn btn-outline-success" href="{{ url('events/'.$event->id) }}"><i class="fa fa-eye" style="color: green;"></i></a>
                        <a class="border-0 btn-transition btn btn-outline-info" href="{{ url('events/edit/'.$event->id) }}"><i class="fa fa-edit"></i></a>
                        {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['events.destroy', $event->id],'style'=>'display:inline']) !!}
                        {!! Form::hidden('id', $event->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}
                        {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Page"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
            @endforeach
        @else
            @foreach ($event_search as $key => $event)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->slug }}</td>
                        <td>
                            <a class="border-0 btn-transition btn btn-outline-success" href="{{ url('events/'.$event->id) }}"><i class="fa fa-eye" style="color: green;"></i></a>
                            <a class="border-0 btn-transition btn btn-outline-info" href="{{ url('events/edit/'.$event->id) }}"><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['events.destroy', $event->id],'style'=>'display:inline']) !!}
                            {!! Form::hidden('id', $event->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}
                            {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Page"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>
                @endforeach
        @endif
    </table>
    @if (isset($events))
    {!! $events->render() !!}
    @endif


@endsection
