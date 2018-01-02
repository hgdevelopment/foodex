<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>


<?php echo $__env->make('web.partial.profileheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style type="text/css" media="screen">
      .pagination {
    margin: 3px 0;
      }
    </style>

    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Pending TCN</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          <thead>
            <tr>
              <th >TCN</th>
              <th>Currency</th> 
              <th>Amount</th> 
              <th>Unit</th>                      
              <th >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $pendinglist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
         
            <tr>                    
              <td>
              <?php echo e($element->tcn->tcnType); ?>

              </td>
              <td><?php echo e($element->currencyType); ?></td>
              <td>
             <?php 
               switch ($element->currencyType) {
                 case 'INR':
                  echo $element->tcn->inr*$element->unit;
                   break;
                 case 'AED':
                  echo $element->tcn->aed*$element->unit;
                   break;
                 case 'USD':
                  echo $element->tcn->usd*$element->unit;
                   break;

                 case 'SAR':
                  echo $element->tcn->sar*$element->unit;
                   break;

                 case 'CAD':
                  echo $element->tcn->cad*$element->unit;
                   break;
                 
                 default:
                   echo 0;
                   break;
               }
              ?>
                
              </td>
              <td><?php echo e($element->unit); ?></td>
              <td>
               <a href="#" ><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
               &nbsp;  <a href="<?php echo e(url('web/tcndetails/'.$element->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          
        </table>
        <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6 text-center">
          
        </div>
        <div class="col-sm-6 text-right text-center-xs">      
        <?php echo e($pendinglist->links()); ?>     
        </div>
      </div>
    </footer>
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-success">
        <div class="panel-heading">Active TCN</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          <thead>
            <tr>
              <th >TCN</th>
              <th>Currency</th> 
              <th>Amount</th> 
              <th>Unit</th>                      
              <th >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $activelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
         
            <tr>                    
              <td>
              <?php echo e($element->tcn->tcnType); ?><br>
             
              <?php if($element->withDrawId!='0'): ?>
                <?php if($element->withDrawStatus=='Applied'): ?>
                 <span class="text-primary" ><?php echo e('WithDraw Request Sended'); ?></span>
                <?php elseif($element->withDrawStatus=='Approved'): ?>
                 <span class="text-success" ><?php echo e('WithDrawaled'); ?></span>
                <?php elseif($element->withDrawStatus=='Denied'): ?>
                 <span class="text-danger" ><?php echo e('WithDrawal Cancelled'); ?></span>
                <?php endif; ?>
              <?php endif; ?>
              </td>
              <td><?php echo e($element->currencyType); ?></td>
              <td>
             <?php 
               switch ($element->currencyType) {
                 case 'INR':
                  echo $element->tcn->inr*$element->unit;
                   break;
                 case 'AED':
                  echo $element->tcn->aed*$element->unit;
                   break;
                 case 'USD':
                  echo $element->tcn->usd*$element->unit;
                   break;

                 case 'SAR':
                  echo $element->tcn->sar*$element->unit;
                   break;

                 case 'CAD':
                  echo $element->tcn->cad*$element->unit;
                   break;
                 
                 default:
                   echo 0;
                   break;
               }
              ?>
                
              </td>
              <td><?php echo e($element->unit); ?></td>
              <td>
               <a href="#" class="active" ><i class="fa fa-check text-success text-active"></i></a>
              &nbsp;  
              <a href="<?php echo e(url('web/tcndetails/'.$element->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i>
              </a>
              <?php 
              $unlockdate = strtotime(date("Y-m-d", strtotime($element->paymentReceivedDate)) . " +".$element->tcn->lockingDuration." month");
              $unlockdate = date("Y-m-d", $unlockdate);
               ?>
              <?php if($element->paymentReceived=='Received' && $element->withDrawId=='0' && $unlockdate<=date("Y-m-d")): ?>
              <a href="<?php echo e(url('web/tcnwithDrawal/'.$element->id)); ?>" title="With Drawal Request"><i class="fa fa-money" aria-hidden="true"></i>
              </a>
              <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          
        </table>
        <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6 text-center">
         
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
          <?php echo e($activelist->links()); ?>   
        </div>
      </div>
    </footer>
      </div>
    </div>
    </div>
    
     <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Denied TCN</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          <thead>
            <tr>
              <th >TCN</th>
              <th>Currency</th> 
              <th>Amount</th> 
              <th>Unit</th>                      
              <th >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $deniedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>                    
              <td>
              <?php echo e($element->tcn->tcnType); ?>

              </td>
              <td><?php echo e($element->currencyType); ?></td>
              <td>
             <?php 
               switch ($element->currencyType) {
                 case 'INR':
                  echo $element->tcn->inr*$element->unit;
                   break;
                 case 'AED':
                  echo $element->tcn->aed*$element->unit;
                   break;
                 case 'USD':
                  echo $element->tcn->usd*$element->unit;
                   break;

                 case 'SAR':
                  echo $element->tcn->sar*$element->unit;
                   break;

                 case 'CAD':
                  echo $element->tcn->cad*$element->unit;
                   break;
                 
                 default:
                   echo 0;
                   break;
               }
              ?>
                
              </td>
              <td><?php echo e($element->unit); ?></td>
              <td>
               <a href="<?php echo e(url('web/tcnapplication/'.$element->id.'/edit')); ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
               &nbsp;  <a href="<?php echo e(url('web/tcndetails/'.$element->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          
        </table>
        <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6 text-center">
         
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
          <?php echo e($deniedlist->links()); ?>   
        </div>
      </div>
    </footer>
      </div>
    </div>
    </div>
<?php echo $__env->make('web.partial.profilefooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             





<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>