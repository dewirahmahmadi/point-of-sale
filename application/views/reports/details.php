<section class="content-header">
	<h1>
		Invoice
		<small>#<?= $report[0]->invoice ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Invoice</li>
	</ol>
</section>

<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<?= $report[0]->invoice ?>
				<small class="pull-right">Date: <?= indo_date($report[0]->date) ?></small>
			</h2>
		</div>
		<!-- /.col -->
	</div>

	<div class="row">
		<div class="col-sm-4 invoice-col">
			<b>Costumer Name:</b><?= $report[0]->customer_name ? $report[0]->customer_name : 'Umum' ?><br>
			<b>Note:</b> <?= $report[0]->note ?  $report[0]->note : ' - '?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Qty</th>
					<th>Product</th>
					<th>Price #</th>
					<th>Subtotal</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($report as $item) { ?>
					<tr>
						<td><?= $item->qty ?></td>
						<td><?= $item->item_name ?></td>
						<td><?= indo_currency($item->price) ?></td>
						<td><?= indo_currency($item->qty * $item->price) ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-lg-offset-6">
			<p class="lead">Summary</p>

			<div class="table-responsive">
				<table class="table">
					<tbody>
					<tr>
						<th style="width:50%">Subtotal:</th>
						<td><?= indo_currency($report[0]->total_price) ?></td>
					</tr>
					<tr>
						<th>Discount:</th>
						<td><?= indo_currency($report[0]->discount) ?></td>
					</tr>
					<tr>
						<th>Total:</th>
						<td><?= indo_currency($report[0]->final_price) ?></td>
					</tr>
					</tbody></table>
			</div>
		</div>
	</div>

	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-xs-12">
			<a href="<?= site_url('report/print_invoice/' . $report[0]->sale_id); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
		</div>
	</div>
</section>
