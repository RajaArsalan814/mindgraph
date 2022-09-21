@extends('layouts.master')
@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Event</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="container-fluid card">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $event->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                {{ $event->slug }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created at:</strong>
                {{$event->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
