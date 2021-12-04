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
            <h3 class="box-title">Add Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/process') ?>               
                        <input type="hidden" name="id" value="<?=$row->item_id; ?>" class="form-control">
                        <div class="form-group">
                            <label>Barcode </label>
                            <input type="text" name="barcode" value="<?=$row->barcode; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Product Name </label>
                            <input type="text" name="product_name" value="<?=$row->name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <select name="category" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($category->result() as $key => $data){ ?>
                                    <option value="<?= $data->category_id; ?>" <?=$data->category_id == $row->category_id ? 'selected' : ''; ?>> <?= $data->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit </label>
                            <select name="unit" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($unit->result() as $key => $data){ ?>
                                    <option value="<?= $data->unit_id; ?>" <?=$data->unit_id == $row->unit_id ? 'selected' : ''; ?> > <?= $data->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price </label>
                            <input type="number" name="price" value="<?=$row->price; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" name="image" value="<?=$row->image; ?>"  class="form-control" accept="jpg/jpeg/png">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page ?>" class="btn btn-success btn-flat">Save</button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        <div>
                    <?php echo form_close() ?>
                </div>
            </div>
           
        </div>
    </div>
</section>