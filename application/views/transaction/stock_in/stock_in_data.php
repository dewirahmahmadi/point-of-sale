<section class="content-header">
    <h1>
        Stock In
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
        <li>Transaction</li>
        <li class="active">Stock In</li>
      </ol>
</section>

<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Stock In</h3>
            <div class="pull-right">
                <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create Stock In 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="js-data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
						<th>Barcode</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($stocks as $stock) {?>
                        <tr>
                            <th style="width:5%;"><?= $no++ ?></th>
							<th><?= $stock->item_barcode; ?></th>
							<th><?= $stock->item_name; ?></th>
                            <th><?= indo_currency($stock->item_price); ?></th>
							<th><?= $stock->qty; ?></th>
							<th><?= $stock->supplier_name ? $stock->supplier_name : ''; ?></th>
                            <th class="text-center" width="160px">
								<form action="<?= site_url('stock/delete') ?>" method="post" class="d-inline">
									<input type="hidden" name="stock_id" value="<?=  $stock->stock_id; ?>">
									<input type="hidden" name="item_id" value="<?=  $stock->item_id; ?>">
									<button class="btn btn-danger btn-sm tombol-hapus" type="submit" name="<?=$page ?>">
										<i class="fa fa-trash"></i> Delete
									</button>
								</form>
                            </th>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
