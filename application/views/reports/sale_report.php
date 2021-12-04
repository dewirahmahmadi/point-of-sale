<section class="content-header">
	<h1>
		Sales Report
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
		<li>Report</li>
		<li class="active">Sales</li>
	</ol>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
			</div>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
			</div>

			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="width: 10px">No.</th>
						<th>Invoice</th>
						<th>Name Customer</th>
						<th>Discount</th>
						<th>Note</th>
						<th>Date</th>
						<th>Petugas</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1;
					foreach ($sales as $s) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td id="invoice"><?= $s->invoice; ?></td>
							<td style="text-align: center;"><?= $s->customer_name != null ? $s->customer_name : "Umum"; ?></td>
							<td><?= indo_currency($s->discount) ?></td>
							<td><?= $s->note; ?></td>
							<td style="text-align: center;"><?= indo_date($s->date) ?></td>
							<td align="center">
								<h5><span class="badge badge-secondary"><?= $s->user_name; ?></span></h5>
							</td>
							<td align="center">
								<a class="btn btn-default btn-sm" onclick="showDetail(<?= $s->sale_id; ?>)"><i class=" fa fa-eye"></i>
								</a>
								<a href="<?= site_url('reports/print_report/' . $s->sale_id); ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-detail">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Stock</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<div class="container-fluid">
					<table class="table table-borderless">
						<tbody>
						<tr>
							<th>Item Name</th>
							<td>:</td>
							<td>
								<span id="item_name">&nbsp;</span>
							</td>
						</tr>
						<tr>
							<th>Price</th>
							<td>:</td>
							<td>
								<span id="price">&nbsp;</span>
							</td>
						</tr>
						<tr>
							<th>Qty</th>
							<td>:</td>
							<td>
								<span id="qty">&nbsp;</span>
							</td>
						</tr>
						<tr>
							<th>Discount Item </th>
							<td>:</td>
							<td>
								<span id="disc">&nbsp;</span>
							</td>
						</tr>
						<tr>
							<th>total </th>
							<td>:</td>
							<td>
								<span id="total">&nbsp;</span>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function showDetail(sale_id) {
		$.ajax({
			type: "POST",
			url: "<?= site_url('reports/detail'); ?>",
			data: {
				sale_id: sale_id
			},
			dataType: "json",
			success: function(result) {
				// console.log(result)
				$('#item_name').text(result['item_name']);
				$('#price').text(result['price']);
				$('#qty').text(result['qty']);
				$('#disc').text(result['discount_item']);
				$('#total').text(result['total']);
				$('#sale_id').val(result['sale_id']);

				$('#modal-detail').modal('show')
			}
		});
	}

	function printSale(sale_id) {

	}
</script>
