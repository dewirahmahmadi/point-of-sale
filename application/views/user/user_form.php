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
            <h3 class="box-title">Add User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('user/process') ?>" method="post">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : ''?>">
                            <label>Name * </label>
                            <input type="text" name="fullname" value="<?=set_value('fullname') ?: $row->name;?>" class="form-control">
                            <span class="help-block"><?= form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : ''?>">
                            <label>Username * </label>
                            <input type="text" name="username" value="<?=set_value('username') ?: $row->username;?>" class="form-control">
                            <span class="help-block"><?= form_error('username') ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : ''?>">
                            <label>Password * </label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?= form_error('password') ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : ''?>">
                            <label>Password Confirmation * </label>
                            <input type="password" name="passconf" class="form-control">
                            <span class="help-block"><?= form_error('passconf') ?></span>
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : ''?>">
                            <label>Address </label>
                            <textarea name="address" class="form-control"><?=set_value('address') ?: $row->address; ?></textarea>
                            <span class="help-block"><?= form_error('address') ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : ''?>">
                            <label>Level * </label>
                            <select name="level" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" <?php echo set_select('level', '1', FALSE); ?> >Admin</option>
                                <option value="2" <?php echo set_select('level', '2', FALSE); ?> >Manager</option>
                                <option value="3" <?php echo set_select('level', '3', FALSE); ?> >Kasir</option>
                            </select>
                            <span class="help-block"><?= form_error('level') ?></span>
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