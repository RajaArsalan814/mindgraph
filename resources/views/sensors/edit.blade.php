@extends('layouts.master')
@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Sensor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Sensor</li>
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
            <form action="{{route('sensors.update',['id' => $sensor->id])}}" method="POST" >
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control"  placeholder="Enter Name" name="name" value="{{$sensor->name}}" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Metro Code</label>
                        <input type="text" class="form-control"  placeholder="Enter metro Code" name="code" value="{{$sensor->code}}" required>
                    </div>

                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control" >
                        <option disabled >Select Status</option>
                        <option value="1" @if($sensor->status == '1') selected @endif>Active</option>
                        <option value="0" @if($sensor->status == '0') selected @endif>DeActive</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update">
                </div>
              </form>
            </div>
        </div>

        </div>
      </div>
    </section>
   @endsection
