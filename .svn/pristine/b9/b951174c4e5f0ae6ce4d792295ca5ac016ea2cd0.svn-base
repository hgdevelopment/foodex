<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\useraccess;
use DB;

$sidebars = DB::table('pages')->where('parent_id', 0)->orderBy('sort_order', 'ASC')->get();
?> 


<aside id="aside" class="app-aside hidden-xs bg-dark">
  <div class="aside-wrap">
    <div class="navi-wrap">
      <nav ui-nav class="navi clearfix">
        <ul class="nav">
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Navigation</span>
          </li>
          <li>
            <a href ="dashboard" class="auto">      
              <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
              <span class="font-bold">Dashboard</span>
            </a>
          </li>
          <li class="line dk"></li>
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Modules</span>
          </li> 
          
          <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          
          <li>
         
            <a href class="auto">      
              <span class="pull-right text-muted">
                <i class="fa fa-fw fa-angle-right text"></i>
                <i class="fa fa-fw fa-angle-down text-active"></i>
              </span>
              <i class="<?php echo $sidebar->icon;?>"></i>
              <span><?php echo $sidebar->menu_name;?></span>
            </a>
            <ul class="nav nav-sub dk">
              <li class="nav-sub-header">
                <a href>
                <span></span>
                </a>
              </li>
              <?php 
                $submenus = DB::table('pages')->where('parent_id', $sidebar->id)->orderBy('sort_in_order', 'ASC')->get();
                foreach($submenus as $submenu)
                {
                  // if($submenu->menu_name=='TCN Document Verification' || $submenu->menu_name=='TCN Payment Verification')
                   if($submenu->url=='secure')
                    continue;
              ?>
              <li>
                <a href="<?php echo e(\URL::to($submenu->url)); ?>">

                
                  <span><?php echo $submenu->menu_name;?></span>
                </a>
              </li>
              <?php
              }
              ?>
            </ul>
          
          </li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </nav>
    </div>
  </div>
</aside>