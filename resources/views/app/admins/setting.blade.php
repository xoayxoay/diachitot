@extends('layouts.app')
<!-- SIDEBAR -->
@section('sidebar')
  @include('layouts/admin')
@endsection
<!-- LINK -->
@section('header_link')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/select2/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/assets/plugins/custom-on-off/css/on-off-switch.css')}}"/>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/js/top.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/custom-on-off/js/on-off-switch.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/custom-on-off/js/on-off-switch-onload.js')}}"></script>
@endsection
@section('footer_link')
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/assets/js/check.js')}}"></script>
  <script type="text/javascript">
    /* General rules for all the switches in demo 5 */
    new DG.OnOffSwitch({
        el:'#lead-ban-but',
        textOn:"YES",
        height:35,
        textOff:"NO",
        textSizeRatio:0.35,
        listener:function(name, checked){
          $.ajax({
            url : "{{ url('setting/baniplead') }}",
            type : "get",
            data : {
              baniplead : checked
            },
            success : function(){
            }
          });
        }
    });
    new DG.OnOffSwitch({
        el:'#checkcountry-but',
        textOn:"YES",
        height:35,
        textOff:"NO",
        textSizeRatio:0.35,
        listener:function(name, checked){
          $.ajax({
            url : "{{ url('setting/checkcountry') }}",
            type : "get",
            data : {
              checkcountry : checked
            },
            success : function(){
            }
          });
        }
    });
  </script>
@endsection

@section('request',$title)

@section('content')
  @if (session('text'))
    <p id="response">{{ session('text') }}</p>
  @endif
<!-- Select2 -->
  <!-- Main content -->
    <section class="content">
      <!-- change pass -->
      <div class="row">
        <div class="col-md-4 connectedSortable">
          <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Change Pass</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {!! Form::open(['url'=>'users/password']) !!}
                  <!-- text input -->
                  <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }} has-feedback">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required placeholder="Current Password" >
                    @if ($errors->has('current_password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('current_password') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="6" >
                    @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <button name="change-pass-but" id="change-pass" class="btn btn-block btn-info">CHANGE</button>
                  </div>

                {!! Form::close() !!}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- timezone -->
        <div class="col-md-4 connectedSortable">
          <!-- general form elements disabled -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Timezone</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form method="get">
                  <!-- text input -->
                  <div class="form-group">
                    <input type="text" class="form-control text-center" disabled value="{{ config('app.timezone', 'Laravel') }}">
                    <select class="form-control select2" name="timezone_default">
                      <option value='Pacific/Midway' >(GMT-11:00) Midway Island</option><option value='Pacific/Samoa' >(GMT-11:00) Samoa</option><option value='Pacific/Honolulu' >(GMT-10:00) Hawaii</option><option value='US/Alaska' >(GMT-09:00) Alaska</option><option value='America/Los_Angeles' >(GMT-08:00) Pacific Time (US &amp; Canada)</option><option value='America/Tijuana' >(GMT-08:00) Tijuana</option><option value='US/Arizona' >(GMT-07:00) Arizona</option><option value='America/Chihuahua' >(GMT-07:00) Chihuahua</option><option value='America/Chihuahua' >(GMT-07:00) La Paz</option><option value='America/Mazatlan' >(GMT-07:00) Mazatlan</option><option value='US/Mountain' >(GMT-07:00) Mountain Time (US &amp; Canada)</option><option value='America/Managua' >(GMT-06:00) Central America</option><option value='US/Central' >(GMT-06:00) Central Time (US &amp; Canada)</option><option value='America/Mexico_City' >(GMT-06:00) Guadalajara</option><option value='America/Mexico_City' >(GMT-06:00) Mexico City</option><option value='America/Monterrey' >(GMT-06:00) Monterrey</option><option value='Canada/Saskatchewan' >(GMT-06:00) Saskatchewan</option><option value='America/Bogota' >(GMT-05:00) Bogota</option><option value='US/Eastern'>(GMT-05:00) Eastern Time (US &amp; Canada)</option><option value='US/East-Indiana' >(GMT-05:00) Indiana (East)</option><option value='America/Lima' >(GMT-05:00) Lima</option><option value='America/Bogota' >(GMT-05:00) Quito</option><option value='Canada/Atlantic' >(GMT-04:00) Atlantic Time (Canada)</option><option value='America/Caracas' >(GMT-04:30) Caracas</option><option value='America/La_Paz' >(GMT-04:00) La Paz</option><option value='America/Santiago' >(GMT-04:00) Santiago</option><option value='Canada/Newfoundland' >(GMT-03:30) Newfoundland</option><option value='America/Sao_Paulo' >(GMT-03:00) Brasilia</option><option value='America/Argentina/Buenos_Aires' >(GMT-03:00) Buenos Aires</option><option value='America/Argentina/Buenos_Aires' >(GMT-03:00) Georgetown</option><option value='America/Godthab' >(GMT-03:00) Greenland</option><option value='America/Noronha' >(GMT-02:00) Mid-Atlantic</option><option value='Atlantic/Azores' >(GMT-01:00) Azores</option><option value='Atlantic/Cape_Verde' >(GMT-01:00) Cape Verde Is.</option><option value='Africa/Casablanca' >(GMT+00:00) Casablanca</option><option value='Europe/London' >(GMT+00:00) Edinburgh</option><option value='Etc/Greenwich' >(GMT+00:00) Greenwich Mean Time : Dublin</option><option value='Europe/Lisbon' >(GMT+00:00) Lisbon</option><option value='Europe/London' >(GMT+00:00) London</option><option value='Africa/Monrovia' >(GMT+00:00) Monrovia</option><option value='UTC' >(GMT+00:00) UTC</option><option value='Europe/Amsterdam' >(GMT+01:00) Amsterdam</option><option value='Europe/Belgrade' >(GMT+01:00) Belgrade</option><option value='Europe/Berlin' >(GMT+01:00) Berlin</option><option value='Europe/Berlin' >(GMT+01:00) Bern</option><option value='Europe/Bratislava' >(GMT+01:00) Bratislava</option><option value='Europe/Brussels' >(GMT+01:00) Brussels</option><option value='Europe/Budapest' >(GMT+01:00) Budapest</option><option value='Europe/Copenhagen' >(GMT+01:00) Copenhagen</option><option value='Europe/Ljubljana' >(GMT+01:00) Ljubljana</option><option value='Europe/Madrid' >(GMT+01:00) Madrid</option><option value='Europe/Paris' >(GMT+01:00) Paris</option><option value='Europe/Prague' >(GMT+01:00) Prague</option><option value='Europe/Rome' >(GMT+01:00) Rome</option><option value='Europe/Sarajevo' >(GMT+01:00) Sarajevo</option><option value='Europe/Skopje' >(GMT+01:00) Skopje</option><option value='Europe/Stockholm' >(GMT+01:00) Stockholm</option><option value='Europe/Vienna' >(GMT+01:00) Vienna</option><option value='Europe/Warsaw' >(GMT+01:00) Warsaw</option><option value='Africa/Lagos' >(GMT+01:00) West Central Africa</option><option value='Europe/Zagreb' >(GMT+01:00) Zagreb</option><option value='Europe/Athens' >(GMT+02:00) Athens</option><option value='Europe/Bucharest' >(GMT+02:00) Bucharest</option><option value='Africa/Cairo' >(GMT+02:00) Cairo</option><option value='Africa/Harare' >(GMT+02:00) Harare</option><option value='Europe/Helsinki' >(GMT+02:00) Helsinki</option><option value='Europe/Istanbul' >(GMT+02:00) Istanbul</option><option value='Asia/Jerusalem' >(GMT+02:00) Jerusalem</option><option value='Europe/Helsinki' >(GMT+02:00) Kyiv</option><option value='Africa/Johannesburg' >(GMT+02:00) Pretoria</option><option value='Europe/Riga' >(GMT+02:00) Riga</option><option value='Europe/Sofia' >(GMT+02:00) Sofia</option><option value='Europe/Tallinn' >(GMT+02:00) Tallinn</option><option value='Europe/Vilnius' >(GMT+02:00) Vilnius</option><option value='Asia/Baghdad' >(GMT+03:00) Baghdad</option><option value='Asia/Kuwait' >(GMT+03:00) Kuwait</option><option value='Europe/Minsk' >(GMT+03:00) Minsk</option><option value='Africa/Nairobi' >(GMT+03:00) Nairobi</option><option value='Asia/Riyadh' >(GMT+03:00) Riyadh</option><option value='Europe/Volgograd' >(GMT+03:00) Volgograd</option><option value='Asia/Tehran' >(GMT+03:30) Tehran</option><option value='Asia/Muscat' >(GMT+04:00) Abu Dhabi</option><option value='Asia/Baku' >(GMT+04:00) Baku</option><option value='Europe/Moscow' >(GMT+04:00) Moscow</option><option value='Asia/Muscat' >(GMT+04:00) Muscat</option><option value='Europe/Moscow' >(GMT+04:00) St. Petersburg</option><option value='Asia/Tbilisi' >(GMT+04:00) Tbilisi</option><option value='Asia/Yerevan' >(GMT+04:00) Yerevan</option><option value='Asia/Kabul' >(GMT+04:30) Kabul</option><option value='Asia/Karachi' >(GMT+05:00) Islamabad</option><option value='Asia/Karachi' >(GMT+05:00) Karachi</option><option value='Asia/Tashkent' >(GMT+05:00) Tashkent</option><option value='Asia/Calcutta' >(GMT+05:30) Chennai</option><option value='Asia/Kolkata' >(GMT+05:30) Kolkata</option><option value='Asia/Calcutta' >(GMT+05:30) Mumbai</option><option value='Asia/Calcutta' >(GMT+05:30) New Delhi</option><option value='Asia/Calcutta' >(GMT+05:30) Sri Jayawardenepura</option><option value='Asia/Katmandu' >(GMT+05:45) Kathmandu</option><option value='Asia/Almaty' >(GMT+06:00) Almaty</option><option value='Asia/Dhaka' >(GMT+06:00) Astana</option><option value='Asia/Dhaka' >(GMT+06:00) Dhaka</option><option value='Asia/Yekaterinburg' >(GMT+06:00) Ekaterinburg</option><option value='Asia/Rangoon' >(GMT+06:30) Rangoon</option><option value='Asia/Bangkok' >(GMT+07:00) Bangkok</option><option value='Asia/Ho_Chi_Minh'  selected='selected'>(GMT+07:00) Ho Chi Minh</option><option value='Asia/Jakarta' >(GMT+07:00) Jakarta</option><option value='Asia/Novosibirsk' >(GMT+07:00) Novosibirsk</option><option value='Asia/Hong_Kong'>(GMT+08:00) Beijing</option><option value='Asia/Chongqing' >(GMT+08:00) Chongqing</option><option value='Asia/Hong_Kong'>(GMT+08:00) Hong Kong</option><option value='Asia/Krasnoyarsk' >(GMT+08:00) Krasnoyarsk</option><option value='Asia/Kuala_Lumpur' >(GMT+08:00) Kuala Lumpur</option><option value='Australia/Perth' >(GMT+08:00) Perth</option><option value='Asia/Singapore' >(GMT+08:00) Singapore</option><option value='Asia/Taipei' >(GMT+08:00) Taipei</option><option value='Asia/Ulan_Bator' >(GMT+08:00) Ulaan Bataar</option><option value='Asia/Urumqi' >(GMT+08:00) Urumqi</option><option value='Asia/Irkutsk' >(GMT+09:00) Irkutsk</option><option value='Asia/Tokyo' >(GMT+09:00) Osaka</option><option value='Asia/Tokyo' >(GMT+09:00) Sapporo</option><option value='Asia/Seoul' >(GMT+09:00) Seoul</option><option value='Asia/Tokyo' >(GMT+09:00) Tokyo</option><option value='Australia/Adelaide' >(GMT+09:30) Adelaide</option><option value='Australia/Darwin' >(GMT+09:30) Darwin</option><option value='Australia/Brisbane' >(GMT+10:00) Brisbane</option><option value='Australia/Canberra' >(GMT+10:00) Canberra</option><option value='Pacific/Guam' >(GMT+10:00) Guam</option><option value='Australia/Hobart' >(GMT+10:00) Hobart</option><option value='Australia/Melbourne' >(GMT+10:00) Melbourne</option><option value='Pacific/Port_Moresby' >(GMT+10:00) Port Moresby</option><option value='Australia/Sydney' >(GMT+10:00) Sydney</option><option value='Asia/Yakutsk' >(GMT+10:00) Yakutsk</option><option value='Asia/Vladivostok' >(GMT+11:00) Vladivostok</option><option value='Pacific/Auckland' >(GMT+12:00) Auckland</option><option value='Pacific/Fiji' >(GMT+12:00) Fiji</option><option value='Pacific/Kwajalein' >(GMT+12:00) International Date Line West</option><option value='Asia/Kamchatka' >(GMT+12:00) Kamchatka</option><option value='Asia/Magadan' >(GMT+12:00) Magadan</option><option value='Pacific/Fiji' >(GMT+12:00) Marshall Is.</option><option value='Asia/Magadan' >(GMT+12:00) New Caledonia</option><option value='Asia/Magadan' >(GMT+12:00) Solomon Is.</option><option value='Pacific/Auckland' >(GMT+12:00) Wellington</option><option value='Pacific/Tongatapu' >(GMT+13:00) Nuku'alofa</option>            
                    </select>
                  </div>
                  <div class="form-group">
                    <button name="change-time-but" class="btn btn-block btn-info">ADD</button>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- general form elements disabled -->
            <!-- chatbox -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Chatbox</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form method="get" action="{{url('setting/resetchat')}}">
                  <!-- text input -->
                  <div class="form-group">
                    <button name="reset-chatbox-but" class="btn btn-block btn-info">Reset</button>
                  </div>
                </form>
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
