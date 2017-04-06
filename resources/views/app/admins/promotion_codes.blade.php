<?php 
  $num_all = $num_promotion_codes;$title = "Promotion codes";
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

@section('request',$title)le)

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
                  <th>General code
                    <span class="sort"><i class="fa fa-sort-amount-desc active"></i></span>
                    <span class="sort_value">general_code</span>
                  </th>
                  <th>Article name [id]
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">article_id</span>
                  </th>
                  <th>Username [id]
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">user_id</span>
                  </th>
                  <th>Code
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">code</span>
                  </th>
                  <th>Discount
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">rate</span>
                  </th>
                  <th>Created at
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">created_at</span>
                  </th>
                  <th>
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($database as $row) 
                    <tr>
                      <td>{{$row->general_code}}</td>
                      <td>{{$row->name}}[{{$row->article_id}}]</td>
                      <td>{{$row->username}}[{{$row->user_id}}]</td>
                      <td>{{$row->code}}</td>
                      <td>{{$row->rate}} %</td>
                      <td>{{$row->created_at}}</td>
                      <td><img src=" {{ url('img/') }}/{{ ($row->rate == 10 ? 'tick': 'untick') }}.png" alt="check"></td>
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