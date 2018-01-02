<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="<?php echo e(url('/')); ?>/new_heading.png" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<style type="text/css">
   .sticky{
   background: #eaffe4;
   margin: 10px;
   box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
   padding: 5px;
   }
    .sticky2{
   background: #ffeeb5;
   margin: 10px;
   box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
   padding: 5px;
   }
</style>
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Benefit Declaration</h1>
</div>
<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-3 sticky" id="tcndiv<?php echo e($tcnmasters->id); ?>">
   <img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">
   <h4 class="font-thin m-t-none m-b"><?php echo e($tcnmasters->tcnType); ?></h4>
   <div class="">
      <div class="">
         <span>INR: <?php echo e($tcnmasters->inr); ?></span>
      </div>
      <div class="">
         <span>AED: <?php echo e($tcnmasters->aed); ?></span>
      </div>
      <div class="">
         <span>SAR: <?php echo e($tcnmasters->sar); ?></span>
      </div>
      <div class="">
         <span>CAD: <?php echo e($tcnmasters->cad); ?></span>
      </div>
      <div class="">
         <span>USD: <?php echo e($tcnmasters->usd); ?></span>
      </div>
      <div class="">
         <span>Locking period: <?php echo e($tcnmasters->benefitLockingDuration); ?></span>
      </div>
      <br>
      <form id="form<?php echo e($tcnmasters->id); ?>">
        <input type="hidden" name="tcnType" value="<?php echo e($tcnmasters->id); ?>">
      
      <a class="btn btn-success" id='tcn<?php echo e($tcnmasters->id); ?>'>Generate</a>
      </form>
   </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-12"><br></div>
<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-12" id="tobegenerate<?php echo e($tcnmasters->id); ?>">

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
   $('#update').hide();
   
   <?php  $i=0;  ?>
   <?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php  $a[]=0; $a[$i]=$tcnmasters->id; $i++;  ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
   <?php  
   $count = count($a);
   $i=0;
   while($i<$count){ $j=0;
    ?>
             $('#tcn<?php echo e($a[$i]); ?>').click(function() {
                  <?php  
                  while($j<$count){
                  
                   ?> 
                  $('#tcndiv<?php echo e($a[$j]); ?>').addClass('animated zoomOut');
                   setTimeout(function () {
                  $('#tcndiv<?php echo e($a[$j]); ?>').hide();
                  }, 1000);
                  <?php     
                   ?> 
                  <?php      
                  $j++; }
                   ?> 
                   setTimeout(function () {
                  $('#tcndiv<?php echo e($a[$i]); ?>').show();
                  $('#tcndiv<?php echo e($a[$i]); ?>').removeClass('animated zoomOut');
                  $('#tcndiv<?php echo e($a[$i]); ?>').addClass('animated zoomIn');
                   }, 1000);
                  $('#tcn<?php echo e($a[$i]); ?>').hide();
            });
   <?php           
   $i++; }
    ?>

  
<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   $('#tcn<?php echo e($tcnmasters->id); ?>').click(function(event) {
   $('#tcn<?php echo e($tcnmasters->id); ?>').addClass('animated bounce infinite');
   var data = $('#form<?php echo e($tcnmasters->id); ?>').serialize();
   $.ajax({
            type: "get",
            url: "<?php echo e(URL::to('/')); ?>/admin/benefit/tobegenerate",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#tobegenerate<?php echo e($tcnmasters->id); ?>').html(result);
                }, 1000);
                setTimeout(function () {
                      
                }, 5000);
               }
            }
          });


  });
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>