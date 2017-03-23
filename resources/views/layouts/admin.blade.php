<!-- sitebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @php($avatar = json_decode(Auth::user()->avatar))
          <img src="
            @if($avatar['0']==1)
              {{ url('img/avatar') }}/{{ $avatar['1'] }}.jpg 
            @else
              {{ $avatar['1'] }}
            @endif
            " class="img-circle" alt="User Image" style="height:50px;width:70px;">
        </div>
        <div class="pull-left info">
          <h5>{{ Auth::user()->username }}</h5>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="{{ url('/superadmin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-red">{{$num_admin}}</small>
              <small class="label pull-right bg-yellow">{{$num_customer}}</small>
              <small class="label pull-right bg-green">{{$num_member}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ url('/superadmin/users/2') }}"><i class="fa fa-circle-o"></i> Admin Manager
                <small class="label pull-right bg-red">{{$num_admin}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/superadmin/users/1') }}"><i class="fa fa-circle-o"></i> Customer
                <small class="label pull-right bg-yellow">{{$num_customer}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/superadmin/users/0') }}"><i class="fa fa-circle-o"></i> Member
                <small class="label pull-right bg-green">{{$num_member}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-blue">{{$num_article_DEL+$num_article_ON}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href=" url('/admin/offers/android') }}"><i class="fa fa-circle-o"></i> ON
                <small class="label pull-right bg-blue">{{$num_article_ON}}</small>
              </a>
            </li>
            <li>
              <a href=" url('/admin/offers/ios') }}"><i class="fa fa-circle-o"></i> DEL
                <small class="label pull-right">{{$num_article_DEL}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Requests</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-blue">{{$num_request_DEL+$num_request_ON}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href=" url('/admin/offers/android') }}"><i class="fa fa-circle-o"></i> ON
                <small class="label pull-right bg-blue">{{$num_request_ON}}</small>
              </a>
            </li>
            <li>
              <a href=" url('/admin/offers/ios') }}"><i class="fa fa-circle-o"></i> DEL
                <small class="label pull-right">{{$num_request_DEL}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/reports/reports_date') }}"><i class="fa fa-circle-o"></i> View</a></li>
            <li><a href="{{ url('/admin/reports/reports_offer') }}"><i class="fa fa-circle-o"></i> Comment</a></li>
            <li><a href="{{ url('/admin/reports/reports_offer') }}"><i class="fa fa-circle-o"></i> Start</a></li>
            <li><a href="{{ url('/admin/reports/reports_offer') }}"><i class="fa fa-circle-o"></i> Phone</a></li>
          </ul>
        </li>
        <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Comments</span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href=" url('/admin/offers/android') }}"><i class="fa fa-circle-o"></i> ON
              </a>
            </li>
            <li>
              <a href=" url('/admin/offers/ios') }}"><i class="fa fa-circle-o"></i> DEL
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/admin/setting') }}">
            <i class="fa fa-table"></i> <span>Pubs</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/setting') }}">
            <i class="fa fa-cog"></i> <span>Setting</span>
          </a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Unregistered Account</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Status: OFF</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Have</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- endsitebar -->

