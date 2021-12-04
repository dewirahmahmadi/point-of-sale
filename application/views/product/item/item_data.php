<section class="content-header">
    <h1>
        Items
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
        <li class="active">Items</li>
      </ol>
</section>

<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create Items 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="js-data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($row->result() as $key => $value) {?> 
                        <tr>
                            <th style="width:5%;"><?= $no++ ?></th>
                            <th><?= $value->barcode; ?></th>
                            <th><?= $value->name; ?></th>
                            <th><?= $value->name_category; ?></th>
                            <th><?= $value->name_unit; ?></th>
                            <th><?= $value->price; ?></th>
                            <th><?= $value->stock; ?></th>
                            <th><?php if ($value->image){ ?>
                                    <img src='<?=base_url()."uploads/products/".$value->image; ?>' style="width: 100px;" >
                                <?php }?>
                            </th>    
                            <th class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/'.$value->item_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?=site_url('item/delete/'.$value->item_id)?>" onclick="return confirm('Are you sure to remove the data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </th>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>