<section class="content-header">
    <h1>
        Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-th"></i> Dashboard</a></li>
        <li class="active">Users</li>
      </ol>
</section>

<section class="content">
    <?php $this->view('message'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create User 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="js-data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($row->result() as $key => $value) {?> 
                        <tr>
                            <th style="width:5%;"><?= $no++ ?></th>
                            <th><?= $value->username ?></th>
                            <th><?= $value->name ?></th>
                            <th><?= $value->address ?></th>
                            <th>
                                <?php if($value->level == 1) {?> Admin <?php }?> 
                                <?php if($value->level == 2) {?> Manager <?php }?> 
                                <?php if($value->level == 3) {?> Kasir <?php }?> 
                            </th>
                            <th class="text-center" width="160px">
                                <a href="<?=site_url('user/edit/'.$value->user_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('user/delete/'.$value->user_id)?>" onclick="return confirm('Are you sure to remove the data?')" class="btn btn-danger btn-xs">
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