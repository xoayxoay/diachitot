<?php 
  $title="user";
?>
@extends('layouts.app')
<!-- SIDEBAR -->
@section('sidebar')
  @include('layouts/admin')
@endsection
<!-- LINK -->
@section('header_link')
  <!-- Pagination -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/pagination/style.css')}}" media="screen"/>
@endsection
@section('footer_link')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/pagination/jquery.paginate.js')}}"></script>
  <script type="text/javascript">
    $("#avatar-user-file").change(function(){
      var preview = $("#avatar-user-img"); //selects the query named img
      var file    = document.getElementById('avatar-user-file').files[0]; //sames as here
      var reader  = new FileReader();
      reader.onloadend = function () {
        $("#avatar-user-img").attr("src",reader.result);
      }
      if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
      } else {
        $("#avatar-user-img").attr("src","");
      }
    });
  </script>
@endsection

@section('request',$title)

@section('content')
  @if (session('text'))
    <p id="response">{{ session('text') }}</p>
  @endif
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4 connectedSortable">
          <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Userid : {{$database->id}}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form>
                  <!-- text input -->
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" disabled value="{{$database->username}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <i class="fa fa-{{ ($database->verify==1 ? 'check': 'times') }}" aria-hidden="true"></i>
                    <input type="text" class="form-control" id="email" disabled value="{{$database->email}}">
                  </div>
                  <div class="form-group">
                    <label for="created_at">Created at</label>
                    <input type="text" class="form-control" id="created_at" disabled value="{{$database->created_at}}">
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Lever : {{ $lever = ($database->lever == 1 ? 'Admin' : 'Member')}}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {!! Form::model($database,[ 'method' => 'PATCH', 'action' => ['UsersController@update', $database->id] ]) !!}
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control" name="lever">
                      <option value="0">Member</option>
                      <option value="1" {{($database->lever == 1 ? 'selected' : '')}}>Admin</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-info">CHANGE</button>
                  </div>
                {!! Form::close() !!}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 connectedSortable">
          <!-- general form elements disabled -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Avatar</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {!! Form::open(array('url'=>'user_change_avatar','method'=>'POST', 'files'=>true)) !!}
                  <div class="form-group">
                    <div class="text-center">
                      @php($avatar = json_decode($database->avatar))
                      <img src="
                      @if($avatar['0']==1)
                        {{ url('img/avatar') }}/{{ $avatar['1'] }}.jpg 
                      @else
                        {{ $avatar['1'] }}
                      @endif
                      " class="user-image" id="avatar-user-img" alt="User Image" width="70%" height="200px">
                    </div>
                    <input type="hidden" name="userid" value="{{$database->id}}">
                  </div>
                  <div class="form-group">
                    <input type="file" name="avatar-file" id="avatar-user-file">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-info">CHANGE</button>
                  </div>
                {!! Form::close() !!}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->  
        <div class="col-md-4 connectedSortable">
          <!-- general form elements disabled -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {!! Form::model($database,[ 'method' => 'PATCH', 'action' => ['UsersController@update', $database->id] ]) !!}
                  <!-- text input -->
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$database->name}}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$database->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$database->address}}">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-info">CHANGE</button>
                  </div>
                {!! Form::close() !!}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection