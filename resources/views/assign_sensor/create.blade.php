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
            <div class="col-md-12">

            <div class="card card-primary">
            <form action="{{route('assign_sensor_store')}}" method="POST" >
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Station</label>
                        <select name="station_id" class="form-control" >
                            <option disabled  selected>Select Station</option>
                            @foreach ($station as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sensor</label>
                    <select name="sensor_id" class="form-control" >
                        <option disabled  selected>Select Sensor</option>
                        @foreach ($sensor as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  @if($errors->any())
                  {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary">
                </div>
              </form>
            </div>
        </div>

        </div>
      </div>
    </section>
    @endsection
