<?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
    <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
<div>
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="<?php echo e(route('web.changeimg')); ?>" autocomplete="off">
      <?php echo e(csrf_field()); ?>

        <div class="col-sm-12">
          <a href="#" class="thumb-lg pull-left m-r pop1" id="click_img_container">
          <img  class="img-circle " draggable="true"  src="<?php echo e(URL::asset('storage/img/member_img/'.$approvemember->photo)); ?>"   style="width:96px;height: 96px;"></a>
          <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 150px;">
          <img src="<?php echo e(URL::asset('storage/img/member_img/'.$approvemember->singnature)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;<?php echo e($approveproof->typeOfProof); ?></span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number : &nbsp;<?php echo e($approveproof->proofNumber); ?></span></a>
          
          <style type="text/css" media="screen">
          #click_img_container
          {
          position:relative;
          }
          #avatar_img
          {
          opacity:0;
          position:absolute;
          top:0;
          left:0;
          width:100%;
          height:100%;
          }
          #change_img
          {
          position: absolute;
          top: 0px;
          background: rgba(0, 0, 0, 0.4);
          width:100%;
          height:100%;
          border-radius: 50%;
          padding-top: 45%;
          text-align: center;
          color: #fff;
          }     
          </style>
          <div class="clear m-b">
            <div class="m-b m-t-sm">
            <span class="text-black name_text" style="text-transform: uppercase;"><?php echo e($approvemember->name); ?></span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($approvemember->code); ?></span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($approvemember->dob); ?></span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($countryname->countryNames); ?></span>
            </div>
          </div>
          <a href="#" class="pop3">
          <img src="<?php echo e(URL::asset('storage/img/member_img/'.$approvemember->singnature)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
<div class="padder" style="padding-top: 15px;">  
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Personal Details </div>
        <div class="panel-body">
          <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab"><?php echo e($approvemember->name); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Father's/ Husband's Name <b class="data-lab"><?php echo e($approvemember->guardian); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Date of Birth <b class="data-lab" ><?php echo e($approvemember->dob); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Gender <b class="data-lab"><?php echo e($approvemember->gender); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Religion <b class="data-lab"><?php echo e($approvemember->religion); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab"><?php echo e($approvemember->caste); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Nationality <b class="data-lab"><?php echo e($countryname->countryNames); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Education <b class="data-lab"><?php echo e($approvemember->education); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Occupation <b class="data-lab"><?php echo e($approvemember->occupation); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Income <b class="data-lab"><?php echo e($approvemember->incomeCurrencytype); ?> : <?php echo e($approvemember->incomeAmount); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab"><?php echo e($approvemember->maritalStatus); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">No of Children <b class="data-lab"><?php echo e($approvemember->noOfChildren); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Mobile No <b class="data-lab"><?php echo e($approvemember->mobileId); ?><?php echo e($approvemember->mobileNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell"> Landline No<b class="data-lab"><?php echo e($approvemember->LandlineNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Email <b class="data-lab"><?php echo e($approvemember->email); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell"><p>How Do You Know</p>About Heera Group&nbsp;? <b class="data-lab" style="margin-left:50%; margin-top: -30px;"><?php echo e($approvemember->aboutHeera); ?></b></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="padding-bottom: 20PX;">
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading"> Permanent Address
        </div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $approveaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Approveaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(($Approveaddress->typeOfAddress=='permanent')&&($ctryname->type=='permanent')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($Approveaddress->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($Approveaddress->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($Approveaddress->state); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($ctryname->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($Approveaddress->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">  Correspondance Address
        </div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $approveaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Approveaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(($Approveaddress->typeOfAddress=='correspondance')&&($ctryname->type=='correspondance')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($Approveaddress->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($Approveaddress->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($Approveaddress->state); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($ctryname->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($Approveaddress->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">Official Address</div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $approveaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Approveaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($Approveaddress->typeOfAddress=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($Approveaddress->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($Approveaddress->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($Approveaddress->state); ?></b></div>
          <?php if($ctryname->type=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($ctryname->Names); ?></b></div>
          <?php endif; ?>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($Approveaddress->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12" ><br></div>
    <div class="form-group">
      <div class="col-sm-9 "><br></div>
      <div class="col-sm-3">
        <a href="<?php echo e(URL::to('/')); ?>/admin/approve_member/<?php echo e($approvemember->userId); ?>/edit"  class="active">     
        <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>
        <button type="button" class="btn btn-info" id="blacklist" style="background-color: #202729;">Blacklist</button>
        <div class="form-group" style="display:none;" id="black">
          <label><b>Reason</b></label>
          <input type="text" class="form-control" name="blacklistreason" id="blacklistreason" value=""><br>
          <button type="button" name="blacklist" class="btn btn-info" onclick="blacklistApproveMem(<?php echo e($approvemember->userId); ?>)" id="blacklist" style="background-color: #202729;">Blacklist</button>
          <a href="<?php echo e(URL::to('/')); ?>/admin/approve_member/<?php echo e($approvemember->userId); ?>"><button type="button" class="btn btn-info">Back</button></a>
        </div> 
      </div>
    </div>
    <div class="col-sm-12" ><br></div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
<script>
  $(function() {
  $('.pop1,.pop2,.pop3').hover(function(){
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show'); 
  });
  });
</script>

<script type="text/javascript">

  // for multiple select in deny
  window.onmousedown = function (e) {
  var el = e.target;
  if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
  e.preventDefault();

  // toggle selection
  if (el.hasAttribute('selected')) el.removeAttribute('selected');
  else el.setAttribute('selected', '');

  // hack to correct buggy behavior
  var select = el.parentNode.cloneNode(true);
  el.parentNode.parentNode.replaceChild(select, el.parentNode);
  }
  }

  function blacklistApproveMem(id){
  var blacklistreason=$("#blacklistreason").val();
  if(blacklistreason == "")
  {
  alert("Please Enter the Reason !");
  return false;
  }
  swal({
  title: "Block!!!",
  text: "Are you sure?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Block Member!",
  closeOnConfirm: true
  }, 
  function (isConfirm) {
  if(isConfirm) {
  $.ajax({
  url: "<?php echo e(URL::to('admin/member/blacklistMember/action')); ?>",
  type: "POST",
  data: { "_token": "<?php echo e(csrf_token()); ?>","userId": id,"blacklistreason":blacklistreason},
  dataType: "html",
  success: function (data) 
  {
  swal("Member Blocked!", "", "success");
  setTimeout(function() {
  window.location.href = "<?php echo e(URL::to('admin/approve_member')); ?>";
  }, 2000);
  },
  });
  }
  else{
  swal("cancelled","", "error");
  }
  });
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("#deny").click(function(){
  $("#show").show();
  $("#deny").hide();
  $("#edit").hide();
  });
  });

  $(document).ready(function(){
  $("#blacklist").click(function(){
  $("#black").show();
  $("#blacklist").hide();
  $("#edit,#deny").hide();
  });
  });
  $(document).ready(function(){
  $('#reason').multiselect({

  includeSelectAllOption: true
  });
  });
</script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>