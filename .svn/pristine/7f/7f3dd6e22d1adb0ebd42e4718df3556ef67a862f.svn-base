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
</style>
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Benefit Declaration</h1>
</div>

<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3 sticky" id="tcndiv<?php echo e($tcnmasters->id); ?>"><img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">

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

            <a class="btn btn-success" id='tcn<?php echo e($tcnmasters->id); ?>'>Declare</a>
        </div>



<div class="col-md-12" id="tcn<?php echo e($tcnmasters->id); ?>show">
<form action="<?php echo e(URL::to('/')); ?>/admin/benefit/add" method="post" id="form<?php echo e($tcnmasters->id); ?>">
<?php echo e(csrf_field()); ?>


<label>Choose month</label>
<select name="month" id="month<?php echo e($tcnmasters->id); ?>" class="form-control" required="">
<option value="">select</option>
<?php 
$i=0;$j=7;
while($j>0){
echo '<option style="background:#84ffa1;" value="'.carbon::now()->subMonths($j)->format('Y/m').'">'.carbon::now()->subMonths($j)->format('F Y').'</option>'; 
$j--;
}
while($i<5){
echo '<option style="background:#ffeeb5;" value="'.carbon::now()->subMonths($i)->format('Y/m').'">'.carbon::now()->subMonths($i)->format('F Y').'</option>'; 
$i++;
}
 ?>
</select><br>
<input type="hidden" name="tcn" id="tcn<?php echo e($tcnmasters->id); ?>ajax" class="form-control" placeholder="" value="<?php echo e($tcnmasters->id); ?>">
<label>INR</label>
<input type="text" name="inr" id="inr<?php echo e($tcnmasters->id); ?>" class="form-control" placeholder="" value="" required="">



<label>AED</label>
<input type="text" name="aed" id="aed<?php echo e($tcnmasters->id); ?>" class="form-control" placeholder="" value="" required="">


<label>SAR</label>
<input type="text" name="sar" id="sar<?php echo e($tcnmasters->id); ?>" class="form-control" placeholder="" value="" required="">



<label>USD</label>
<input type="text" name="usd" id="usd<?php echo e($tcnmasters->id); ?>" class="form-control" placeholder="" value="" required="">



<label>CAD</label>
<input type="text" name="cad" id="cad<?php echo e($tcnmasters->id); ?>" class="form-control" placeholder="" value="" required=""><br>

<input type="hidden" name="edit" id="edit<?php echo e($tcnmasters->id); ?>">
<input type="hidden" name="declared" id="declared<?php echo e($tcnmasters->id); ?>">
<input type="hidden" name="updated" id="updated<?php echo e($tcnmasters->id); ?>">
<button type="button" class="btn btn-success" id="submit<?php echo e($tcnmasters->id); ?>" name="declare" style="float: right;">Declare</button>
<button type="button" class="btn btn-danger" id="update<?php echo e($tcnmasters->id); ?>" name="update" style="float: right;">Update</button>
<p id="statusajax<?php echo e($tcnmasters->id); ?>"></p>


</form>
</div>



    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<div class="col-md-12"><br></div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
var value = $('#scheme').val();
        if(value == '') {
            $('#declare').attr('disabled',true);
        }
</script>

<script type="text/javascript">
$('#update').hide();

<?php  $i=0;  ?>
<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        $('#update<?php echo e($tcnmasters->id); ?>').hide();
        $('#tcn<?php echo e($tcnmasters->id); ?>show').hide();
        <?php  $a[]=0; $a[$i]=$tcnmasters->id; $i++;  ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php  
$count = count($a);
$i=0;
while($i<$count){ $j=0;
 ?>
          $('#tcn<?php echo e($a[$i]); ?>').click(function() {
                $('#tcndiv<?php echo e($a[$i]); ?>').addClass('animated fadeOutDown');
               <?php  
               while($j<$count){
                if($a[$i]!=$a[$j]){
                ?> 
               $('#tcndiv<?php echo e($a[$j]); ?>').addClass('animated fadeOutDown');
                setTimeout(function () {
               $('#tcndiv<?php echo e($a[$j]); ?>').hide();
               }, 500);

                  <?php           
                  }
                   ?> 
   
                  $('#tcndiv<?php echo e($a[$i]); ?>').removeClass('animated fadeOutDown');
                  $('#tcndiv<?php echo e($a[$i]); ?>').addClass('animated fadeInDown');
                  <?php      
                  $j++; }
                   ?> 

          $('#tcn<?php echo e($a[$i]); ?>').hide();
          $('#tcn<?php echo e($a[$i]); ?>show').show();
        });
<?php           
$i++; }
 ?>
 
</script>

<script type="text/javascript">

<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  $('#month<?php echo e($tcnmasters->id); ?>').change(function(event) {
   var month = $('#month<?php echo e($tcnmasters->id); ?>').val();
   var tcn = $('#tcn<?php echo e($tcnmasters->id); ?>ajax').val();
   data = 'month='+month+'&tcn='+tcn;
   $('#submit<?php echo e($tcnmasters->id); ?>').prop("value", '1');
   $.ajax({
            type: "get",
            url: "<?php echo e(URL::to('/')); ?>/admin/benefit/check",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                var result = JSON.parse(result);

                $('#inr<?php echo e($tcnmasters->id); ?>').val(result.INR);
                $('#aed<?php echo e($tcnmasters->id); ?>').val(result.AED);
                $('#usd<?php echo e($tcnmasters->id); ?>').val(result.USD);
                $('#cad<?php echo e($tcnmasters->id); ?>').val(result.CAD);
                $('#sar<?php echo e($tcnmasters->id); ?>').val(result.SAR);

                     $('#inr<?php echo e($tcnmasters->id); ?>').prop("disabled", false);
                     $('#aed<?php echo e($tcnmasters->id); ?>').prop("disabled", false);
                     $('#usd<?php echo e($tcnmasters->id); ?>').prop("disabled", false);
                     $('#cad<?php echo e($tcnmasters->id); ?>').prop("disabled", false);
                     $('#sar<?php echo e($tcnmasters->id); ?>').prop("disabled", false);


                if(result.status == '1'){
                     $('#submit<?php echo e($tcnmasters->id); ?>').hide();
                     $('#update<?php echo e($tcnmasters->id); ?>').show();
                     $('#declared<?php echo e($tcnmasters->id); ?>').prop("value", '0');
                     $('#updated<?php echo e($tcnmasters->id); ?>').prop("value", '1');
                     $('#edit<?php echo e($tcnmasters->id); ?>').prop("value",result.id);
                }

                if(result.status == '2'){
                     $('#submit<?php echo e($tcnmasters->id); ?>').hide();
                     $('#update<?php echo e($tcnmasters->id); ?>').hide();

                     $('#inr<?php echo e($tcnmasters->id); ?>').prop("disabled", true);
                     $('#aed<?php echo e($tcnmasters->id); ?>').prop("disabled", true);
                     $('#usd<?php echo e($tcnmasters->id); ?>').prop("disabled", true);
                     $('#cad<?php echo e($tcnmasters->id); ?>').prop("disabled", true);
                     $('#sar<?php echo e($tcnmasters->id); ?>').prop("disabled", true);
                     $('#declared<?php echo e($tcnmasters->id); ?>').prop("value", '0');
                     $('#updated<?php echo e($tcnmasters->id); ?>').prop("value", '0');
                }

               }else{
                $('#inr<?php echo e($tcnmasters->id); ?>').val('');
                $('#aed<?php echo e($tcnmasters->id); ?>').val('');
                $('#usd<?php echo e($tcnmasters->id); ?>').val('');
                $('#cad<?php echo e($tcnmasters->id); ?>').val('');
                $('#sar<?php echo e($tcnmasters->id); ?>').val('');
                $('#submit<?php echo e($tcnmasters->id); ?>').show();
                $('#update<?php echo e($tcnmasters->id); ?>').hide();
                $('#declared<?php echo e($tcnmasters->id); ?>').prop("value", '1');
                $('#updated<?php echo e($tcnmasters->id); ?>').prop("value", '0');
                $('#edit<?php echo e($tcnmasters->id); ?>').prop("value",'');
               }
            }
          });


  });

$('#update<?php echo e($tcnmasters->id); ?>').click(function(event) {
   $('#update<?php echo e($tcnmasters->id); ?>').addClass('animated bounce infinite');
   var data = $('#form<?php echo e($tcnmasters->id); ?>').serialize();
   $.ajax({
            type: "post",
            url: "<?php echo e(URL::to('/')); ?>/admin/benefit/add",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#statusajax<?php echo e($tcnmasters->id); ?>').html(result);
                $('#update<?php echo e($tcnmasters->id); ?>').removeClass('animated bounce infinite');
                }, 1000);
                setTimeout(function () {
                      $('#statusajax<?php echo e($tcnmasters->id); ?>').html('');
                }, 5000);
               }
            }
          });


  });

$('#submit<?php echo e($tcnmasters->id); ?>').click(function(event) {
   $('#submit<?php echo e($tcnmasters->id); ?>').addClass('animated bounce infinite');
   var data = $('#form<?php echo e($tcnmasters->id); ?>').serialize();
   $.ajax({
            type: "post",
            url: "<?php echo e(URL::to('/')); ?>/admin/benefit/add",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#statusajax<?php echo e($tcnmasters->id); ?>').html('<span style="color:green;">Benefit Declared</span>');
                $('#submit<?php echo e($tcnmasters->id); ?>').removeClass('animated bounce infinite');
                     $('#declared<?php echo e($tcnmasters->id); ?>').prop("value", '0');
                     $('#updated<?php echo e($tcnmasters->id); ?>').prop("value", '1');
                     $('#edit<?php echo e($tcnmasters->id); ?>').prop("value",result);
                     $('#submit<?php echo e($tcnmasters->id); ?>').hide();
                     $('#update<?php echo e($tcnmasters->id); ?>').show();

                }, 1000);
                setTimeout(function () {
                      $('#statusajax<?php echo e($tcnmasters->id); ?>').html('');

                }, 5000);
               }
            }
          });


  });

     $('#inr<?php echo e($tcnmasters->id); ?>').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#aed<?php echo e($tcnmasters->id); ?>').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#usd<?php echo e($tcnmasters->id); ?>').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#sar<?php echo e($tcnmasters->id); ?>').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#cad<?php echo e($tcnmasters->id); ?>').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>