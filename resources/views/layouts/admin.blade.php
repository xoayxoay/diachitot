<!-- sitebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('img/avatar') }}/{{ Auth::user()->avatar }}.jpg" class="img-circle" alt="User Image" style="height:50px;width:100px;">
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
        <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ url('/admin/top') }}"><i class="fa fa-filter"></i> <span>Top</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-red">$num_member_wait}}</small>
              <small class="label pull-right bg-yellow">$num_member_off + $num_mod_off}}</small>
              <small class="label pull-right bg-green">$num_member_on + $num_mod_on}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ url('/admin/adminmanager') }}"><i class="fa fa-circle-o"></i> Admin Manager
                <small class="label pull-right bg-yellow">$num_mod_off}}</small>
                <small class="label pull-right bg-green">$num_mod_on}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/admin/affiliate') }}"><i class="fa fa-circle-o"></i> Affiliate
                <small class="label pull-right bg-yellow">$num_member_off}}</small>
                <small class="label pull-right bg-green">$num_member_on}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/admin/unregistered') }}"><i class="fa fa-circle-o"></i> Unregistered Account 
                <small class="label pull-right bg-red">$num_member_wait}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Offers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow">$num_android_off + $num_ios_off}}</small>
              <small class="label pull-right bg-green">$num_android_on + $num_ios_on}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href=" url('/admin/offers/android') }}"><i class="fa fa-circle-o"></i> Android
                <small class="label pull-right bg-yellow">$num_android_off}}</small>
                <small class="label pull-right bg-green">$num_android_on}}</small>
              </a>
            </li>
            <li>
              <a href=" url('/admin/offers/ios') }}"><i class="fa fa-circle-o"></i> iOS
                <small class="label pull-right bg-yellow">$num_ios_off}}</small>
                <small class="label pull-right bg-green">$num_ios_on}}</small>
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
            <li><a href="{{ url('/admin/reports/reports_date') }}"><i class="fa fa-circle-o"></i> Report</a></li>
            <li><a href="{{ url('/admin/reports/reports_offer') }}"><i class="fa fa-circle-o"></i> Offers</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Invoices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php?report=create_invoice"><i class="fa fa-circle-o"></i> Create invoice</a></li>
            <li><a href="admin.php?report=history_invoice"><i class="fa fa-circle-o"></i> History invoice</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/admin/networks') }}">
            <i class="fa fa-wifi"></i> <span>Networks</span>
            <small class="label pull-right bg-yellow">$num_network_off}}</small>
            <small class="label pull-right bg-green">$num_network_on}}</small>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/setting') }}">
            <i class="fa fa-cog"></i> <span>Setting</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/ssh') }}">
            <i class="fa fa-file-text-o"></i> <span>SSH</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/exportip') }}">
            <i class="fa fa-file-text"></i> <span>Export IP</span>
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

