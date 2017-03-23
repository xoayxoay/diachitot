@extends('layouts.app')
@section('sidebar')
@include('layouts/admin')
@endsection
@section('h1','Admin')
@section('request',ucfirst($lever))

@section('content')
  <?php 
    if($lever == 2){$num_all = $num_admin;$title = "Admins";}
    else if($lever=="1") {$num_all = $num_customer;$title = "Customers";}
    else {$num_all = $num_member;$title = "Members";}
  ?>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Pagination -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/pagination/style.css')}}" media="screen"/>
  <style type="text/css">
    .sort{
      color:#cccccc;
      padding-left: 2px;
      cursor: pointer;
    }
    .sort_value{  
      display: none;
    }
  </style>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
              <input type="hidden" name="num_table" id="num_table" value="{{$num_all}}">
              @if (session('text'))
                <p style="color:#1E90FF;text-align:center;font-weight: bold;">{{ session('text') }}</p>
              @endif
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-6">
                <span style="display:inline-block">Show</span>
                <select class="form-control" style="display:inline-block;width:70px;" id="show_table">
                  <option value="10">10</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
                <span style="display:inline-block">entries</span>
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
                  <th>Address
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">address</span>
                  </th>
                  <th>Bank
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">bank</span>
                  </th>
                  <th>Date Create
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">created_at</span>
                  </th>
                  <th>Verify
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">verify</span>
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $row) 
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->username}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->address}}</td>
                      <td>{{$row->bank}}</td>
                      <td>{{$row->created_at}}</td>
                      <td><img src=" {{ url('img/') }}/{{ $verify = ($row->verify==1 ? 'tick': 'untick') }}.png" alt="check"></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div>
                <p>Showing <span id="info">1 to 10 of </span>{{$num_all}} entries</p>
              </div>
              <div id="pagination" style="float: right;width:270px;">{{$num_all}}</div>
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
    <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/select2/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/pagination/jquery.paginate.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/js/table2.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/js/check.js')}}"></script>
@endsection