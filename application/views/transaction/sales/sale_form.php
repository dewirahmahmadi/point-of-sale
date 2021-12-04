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
		<div class="col-lg-4">
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
		<div class="col-lg-4">
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
						<tr>
							<td style="vertical-align: top; width: 30%;">
								<label for="qty">Qty</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="qty" value="1" min="1" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div>
									<button type="button" id="add_cart" class="btn btn-primary">
										<i class="fa fa-cart-plus"></i> Add
									</button>
								</div>
							</td>
						</tr>
					</table>
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
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-widget">
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>#</td>
								<td>Barcode</td>
								<td>Product Item</td>
								<td>Price</td>
								<td>Qty</td>
								<td width="10%">Discount Item</td>
								<td width="15%">Total</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody id="cart_table">
							<tr>
								<td colspan="9" class="text-center">Tidak Ada Item</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align: top; width: 30%;">
								<label for="sub_total">Sub Total</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="sub_total" value="" class="form-control" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label for="sub_total">Discount</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="discount" value="0" min="0" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label for="sub_total">Grant Total</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="grant_total" class="form-control" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align: top; width: 30%;">
								<label for="cash">Cash</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="cash" value="0" min="0" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label for="sub_total">Change</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="change" class="form-control" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align: top; width: 30%;">
								<label for="note">Note</label>
							</td>
							<td>
								<div class="form-group">
									<textarea id="note" rows="3" class="form-control"></textarea>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div>
				<button type="reset" id="cancel_payment" class="btn btn-flat btn-warning">
					<i class="fa fa-refresh"></i> Cancel
				</button>
				<button id="process_payment" class="btn btn-flat btn-success">
					<i class="fa fa-paper-plane-o"></i> Process Payment
				</button>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-item">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Select Product Item</h4>
			</div>
			<div class="modal-body table-responsive">
				<div class="container-fluid">
					<table class="table table-bordered table-striped" id="table1">
						<thead>
						<tr>
							<th>Barcode</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($items as $item) { ?>
							<tr>
								<td><?= $item->barcode; ?></td>
								<td><?= $item->name; ?></td>
								<td><?= $item->name_unit; ?></td>
								<td><?= indo_currency($item->price); ?></td>
								<td><?= $item->stock; ?></td>
								<td align="center">
									<button class="btn btn-xs btn-info" id="js-select-cart" data-id="<?= $item->item_id; ?>" data-barcode="<?= $item->barcode; ?>" data-name="<?= $item->name; ?>" data-unit="<?= $item->name_unit; ?>" data-stock="<?= $item->stock; ?>">
										<i class="fa fa-check"></i> Select
									</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

