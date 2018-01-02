<aside id="aside" class="app-aside hidden-xs bg-dark">
  <div class="aside-wrap">
    <div class="navi-wrap">
      <nav ui-nav class="navi clearfix">
        <ul class="nav">
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Navigation</span>
          </li>
          <li class="line dk"></li>
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Components</span>
          </li>
          <li>
            <a href="" class="auto">      
            <span class="pull-right text-muted">
            <i class="fa fa-fw fa-angle-right text"></i>
            <i class="fa fa-fw fa-angle-down text-active"></i>
            </span>
            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
            <span class="font-bold">Dashboard</span>
            </a>
          </li>
          <li>
            <a href class="auto">      
              <span class="pull-right text-muted">
                <i class="fa fa-fw fa-angle-right text"></i>
                <i class="fa fa-fw fa-angle-down text-active"></i>
              </span>
              <b class="badge bg-info pull-right"></b>
              <i class="glyphicon glyphicon-th"></i>
              <span>Sales</span>
            </a>
            <ul class="nav nav-sub dk">
              <li class="nav-sub-header">
                <a href>
                  <span>Layout</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(URL::to('/')); ?>/admin/addSales">
                  <span>Add Sales</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</aside>