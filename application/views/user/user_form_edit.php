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
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('user/update') ?>" method="post">
						<input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : ''?>">
                            <label>Name * </label>
                            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ?: $row->name;?>" class="form-control">
                            <span class="help-block"><?= form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : ''?>">
                            <label>Username * </label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ?: $row->username;?>" class="form-control">
                            <span class="help-block"><?= form_error('username') ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : ''?>">
                            <label>Password * </label><small>Leave Empty if the password not change</small>
                            <input type="password" name="password" class="form-control" value="<?=$this->input->post('password') ?>">
                            <span class="help-block"><?= form_error('password') ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : ''?>">
                            <label>Password Confirmation * </label>
                            <input type="password" name="passconf" class="form-control" value="<?=$this->input->post('passconf') ?>">
                            <span class="help-block"><?= form_error('passconf') ?></span>
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : ''?>">
                            <label>Address </label>
                            <textarea name="address" class="form-control"><?=$this->input->post('address') ?: $row->address; ?></textarea>
                            <span class="help-block"><?= form_error('address') ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : ''?>">
                            <label>Level * </label>
                            <select name="level" class="form-control">
								<?php $level = $this->input->post('level') ?: $row->level; ?>
                                <option value="1" <?=  $level ==1 ? 'selected' : '' ?> >Admin</option>
                                <option value="2" <?=  $level ==2 ? 'selected' : ''?> >Manager</option>
                                <option value="3" <?=  $level ==3 ? 'selected' : '' ?> >Kasir</option>
                            </select>
                            <span class="help-block"><?= form_error('level') ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Save</button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        <div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</section>
