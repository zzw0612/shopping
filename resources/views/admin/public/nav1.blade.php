<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>悦</b>桔</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>悦桔</b>商城</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">切换导航</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class=" messages-menu">
          <a href="/admin/logout" class="dropdown-toggle"  >
            <i class="fa fa-envelope-o"></i>
           退出
          </a>
        
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">你有 10 条通知</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 今日 5 名新进会员加入
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> 很长描述可能不适用于页面，可能会导致设计问题
                    ，可能会导致设计问题
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 名新成员加入
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 条销售记录
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> 你修改了用户名
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">查看所有</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">你有 9 项任务</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <!-- Task item -->
                  <a href="#">
                    <h3>
                      设计一些按钮
                      <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% 完成</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                <li>
                  <!-- Task item -->
                  <a href="#">
                    <h3>
                      创建一个漂亮的主题
                      <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% 完成</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                <li>
                  <!-- Task item -->
                  <a href="#">
                    <h3>
                      我需要做的一些任务
                      <small class="pull-right">60%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">60% 完成</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                <li>
                  <!-- Task item -->
                  <a href="#">
                    <h3>
                      制作漂亮的过度效果
                      <small class="pull-right">80%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">80% 完成</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">查看所有任务</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="http://{{$_SERVER["HTTP_HOST"]}}/admin1/dist/img/user2-160x160.jpg" class="user-image" alt="用户图像">
            <span class="hidden-xs">{{session('admin')['user_name']}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="用户图像">

              <p>
                Alexander Pierce - Web 开发人员
                <small>注册于2012年11月</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">关注1</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">销售</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">好友</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">资料</a>
              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">退出</a>
              </div>
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