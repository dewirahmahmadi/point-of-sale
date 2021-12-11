<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>

<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Items</span>
              <span class="info-box-number"><?= $this->fungsi->count_items()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Supplier</span>
              <span class="info-box-number"><?= $this->fungsi->count_supplier()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Customers</span>
              <span class="info-box-number"><?= $this->fungsi->count_custumer()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number"><?= $this->fungsi->count_users()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	<div class="row">
		<div class="col-md-8">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Orders</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body" style="">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
							<tr>
								<th>Order ID</th>
								<th>Date</th>
								<th>Discount</th>
								<th>Total Price</th>
							</tr>
							</thead>
							<tbody>
								<?php
									$item = $this->fungsi->get_newest_sale();
									foreach ($item->result() as $i) { ?>
										<tr>
											<td><a href="<?= site_url('report/details/' . $i->sale_id) ?>"><?= $i->invoice ?></a></td>
											<td><?= indo_date($i->date) ?></td>
											<td><?= $i->discount ?></td>
											<td><?= indo_currency($i->final_price) ?></td>
										</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix" style="">
					<a href="<?=site_url('sale')?>" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
					<a href="<?=site_url('report/sale_report')?>" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
				</div>
				<!-- /.box-footer -->
			</div>

		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Recently Added Products</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ul class="products-list product-list-in-box">
						<?php
						$item =$this->fungsi->get_newest_product();
						foreach ($item->result() as $i) { ?>
						<li class="item">
							<?php if ($i->image) {?>
								<div class="product-img">
									<img src='<?=base_url()."uploads/products/".$i->image;?>' alt="Product Image">
								</div>
							<?php } ?>
							<div class="product-info">
								<a href="javascript:void(0)" class="product-title"><?= $i->name;?>
									<span class="label label-warning pull-right"><?= $i->stock;?></span></a>
								<span class="product-description">
								  <?=indo_currency($i->price); ?>
								</span>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<a href="<?=site_url('item')?>" class="uppercase">View All Products</a>
				</div>
				<!-- /.box-footer -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
		</div>
	</div>
<section>
