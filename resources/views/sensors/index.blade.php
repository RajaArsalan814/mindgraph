@extends('layouts.master')
@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sensors</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sensors</li>
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
                @can('sensor-create')
                <div class="col-md-4" align="right"><a class="btn btn-primary" href="{{route('sensors.create')}}" >Add Sensor</a></div> <br><br>
                @endcan
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    @can('sensor-status')
                    <th scope="col">Status</th>
                    @endcan
                    <th scope="col">Create</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($sensors as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->code}}</td>
                        @can('sensor-status')
                        <td>
                            <input data-id="{{$item->id}}" onchange="myFunction({{$item->id}},{{$item->status}})" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
                        </td>
                        @endcan
                        <td>{{$item->created_at}}</td>
                        <td>
                            @can('sensor-edit')
                            <a href="{{route('sensors.edit',['id'=>$item->id])}}"><i class="fas fa-edit" style="color:green"></i></a>
                            @endcan
                            /
                            @can('sensor-delete')
                            <a href="{{route('sensors.delete',['id'=>$item->id])}}"><i class="fas fa-trash" style="color:red"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>

    </section>
    <script>
        function myFunction(id,status) {
           var id = id;
           var status = (status ? '0' : '1');
           $.ajax({
                 type: "GET",
                 dataType: "json",
                 url: 'change_status',
                 data: {'id': id,'status': status},
                 success: function(data){
                   console.log(data.success)
                 }
             });

       }
     </script>
@endsection
