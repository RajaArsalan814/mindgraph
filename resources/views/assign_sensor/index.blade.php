@extends('layouts.master')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Assign Sensor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Assign Sensor</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div>
      <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4" align="right"><a class="btn btn-primary" href="{{route('assign_sensor_create')}}" >Assign Sensor</a></div> <br><br>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Station Name</th>
                    <th scope="col">Sensor Name</th>
                    <th scope="col">Assigning Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                        @foreach ($assign_sensor as $item)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$item->station->name}}</td>
                        <td>{{$item->sensor->name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td><a href="{{route('assign_sensor_delete',['id'=>$item->id])}}"><i class="fas fa-trash" style="color:red"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>

    </section>
@endsection
