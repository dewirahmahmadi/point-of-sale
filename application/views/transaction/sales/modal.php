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
					<table id="js-data-table" class="table table-bordered table-striped" id="table1">
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
									<button class="btn btn-xs btn-info" id="js-select-cart" data-id="<?= $item->item_id; ?>" data-barcode="<?= $item->barcode; ?>" data-name="<?= $item->name; ?>" data-price="<?= $item->price; ?>" data-stock="<?= $item->stock; ?>">
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

<div class="modal fade" id="modal-process-payment">
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
					<div class="row">
						<div class=col-md-6>
							<div class="form-group">
								<label for="sub_total">Sub Total</label>
								<input type="sub_total" id="sub_total" class="form-control" readonly>
							</div>				
						</div>
						<div class=col-md-6>
						<div class="form-group ">
								<label for="sub_total">Discount</label>
								<div class="input-group">
								<input type="text" id="discount" class="form-control" >
									<span class="input-group-btn">
										<button type="button" class="btn btn-info btn-flat">
											Apply Discount
										</button>
									</span>
								</div>		
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="total">Total</label>
								<input type="total" id="grant_total" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="total">Cash</label>
								<input type="total" id="cash" class="form-control">
							</div>
						</div>
					</div>		
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Notes</label>
								<textarea id="notes" rows="3" class="form-control"></textarea>
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary js-process-payment" data-url="<?= site_url('sale/process') ?>">Process Payment</button>
              </div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-success-payment">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Payment Success</h4>
			</div>
			<div class="modal-body table-responsive">
				<div class="container-fluid">		
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info">OK & Print Invoice</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
              </div>
		</div>
	</div>
</div>