<?php 
  if($lever == 1){$num_all = $num_admin;$title = "Admins";}
  else {$num_all = $num_member_active+$num_member_banned;$title = "Members";}
?>
@extends('layouts.app')
<!-- SIDEBAR -->
@section('sidebar')
  @include('layouts/admin')
@endsection
<!-- LINK -->
@section('header_link')
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Pagination -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/pagination/style.css')}}" media="screen"/>
@endsection
@section('footer_link')
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/pagination/jquery.paginate.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/js/admin.js')}}"></script>
@endsection

@section('request',$title)

@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
              <input type="hidden" name="num_table" id="num_table" value="{{$num_all}}">
              @if (session('text'))
                <p id="response">{{ session('text') }}</p>
              @endif
              @if ($lever == 1)
                <form class="pull-right">
                  <button class="btn btn-info">ADD</button>
                </form>
              @endif
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-6">
                <span>Show</span>
                <select class="form-control" id="show_table">
                  <option value="10">10</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
                <span>entries</span>
              </div>
              <div class="col-xs-6">
                <input type="text" name="search" class="form-control" placeholder="Search" id="search">
              </div>
              <table id="show" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID
                    <span class="sort"><i class="fa fa-sort-amount-desc active"></i></span>
                    <span class="sort_value">id</span>
                  </th>
                  <th>Username
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">username</span>
                  </th>
                  <th>Email
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">email</span>
                  </th>
                  <th>Name
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">name</span>
                  </th>
                  <th>Date Create
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">created_at</span>
                  </th>
                  <th>Views
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">verify</span>
                  </th>
                  <th>
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($database as $row) 
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->username}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>
                        <form action="{{ url('/superadmin/user').'/'.$row->id}}">
                          <button class="btn btn-info">View</button>
                        </form>
                      </td>
                      <td><img src=" {{ url('img/') }}/{{ ($row->verify==1 ? 'tick': 'untick') }}.png" alt="check"></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div>
                <p>Showing <span id="info">1 to 10 of </span>{{$num_all}} entries</p>
              </div>
              <div id="pagination"  class="pull-right">{{$num_all}}</div>
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