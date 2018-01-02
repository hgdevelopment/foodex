@extends('admin.layout.puredrops')

{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection --}}

@section('sidebar')

@include('admin.partial.header')

@include('admin.partial.aside')

@endsection

@section('body')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0">Add Stock</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<form class="floating-labels m-t-40">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_number" >
									<span class="bar"></span>
									<label for="product_number">Product Number</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_name" >
									<span class="bar"></span>
									<label for="product_name">Product Name</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<select class="form-control p-0" id="product_brand">
										<option></option>
										<option>Male</option>
										<option>Female</option>
									</select>
									<span class="bar"></span>
									<label for="product_brand">Brand</label>
								</div>
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_cost" >
									<span class="bar"></span>
									<label for="product_cost">Basic Cost</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_mrp">
									<span class="bar"></span>
									<label for="product_mrp">MRP</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_discount" data-mask="99%">
									<span class="bar"></span>
									<label for="product_discount">Discount</label>
								</div>
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_gst" data-mask="99%">
									<span class="bar"></span>
									<label for="product_gst">GST</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_bill_price" >
									<span class="bar"></span>
									<label for="product_bill_price">Billing Price</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<input type="text" class="form-control" id="product_quantity" >
									<span class="bar"></span>
									<label for="product_quantity">Stock Quantity</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Stocks</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Stock Name</th>
									<th>Stock ID</th>
									<th>Billing Price</th>
									<th>Discount</th>
									<th>Tax</th>
									<th>Quantity</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Stock Name</th>
									<th>Stock ID</th>
									<th>Billing Price</th>
									<th>Discount</th>
									<th>Tax</th>
									<th>Quantity</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Stock Name</th>
									<th>Stock ID</th>
									<th>Billing Price</th>
									<th>Discount</th>
									<th>Tax</th>
									<th>Quantity</th>
									<th>Action</th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>


@endsection