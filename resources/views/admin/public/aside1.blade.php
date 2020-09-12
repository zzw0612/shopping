<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="http://{{$_SERVER["HTTP_HOST"]}}/admin1/dist/img/user2-160x160.jpg" class="img-circle" alt="用户图像">
      </div>
      <div class="pull-left info">
        <p>{{session('admin')['user_name']}}</p>
        <a href="/admin/index"><i class="fa fa-circle text-success"></i>转到旧版</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="搜索...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">主导航</li>
      <li class="treeview @if(($active??0) ==1) active @endif " >
        <a href="#"><!-- -->
          <i class="fa fa-dashboard"></i> <span>商品描述</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/option"><i class="fa fa-circle-o"></i>商品规格</a></li>
          <li><a href="/admin/option_value"><i class="fa fa-circle-o"></i>商品规格value</a></li>
          <li><a href="/admin/product_option_info"><i class="fa fa-circle-o"></i>商品-规格关联</a></li>
        </ul>
      </li>
      <li class="treeview @if(($active??0) ==2) active @endif ">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>订单管理</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
       
          <li><a href="/admin/order"><i class="fa fa-circle-o"></i> 未付款订单</a></li>
          <li><a href="/admin/order1"><i class="fa fa-circle-o"></i> 待处理订单</a></li>
          <li><a href="/admin/order2"><i class="fa fa-circle-o"></i> 配送中订单</a></li>
          <li><a href="/admin/order3"><i class="fa fa-circle-o"></i> 已完成订单</a></li>
          <li><a href="/admin/order4"><i class="fa fa-circle-o"></i> 已取消订单</a></li>

          <li><a href="/admin/order_item"><i class="fa fa-circle-o"></i> 订单明细</a></li>
          <li><a href="/admin/logistics"><i class="fa fa-circle-o"></i> 物流配送</a></li>
         
        </ul>
      </li>
      <li class=" @if(($active??0) ==3) active @endif ">
        <a href="/admin/sku">
          <i class="fa fa-th"></i> <span>商品库存</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>
    <!--   <li>
        <a href="/admin/user">
          <i class="fa fa-pie-chart"></i> <span>用户列表</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">新</small>
          </span>
        </a>
      </li> -->

       <li class="treeview @if(($active??0) ==4) active @endif "> 
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>用户管理</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/user"><i class="fa fa-circle-o"></i>商城会员</a></li>
          <li><a href="/admin/admin"><i class="fa fa-circle-o"></i> 管理员</a></li>
  
        </ul>
      </li>
      <!--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>UI元素</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> 常规</a></li>
          <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> 图标</a></li>
          <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> 按钮</a></li>
          <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> 滑块</a></li>
          <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> 时间线</a></li>
          <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> 弹框</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>表单</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> 常规元素</a></li>
          <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> 高级元素</a></li>
          <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> 编辑器</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>表格</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> 表格</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> 数据表格</a></li>
        </ul>
      </li>
      <li>
        <a href="pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>日历</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>邮箱</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>示例</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> 单据</a></li>
          <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> 资料</a></li>
          <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> 登录</a></li>
          <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> 注册</a></li>
          <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> 锁屏</a></li>
          <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 错误</a></li>
          <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 错误</a></li>
          <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> 空白页</a></li>
          <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> 页面加载进度</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>多级菜单</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> 层级1</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> 层级1
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> 层级2</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> 层级2
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> 层级3</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> 层级3</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> 层级1</a></li>
        </ul>
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>文档</span></a></li>
      <li class="header">标签</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>警告</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>信息</span></a></li>

      -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>