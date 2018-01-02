<header id="header" class="app-header navbar" role="menu">
  <div class="navbar-header bg-dark">
    <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
      <i class="glyphicon glyphicon-cog"></i>
    </button>
    <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
      <i class="glyphicon glyphicon-align-justify"></i>
    </button>
    <a href="#/" class="navbar-brand text-lt">
      <i class="fa fa-btc"></i>
        <img src="img/logo.png" alt="." class="hide">
      <span class="hidden-folded m-l-xs">Pure Drops</span>
    </a>
  </div>
  <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
          <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
            <img src="<?php echo e(URL::asset('img/a0.jpg')); ?>">
            <i class="on md b-white bottom"></i>
          </span>
          <span class="hidden-sm hidden-md">John.Smith</span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu animated fadeInRight w">
          <li>
          <a ui-sref="app.page.profile" href="<?php echo e(URL::to('/')); ?>/admin/changePassword">Change Password</a>
          </li>
          <li class="divider"></li>
          <li>
          <a href="<?php echo e(URL::to('/')); ?>/logout">Logout</a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- / navbar right -->
  </div>
  <!-- / navbar collapse -->
</header>