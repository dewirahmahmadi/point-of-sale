<section class="content-header">
    <h1>
        Unit
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
        <li class="active">Unit</li>
      </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Unit</h3>
            <div class="pull-right">
                <a href="<?=site_url('unit')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('unit/process') ?>" method="post">
                        <input type="hidden" name="id" value="<?=$row->unit_id; ?>" class="form-control">
                        <div class="form-group">
                            <label>Unit Name </label>
                            <input type="text" name="unit_name" value="<?=$row->name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page ?>" class="btn btn-success btn-flat">Save</button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        <div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</section>