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
      <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="<?php echo e(route('admin.changeimg')); ?>" autocomplete="off">
      <?php echo e(csrf_field()); ?>

        <div class="col-sm-12">
          <a href="#" class="thumb-lg pull-left m-r pop1" id="click_img_container">
          <img  class="img-circle " draggable="true"  src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->photo)); ?>"   style="width:96px;height: 96px;"></a>
          <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 150px;">
          <img src="<?php echo e(URL::asset('storage/img/proof/'.$viewmem->file)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;<?php echo e($viewmem->typeOfProof); ?></span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number : &nbsp;<?php echo e($viewmem->proofNumber); ?></span></a>
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
          <span class="text-black name_text" style="text-transform: uppercase;"><?php echo e($viewmember->name); ?></span><br>
          <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($viewmember->dob); ?></span><br>
          <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($countrys->countryNames); ?></span>
          </div>
          </div>
          <a href="#" class="pop3"><img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->singnature)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="padder" style="padding-top: 15px;">  
  <div class="row" style="padding-bottom: 20px">
    <div class="col-sm-12">
      <div class="panel panel-warning" >
        <div class="panel-heading">Personal Details </div>
        <div class="panel-body">
          <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab"><?php echo e($viewmember->name); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Father's/ Husband's Name <b class="data-lab"><?php echo e($viewmember->guardian); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Date of Birth <b class="data-lab" ><?php echo e($viewmember->dob); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Gender <b class="data-lab"><?php echo e($viewmember->gender); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Religion <b class="data-lab"><?php echo e($viewmember->religion); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab"><?php echo e($viewmember->caste); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Nationality <b class="data-lab"><?php echo e($countrys->countryNames); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Education <b class="data-lab"><?php echo e($viewmember->education); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Occupation <b class="data-lab"><?php echo e($viewmember->occupation); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Income <b class="data-lab"><?php echo e($viewmember->incomeCurrencytype); ?> : <?php echo e($viewmember->incomeAmount); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab"><?php echo e($viewmember->maritalStatus); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">No of Children <b class="data-lab"><?php echo e($viewmember->noOfChildren); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Mobile No <b class="data-lab"><?php echo e($viewmember->mobileId); ?><?php echo e($viewmember->mobileNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell"> Landline No<b class="data-lab"><?php echo e($viewmember->LandlineNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Email <b class="data-lab"><?php echo e($viewmember->email); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell"><span ><p>How Do You Know</p> About Heera Group &nbsp;?</span><b class="data-lab" style="margin-left:50%; margin-top: -30px;"><?php echo e($viewmember->aboutHeera); ?></b></div>
        </div>
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
  <div class="row" style="padding-bottom: 20PX;">
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading"> Permanent Address
        </div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewmembs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(($viewmembs->typeOfAddress=='permanent')&&($name->type=='permanent')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($viewmembs->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($viewmembs->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($viewmembs->state); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($name->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($viewmembs->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-a">
      <div class="panel panel-warning">
        <div class="panel-heading"> Correspondence Address
        </div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewmembs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(($viewmembs->typeOfAddress=='correspondance')&&($name->type=='correspondance')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($viewmembs->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($viewmembs->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($viewmembs->state); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($name->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($viewmembs->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning">
        <div class="panel-heading"> Official Address
        </div>
        <div class="panel-body">
          <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewmembs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($viewmembs->typeOfAddress=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($viewmembs->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($viewmembs->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($viewmembs->state); ?></b></div>
          <?php if($name->type=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($name->Names); ?></b></div>
          <?php endif; ?>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($viewmembs->pin); ?></b></div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-12"></div>
      <div class="col-sm-12">
        <div class="col-sm-6 col-sm-offset-6">
          <button type="button"  class="btn btn-primary" onclick="approveMember(<?php echo e($viewmember->userId); ?>,this)" id="approve">Approve</button>
          <button type="button" class="btn btn-danger" id="deny">Deny</button> 
          <div class="form-group" style="display:none;" id="show">
            <label>Deny Reason*</label>
            <select  class="form-control" required data-parsley-required-message="Please Select Reason" name="reason[]" id="reason" size="7" multiple>
              <option value="">--Select--</option>
              <option value="Duplicate Entry">Duplicate Entry</option>
              <option value="Small Photograph">Small Photograph</option>
              <option value="Your Signature is too small">Small Signature</option>
              <option value="Your ID proof is too small">Small ID proof</option>
              <option value="Your photograph is missing">Photograph Missing</option>
              <option value="Your Signature is missing">Signature Missing</option>
              <option value="Your ID proof is missing">ID proof Missing</option>
              <option value="Your ID proof is Not Readable">ID proof Not Readable</option>
              <option value="Your ID proof is Not Readable">Date of Birth is not same as proof</option>
              <option value="Your ID proof is Not Readable">Photo is not clear</option>
              <option value="Your ID proof is Not Readable">Signature is not clear</option>
            </select><br>
            <label>Reason</label>
            <input type="text" class="form-control" name="denyreason" id="denyreason"><br>
            <button type="button" class="btn btn-danger" onclick="denyMember(<?php echo e($viewmember->userId); ?>)" id="deny">Deny</button>
            <a href="<?php echo e(URL::to('/')); ?>/admin/membersview/<?php echo e($viewmember->userId); ?>"><button type="button" class="btn btn-info">Back</button></a>
            <?php if($errors->has('reason')): ?>
            <span class="help-inline"><?php echo e($errors->first('reason')); ?></span>
            <?php endif; ?>
          </div>
          <a href="<?php echo e(URL::to('/')); ?>/admin/member/<?php echo e($viewmember->userId); ?>/edit"  class="active">  
          <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>
          <button type="button" class="btn btn-info" id="blacklist" style="background-color: #202729;">Blacklist</button> 
          <div class="form-group" style="display:none;" id="black">
            <label><b>Reason</b></label>
            <input type="text" class="form-control" name="blacklistreason" id="blacklistreason" value=""><br>
            <button type="button" name="blacklist" type="submit" class="btn btn-info" onclick="blacklistMember(<?php echo e($viewmember->userId); ?>)" id="blacklist" style="background-color: #202729;">Blacklist</button> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/membersview/<?php echo e($viewmember->userId); ?>"><button type="button" class="btn btn-info">Back</button></a>
          </div>
        </div>
      </div>
      <div class="col-sm-12" ><br></div>
    </div>
  </div>
</div>

<div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;">
        <table class="table table-striped b-t" id="viewRequest">
          <thead>
          <div class="panel-heading">
            View Similar Request
          </div>
          <tr>
            <th>Sl No</th>
            <th>Name</th> 
            <th>Code</th>
            <th>Gender</th>
            <th>Status</th>
          </tr>
        </thead> 
        <tbody>
          <?php $__currentLoopData = $similarrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($records->name); ?></td>
              <td><?php echo e($records->uname); ?></td>
              <td><?php echo e($records->gender); ?></td>
              <td><?php echo e($records->logstatus); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
        </table>
      </div>
    </div> 
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  $(document).ready(function()
{
      $("#viewRequest").DataTable();
    });
</script>

<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
<script type="text/javascript">
</script>
<script >
  $(function() {
  $('.pop1,.pop2,.pop3').click(function(){
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

  function approveMember(id){
  swal({
  title: "Approve!!!",
  text: "Are you sure?",
  type: "success",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Approve Member!",
  closeOnConfirm: true
  }, 
  function (isConfirm) {
  if(isConfirm) {
  $.ajax({
  url: "<?php echo e(URL::to('admin/member/approveMember')); ?>",
  type: "POST",
  data: { "_token": "<?php echo e(csrf_token()); ?>","userId": id},
  dataType: "html",
  success: function (data) 
  {
  swal("Member Approved!", "", "success");
  setTimeout(function() {
  window.location.href = "<?php echo e(URL::to('admin/member/viewMember')); ?>";
  }, 2000);
  },
  });
  }
  else{
  swal("cancelled","Correct and Re-submit Application", "error");
  }
  });
  }

  // denied member
  function denyMember(id)
  {
  var reason=$("#reason").val();
  var denyreason=$("#denyreason").val();

  if(reason == null && denyreason=="" )
  {
  alert("Please Enter the Reason !");
  return false;
  }
  swal({
  title: "Deny!!",
  text: "Are you sure?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Deny",
  closeOnConfirm: true
  }, 
  function (isConfirm) 
  { 
  if (isConfirm) {
  $.ajax({ 
  url: "<?php echo e(URL::to('admin/member/denyMember')); ?>",
  type: "POST",
  data: { "_token": "<?php echo e(csrf_token()); ?>","userId": id,"reason": reason,"denyreason":denyreason},
  dataType: "html",
  success: function (data) { 
    //alert(data);exit;
  swal("Done!", "It was succesfully denied!", "success");
  setTimeout(function() {
  window.location.href = "<?php echo e(URL::to('admin/member/viewMember')); ?>";
  }, 2000); 
  },
  }); 
  }
  else
  {
  swal("Done!", "It was succesfully denied!", "success");
  }   
  }); 
  }

  //blacklist member
  function blacklistMember(id){
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
  window.location.href = "<?php echo e(URL::to('admin/member/viewMember')); ?>";
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
  $("#approve,#edit,#blacklist,#blacklistreason").hide();
  });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
  $("#blacklist").click(function(){
  $("#black").show();
  $("#blacklist").hide();
  $("#approve,#edit,#deny").hide();
  });
  });
</script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>