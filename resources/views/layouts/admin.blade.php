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
        <li {{($sidebar == 'dashboard' ? 'class=active' : '')}}><a href="{{ url('/superadmin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview {{($sidebar == 'users' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-gray">{{$num_member_banned}}</small>
              <small class="label pull-right bg-yellow">{{$num_member_active}}</small>
              <small class="label pull-right bg-red"> {{$num_admin}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ url('/superadmin/users/1') }}"><i class="fa fa-circle-o"></i> AdminManagers
                <small class="label pull-right bg-red">{{$num_admin}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/superadmin/users/0') }}"><i class="fa fa-circle-o"></i> Customers
                <small class="label pull-right bg-gray">{{$num_member_banned}}</small>
                <small class="label pull-right bg-yellow">{{$num_member_active}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview {{($sidebar == 'articles' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-gray">{{$num_article_DEL}}</small>
              <small class="label pull-right bg-blue">{{$num_article_discount_ON+$num_article_discount_OFF}}</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ url('/superadmin/articles/1') }}"><i class="fa fa-circle-o"></i> Discounting
                <small class="label pull-right bg-blue">{{$num_article_discount_ON}}</small>
              </a>
            </li>
            <li>
              <a href="{{ url('/superadmin/articles/0') }}"><i class="fa fa-circle-o"></i> Normal
                <small class="label pull-right bg-gray">{{$num_article_DEL}}</small>
                <small class="label pull-right bg-blue">{{$num_article_discount_OFF}}</small>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{($sidebar == 'comments' ? 'active' : '')}}">
          <a href="{{ url('/superadmin/comments') }}">
            <i class="fa fa-edit" aria-hidden="true"></i> <span>Comments</span>
            <small class="label pull-right bg-maroon">{{$num_comments}}</small>
          </a>
        </li>
        <li class="{{($sidebar == 'promotion_codes' ? 'active' : '')}}">
          <a href="{{ url('/superadmin/promotion_codes') }}">
            <i class="fa fa-qrcode" aria-hidden="true"></i> <span>Promotion Codes</span>
            <small class="label pull-right bg-olive">{{$num_promotion_codes}}</small>
          </a>
        </li>
        <li class="{{($sidebar == 'view_discounts' ? 'active' : '')}}">
          <a href="{{ url('/superadmin/view_discounts') }}">
            <i class="fa fa-table" aria-hidden="true"></i> <span>View Share Link</span>
            <small class="label pull-right bg-purple">{{$num_view_discounts}}</small>
          </a>
        </li>
        <li class="{{($sidebar == 'setting' ? 'active' : '')}}">
          <a href="{{ url('/superadmin/setting') }}">
            <i class="fa fa-cog"></i> <span>Setting</span>
          </a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Number of Admins</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Number of Members</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>Number of Articles</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-maroon"></i> <span>Number of Comments</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-olive"></i> <span>Number of Promotion Codes</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-purple"></i> <span>Number of View Share Link</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-gray"></i> <span>Number of Banned || DEL</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- endsitebar -->

