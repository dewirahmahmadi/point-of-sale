<section class="content-header">
	<h1>
		Sales
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
		<li>Transaction</li>
		<li class="active">Sales</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-8">
			<div class="row">
				<div class="col-lg-12">
					<div class="box box-widget">
						<div class="box-body">
							<table width="100%">
								<tr>
									<td style="vertical-align: top">
										<label for="date">Date</label>
									</td>
									<td>
										<div class="form-group">
											<input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td style="vertical-align: top; width: 30%">
										<label for="user">Kasir</label>
									</td>
									<td>
										<div class="form-group">
											<input type="user" id="date" value="<?= $this->fungsi->user_login()->name; ?>" class="form-control" readonly>
										</div>
									</td>
								</tr>
								<tr>
									<td style="vertical-align: top">
										<label for="customer">Customer</label>
									</td>
									<td>
										<div>
											<select id="customer" class="form-control">
												<option value="">Umum</option>
												<?php foreach ($customers as $customer){?>
													<option value="<?= $customer->customer_id; ?>"><?= $customer->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="box box-widget">
						<div class="box-body">
							<table width="100%">
								<tr>
									<td style="vertical-align: top; width: 30%;">
										<label for="barcode">Barcode</label>
									</td>
									<td>
										<div class="form-group input-group">
											<input type="hidden" id="item_id">
											<input type="hidden" id="price">
											<input type="hidden" id="stock">
											<input type="text" id="barcode" class="form-control" readonly>
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
													<i class="fa fa-search"></i>
												</button>
											</span>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<div align="right">
						<h4>Invoice <b><span id="invoice"><?=$invoice; ?></span></b></h4>
						<h1><b><span id="grand_total" style="font-size: 50pt">0</span></b></h1>
					</div>
				</div>
			</div>
			<div>
				<button id="process_payment" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-process-payment">
					<i class="fa fa-paper-plane-o"></i> Process Payment
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="box box-widget js-table-cart">
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<td>Barcode</td>
							<td>Product Name</td>
							<td>Stock</td>
							<td>Price</td>
							<td>Qty</td>
							<td>Action</td>
							<td width="15%">Total</td>
						</tr>
						</thead>
						<tbody id="js-cart-table-body">
						<tr id="js-row-no-item">
							<td colspan="9" class="text-center">Tidak Ada Item</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->view('transaction/sales/mustache') ?>
<?php $this->view('transaction/sales/modal') ?>



