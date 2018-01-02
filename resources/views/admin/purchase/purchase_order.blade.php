@extends('admin.layout.puredrops')
@section('sidebar')
	@include('admin.partial.header')
	@include('admin.partial.aside')
@endsection


@section('body')
 <link href="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<style>
	.select2-selection{
	padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.25;
    min-height: 38px;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow {
   
    top: 6px;
    right: 4px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px;
}
.bigdrop{
     max-width: 200px !important;
}
</style>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Stock Entry</h2>
		</div>
	</div>
	<form method="post" action="#" id="purchase_order_form"> 
		<div class="container-fluid">
			{{-- <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Stock</label>
										<div class="col-md-12">
											
											<input type="text" readonly class="form-control form-control-line" name="bill_no" value="" >
										</div>
									</div>
								</div>
							</div>				
							
						</div>
					</div>
				</div>
			</div> --}}
{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							<span class="unique_value">**The Products must be unique</span>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Product</th>
											<th>Basic Cost</th>
											<th>GST%</th>
											<th>MRP</th>
											<th>Discount%</th>
											<th>Qty</th>
											{{-- <th>Billing Price</th> --}}
											<th>Manufacturing Date</th>
                                            <th>Expiry Days</th>
											<th><button type="button" class="add-more btn btn-circle btn-sm btn-success waves-effect waves-dark" id="add_values">+</button></th>
										</tr>
									</thead>
									<tbody id="add_products">
										
										<tr class="hide" id="hidden_prodect">
											<td>
											<select name="product[]" id="product" class="form-control product" style="width: 100%">
											</select>
										    </td>
											
											<td><input type="text" class="form-control form-control-line" name="basic_cost[]" id="basic_cost"><span id="product_quantity_error" style="color:red"></span></td>
											<td><input type="text"  class="form-control form-control-line" name="gst[]" id="gst"></td>
											<td><input type="text"  class="form-control form-control-line" name="billing_price[]" id="mrp" readonly></td>
											<td><input type="text" class="form-control form-control-line" name="discount[]" id="discount"></td>
											<td><input type="text"  class="form-control form-control-line" name="qty[]" id="qty"></td>
											<td><input type="text"  class="form-control form-control-line" name="expiry[]" id="expiry"></td>
                                            <td><input type="text"  class="form-control form-control-line" name="expiry_days[]" id="expiry_days"></td>
											<td><button type="button" class="remove-product btn btn-circle btn-sm btn-danger waves-effect waves-dark" id="add_values">-</button></td>
										</tr>
									</tbody>
								</table>
							</div>
							<hr>
							
					</div>
				</div>
			</div>


				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-block">
							
							<div class="row">
								<div class="col-lg-12 col-xlg-12 col-md-12">
									<div class="form-group">
										<div class="col-sm-12">
											
											<input type="submit" class="btn btn-success pull-right" style="margin-right:2%" value="Submit" name="submit">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</form>
</div>
@endsection
@section('jquery')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script src="{{ URL::asset('js/purchase/purchase_order.js')}}"></script>
<script>
	$(function(){

		var initLoad=true;
		var revalidateForm=function(){
			$('#purchase_order_form').formValidation('revalidateField', 'product[]');
            $('#purchase_order_form').formValidation('revalidateField', 'basic_cost[]');
            $('#purchase_order_form').formValidation('revalidateField', 'gst[]');
            $('#purchase_order_form').formValidation('revalidateField', 'billing_price[]');
            $('#purchase_order_form').formValidation('revalidateField', 'discount[]');
            $('#purchase_order_form').formValidation('revalidateField', 'qty[]');
            // $('#purchase_order_form').formValidation('revalidateField', 'billing[]');
            $('#purchase_order_form').formValidation('revalidateField', 'expiry[]');
            $('#purchase_order_form').formValidation('revalidateField', 'expiry_days[]');
		}
		var mrp_calculate=function(base_amt,gst){
							 gst=(gst==null|| gst==NaN || gst=='')?0:parseFloat(gst);
							 base_amt=(base_amt==null|| base_amt==NaN || base_amt=='')?0:parseFloat(base_amt);
					         var mrp=((base_amt*gst)/100)+base_amt;
					         return Math.round(mrp);
		                   };
		


		$('#purchase_order_form')
        .formValidation({
	        framework: 'bootstrap',
	        // err: {
	        //     container: 'tooltip'
	        // },
	        row: {
	            selector: 'td'
	        },
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
            fields: {
                'product[]': {
                  // row: '.form-group',
                   validators: {
                         notEmpty: {
                            message: 'Product is required'
                        },
                        callback: {
                        callback: function(value, validator, $field) {
                            var $emails          = validator.getFieldElements('product[]'),
                                numEmails        = $emails.length,
                                notEmptyCount    = 0,
                                obj              = {},
                                duplicateRemoved = [];

                            for (var i = 0; i < numEmails-1; i++) {
                                var v = $emails.eq(i).val();
                                if (v !== '') {
                                    obj[v] = 0;
                                    notEmptyCount++;
                                }
                            }

                            for (i in obj) {
                                duplicateRemoved.push(obj[i]);
                            }

                            // if (duplicateRemoved.length === 0) {
                            //     return {
                            //         valid: false,
                            //         message: 'You must fill at least one email address'
                            //     };
                            // } else 
                            if (duplicateRemoved.length !== notEmptyCount) {
                            	$('.unique_value').html('*The Products must be unique')
                                return {
                                    valid: false,
                                    message: '**'
                                };
                            }

                            validator.updateStatus('product[]', validator.STATUS_VALID, 'callback');
                            $('.unique_value').html('')
                            return true;
                        }
                    }
                
                    }
                },
                'basic_cost[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Basic Cost is required'
                        },
                         numeric: {
                            message: 'The value is not a number',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                },
                'gst[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'GST is required'
                        },
                         numeric: {
                            message: 'The value is not a number',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                },
                'billing_price[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'MRP is required'
                        },
                         numeric: {
                            message: 'The value is not a number',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                },
                'discount[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Discount is required'
                        },
                         numeric: {
                            message: 'The value is not a number',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                },
                'qty[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Quantity is required'
                        },
                         numeric: {
                            message: 'The value is not a number',
                        }
                    }
                },
                // 'billing[]': {
                // 	// row: '.form-group',
                //     validators: {
                //         notEmpty: {
                //             message: 'Billing price is required'
                //         },
                //          numeric: {
                //             message: 'The value is not a number',
                //             // The default separators
                //             thousandsSeparator: '',
                //             decimalSeparator: '.'
                //         }
                //     }
                // },
                'expiry[]': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Expiry Date is required'
                        },
                          date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                        }
                    }
                },
                'expiry_days[]': {
                    // row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Expiry Days is required'
                        }
                    },
                    numeric: {
                            message: 'The value is not a number',
                    }
                },
                
            }
        })

        // Add button click handler
        .on('click', '.add-more', function() {
            var $template = $('#hidden_prodect'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
                           if(initLoad==true)
                           {
                           	$clone.find('.remove-product').remove();
                           	initLoad=false;
                           }
                          $clone.find('input[name="expiry[]"]').bootstrapMaterialDatePicker({ weekStart : 0, time: false,format:'DD/MM/YYYY' }).on('change',function(){
                          	revalidateForm();
                          });
                           $clone.find('select[name="product[]"]').select2({
			         		  placeholder: 'Select an product',
                              containerCssClass : 'bigdrop',
								   ajax: {
									    url: '{{URL::to('/')}}/admin/purchase/select2/product',
									    dataType: 'json',
									    method:'post',
									    data:function (params) {
										      var query = {
										        search: params.term,
										        type: 'public',
										        _token:'{{csrf_token()}}',
										      }

										      return query;
										    }
								      }
									}).on('select2:select', function (e) {		
													    var data = e.params.data;
										    $(this).parents('tr').find('input[name="basic_cost[]"]').val(data.basic_cost);
										    $(this).parents('tr').find('input[name="gst[]"]').val(data.gst);
										    $(this).parents('tr').find('input[name="discount[]"]').val(data.product_discount);
										    // $(this).parents('tr').find('input[name="billing[]"]').val(data.billing_price);
										    var amount=mrp_calculate(data.basic_cost,data.gst);
										    $(this).parents('tr').find('input[name="billing_price[]"]').val(amount);
										    revalidateForm();
										});
           $('#purchase_order_form')
                .formValidation('addField', $clone.find('[name="product[]"]'))
                .formValidation('addField', $clone.find('[name="basic_cost[]"]'))
                .formValidation('addField', $clone.find('[name="gst[]"]'))
                .formValidation('addField', $clone.find('[name="billing_price[]"]'))
                .formValidation('addField', $clone.find('[name="discount[]"]'))
                .formValidation('addField', $clone.find('[name="qty[]"]'))
                // .formValidation('addField', $clone.find('[name="billing[]"]'))
                .formValidation('addField', $clone.find('[name="expiry[]"]'))
                .formValidation('addField', $clone.find('[name="expiry_days[]"]'))


                //change event
                $clone.find('input[name="basic_cost[]"]').on('input',function(){
                	var amount=mrp_calculate($(this).val(),$clone.find('input[name="gst[]"]').val());
                	$clone.find('input[name="billing_price[]"]').val(amount);
                });
                $clone.find('input[name="gst[]"]').on('input',function(){
                	var amount=mrp_calculate($clone.find('input[name="basic_cost[]"]').val(),$(this).val());
                	$clone.find('input[name="billing_price[]"]').val(amount);
                });
        })

        // Remove button click handler
        .on('click', '.remove-product', function() {
            var $row = $(this).closest('tr');

            // Remove fields
            $('#purchase_order_form')
                .formValidation('removeField', $row.find('[name="product[]"]'))
                .formValidation('removeField', $row.find('[name="basic_cost[]"]'))
                .formValidation('removeField', $row.find('[name="gst[]"]'))
                .formValidation('removeField', $row.find('[name="billing_price[]"]'))
                .formValidation('removeField', $row.find('[name="discount[]"]'))
                .formValidation('removeField', $row.find('[name="qty[]"]'))
                // .formValidation('removeField', $row.find('[name="billing[]"]'))
                .formValidation('removeField', $row.find('[name="expiry[]"]'))
                .formValidation('removeField', $row.find('[name="expiry_days[]"]'));
          
            // Remove element containing the fields
            $row.remove();
        }).on('success.form.fv', function(e) {
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');

             var form = $('#purchase_order_form')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '{{URL::to('/') }}/admin/purchase',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                                swal({ title: "Stock Entry!",
                                            text: "Stock added!",
                                            type: "success" 
                                            }).then(function() {
                                                location.reload();
                                            });
                                
                              }else{
                                sweetAlert("Oops...",'' , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });
        });

        
     $('.add-more').trigger('click');
		
	});
</script>

@endsection