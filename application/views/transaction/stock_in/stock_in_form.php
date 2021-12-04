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
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Stock In</h3>
            <div class="pull-right">
                <a href="<?=site_url('stock/in')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('stock/process') ?>" method="post">
                        <input type="hidden" name="stock_id" value=""  class="form-control">
                        <div class="form-group">
                            <label>Date </label>
                            <input type="date" name="date" value="<?=date("Y-m-d")?>" class="form-control" required>
                        </div>
                        <div>
                            <label for="barcode" class="col-form-label">Barcode <font color="#f00">*</font></label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                                <div class="input-group-btn">
                                    <span>
                                        <button type="button" class="input-group-text btn btn-info btn-flat form-control" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search" id="basic"></i>
                                        </button>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Item Name </label>
                            <input type="text" name="item_name" id="item_name" value="" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_name">Item Unit</label>
                                        <input type="text" name="unit_name" id="unit_name" class="form-control" value="-" readonly autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">Initial Stock</label>
                                        <input type="text" name="stock" id="stock" class="form-control" value="-" readonly autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="col-form-label">Detail <font color="#f00">*</font></label>
                                <input type="text" name="detail" id="detail" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="supplier" class="col-form-label">Supplier <span>(Optional)</span></label>
                                <select name="supplier" id="supplier" class="form-control" autofocus>
                                    <option value="" selected>--Pilih--</option>
                                    <?php foreach ($suppliers as $supplier) { ?>
                                        <option value="<?= $supplier->supplier_id; ?>"><?= $supplier->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-form-label">Qty <font color="#f00">*</font></label>
                                <input type="number" name="qty" id="qty" class="form-control" autofocus>
                            </div>
                           
                        <div class="form-group">
                            <button type="submit" name="<?=$page; ?>" class="btn btn-success btn-flat">Save</button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        <div>
                    </form>
                </div>
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
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $item->item_id; ?>" data-barcode="<?= $item->barcode; ?>" data-name="<?= $item->name; ?>" data-unit="<?= $item->name_unit; ?>" data-stock="<?= $item->stock; ?>">
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
