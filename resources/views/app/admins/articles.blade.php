<?php 
  if($discount == 1){$num_all = $num_article_discount_ON;$title = "Articles &#8827; Discounting";}
  else {$num_all = $num_article_discount_OFF+$num_article_DEL;$title = "Articles &#8827; Normal";}
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
                  <th>Name
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">name</span>
                  </th>
                  <th>Userid
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">user_id</span>
                  </th>
                  <th>Category
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">category</span>
                  </th>
                  @if($discount == 1)
                  <th>General code
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">general_code</span>
                  </th>
                  @else
                  <th>Status
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">status</span>
                  </th>
                  @endif
                  <th>Start
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">start_5</span>
                  </th>
                  <th>Created at
                    <span class="sort"><i class="fa fa-arrows-v"></i></span>
                    <span class="sort_value">created_at</span>
                  </th>
                  <th>View
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($database as $row) 
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->user_id}}</td>
                      <td>{{$row->category}}</td>
                      @if($discount == 1)
                      <td>{{$row->general_code}}</td>
                      @else
                      <td class="{{($row->status == 1 ? 'text-success':'text-danger')}}"><strong>{{($row->status == 1 ? 'ON':'DEL')}}</strong></td>
                      @endif
                      <td>
                        @php($start = ( ($row->start_1==0) && ($row->start_2==0) && ($row->start_3==0) && ($row->start_4==0) && ($row->start_5==0) )? 0 : ( ($row->start_1 + $row->start_2*2 + $row->start_3*3 + $row->start_4*4 + $row->start_5*5) / ($row->start_1 + $row->start_2 + $row->start_3 + $row->start_4 + $row->start_5)))
                        @for($i = 1; $i <= 5; $i++)
                          @if($i <= $start) <i class="fa fa-star text-yellow" aria-hidden="true"></i>
                          @elseif($i - $start < 1) <i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
                          @else <i class="fa fa-star-o text-yellow" aria-hidden="true"></i>
                          @endif
                        @endfor
                        {{round($start,2)}}
                      </td>
                      <td>{{$row->created_at}}</td>
                      <td>
                        <form>
                          <button class="btn btn-info">View</button>
                        </form>
                      </td>
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