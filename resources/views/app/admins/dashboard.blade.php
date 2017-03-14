@extends('layouts.app')
@section('sidebar')
@include('layouts/admin')
@endsection
@section('h1','Admin')
@section('request','Dashboard')

@section('content')
<!-- dashboard -->
<script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/chart/canvasjs.min.js')}}"></script>
<script src="{{ URL::asset('resources/assets/js/dashboard.js')}}"></script>
   <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>$num_day}}<sup style="font-size: 20px">point</sup></h3>

              <p>Day Earn</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$num_week}}<sup style="font-size: 20px">point</sup></h3>
              <p>Week Earn</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>$num_month}}<sup style="font-size: 20px">point</sup></h3>
              <p>Month Earn</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>$num_total}}<sup style="font-size: 20px">point</sup></h3>
              <p>Total Earn</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <iframe src="http://acsystem.website/iframe.html" width="100%" height="120" style="border:none;box-shadow:0 0 5px red;border-radius:3px;">
      </iframe>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">



        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">


    </section>
    <!-- /.content -->
  <!-- jQuery Knob Chart -->
  <script src="{{ URL::asset('resources/assets/plugins/knob/jquery.knob.js')}}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ URL::asset('resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  <!-- Slimscroll -->
  <script src="{{ URL::asset('resources/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ URL::asset('resources/assets/plugins/fastclick/fastclick.js')}}"></script>
  <script src="{{ URL::asset('resources/assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
@endsection