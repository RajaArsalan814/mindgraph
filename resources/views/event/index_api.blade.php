@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>External Api Event List</h2>
                </div>
                {{-- <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
                </div> --}}
            </div>
        </div>
    </div>




    <table class="table table-bordered" >
        <thead>

            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody id="test">

        </tbody>
        <tbody>

        </tbody>

    </table>
    <script>

$(document).ready(function () {

    $.ajax({
        url: "{{route('api_routes')}}",
        type: 'GET',
        success: function(data){
            $.each(data, function (i, item) {
                $("#test").append('<tr><td>'+item.id+'</td><td>'+item.name+'</td><td>'+item.slug+'</td></tr>');
            });

        }
    })
});

    window.onload
    </script>

@endsection
