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


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Slug</th>
            <th width="280px">Action</th>
        </tr>
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
        @endforeach
    </table>


    {!! $events->render() !!}
@endsection
