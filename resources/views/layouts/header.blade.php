<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ĐCT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">ĐỊA CHỈ TỐT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @php($avatar = json_decode(Auth::user()->avatar))
              <img src="
              @if($avatar['0']==1)
                {{ url('img/avatar') }}/{{ $avatar['1'] }}.jpg 
              @else
                {{ $avatar['1'] }}
              @endif
              " class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->username }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="
                @if($avatar['0']==1)
                  {{ url('img/avatar') }}/{{ $avatar['1'] }}.jpg 
                @else
                  {{ $avatar['1'] }}
                @endif
                " class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->username }}
                  <small>Member of team offer</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat" id="profile">Avatar</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="btn btn-default btn-flat">Log out</a>
                </div>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div id="avatar" style="display:none;position:fixed;top:7%;right:3%;z-index:9999;border:2px solid #035d8d;border-radius:6px;text-align:center;background:rgba(0,128,197,0.8);padding:10px;">
    <span id="close" style="position:absolute;right:5px;top:5px;cursor:pointer;border-radius:50%;font-weight:bold;border:2px solid #035d8d;padding:2px 8px;">X</span>
    <img src="
              @if($avatar['0']==1)
                {{ url('img/avatar') }}/{{ $avatar['1'] }}.jpg 
              @else
                {{ $avatar['1'] }}
              @endif
              " class="img-circle" alt="User Image" id="avatar-img" style="width:100px;height:100px;box-shadow:0 0 3px gray;">
    {!! Form::open(array('url'=>'user_change_avatar','method'=>'POST', 'files'=>true)) !!}
      <input type="file" name="avatar-file" id="avatar-file" style="position:relative;z-index:2;">
      <input type="hidden" name="userid" value="{{Auth::user()->id}}">
      <button class="btn btn-info btn-sm" name="avatar-but">CHANGE</button>
    {!! Form::close() !!}
  </div>
  <script type="text/javascript">
    $("#profile").click(function(){
      $("#avatar").show();
    });
    $("#close").click(function(){
      $("#avatar").hide();
    });
    $("#avatar-file").change(function(){
      var preview = $("#avatar-img"); //selects the query named img
      var file    = document.querySelector('input[type=file]').files[0]; //sames as here
      var reader  = new FileReader();
      reader.onloadend = function () {
        $("#avatar-img").attr("src",reader.result);
      }
      if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
      } else {
        $("#avatar-img").attr("src","");
      }
    });
  </script>