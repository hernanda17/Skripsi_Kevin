<?php  $userdata = $this->session->userdata('logged_in');?>


<div class="content">


	<!--tampilan head-->
	<div class="row">
		<?php 
	  $role = $userdata['role'];?>
		<!--Gudang-->
		<?php if($role =="0")
		  {
	  ?>
		<div class="col-lg-4">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li class="dropdown">
								<i class="icon-user-plus"></i>
								</span>
							</li>
						</ul>
					</div>
					<h3 class="no-margin">
						<?php echo count($barang); ?>
					</h3>
					Banyak Barang
					<div class="text-muted text-size-small">-</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>
		<?php 			  
		  }
?>

		<!--Teknisi Dan kepala teknisi-->
		<?php 
		  if($role =="1"|| $role == "2")
		  {
	  ?>

		<div class="col-lg-4">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li class="dropdown">
								<i class="icon-user-plus"></i>
								</span>
							</li>
						</ul>
					</div>
					<h3 class="no-margin">
						<?php echo @$pesanan; ?>
					</h3>
					Banyak Pesanan
					<div class="text-muted text-size-small">-</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>
		<?php 			  
		  }
?>


		<div class="col-lg-4">
			<div class="panel bg-pink-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li class="dropdown">
								<i class="icon-cog3"></i>
							</li>
						</ul>
					</div>

					<h3 class="no-margin">11</h3> Banyak E-mail
					<div class="text-muted text-size-small">-</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
				</div>

				<div id="server-load">
				</div>
			</div>
			<!-- /current server load -->

		</div>

		<div class="col-lg-4">
			<div class="panel bg-blue-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li class="dropdown">
								<i class="icon-cog3"></i>
							</li>
						</ul>
					</div>

					<h3 class="no-margin"></h3>
					kosong
					<div class="text-muted text-size-small">-</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
				</div>

				<div id="server-load">
				</div>
			</div>
		</div>
	</div>

	<!--Tampilan Beranda Gudang-->

	<?php if($role =="0"){?>

	<div class="panel panel-white">
		<div class="panel-heading">
			<h5 class="panel-title">Menejemen Barang</h5>
			<div class="heading-elements">
				<ul class="icons-list">
				</ul>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel panel-flat">
			<div class="table">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th style="width: 50px;">ID Barang</th>
							<th style="width: 50px;">Nama Barang</th>
							<th class="text-center" style="width: 20px;">
								<i class="icon-arrow-down12"></i>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($barang->num_rows() > 0) {
							$i = 1;
							foreach ($barang->result() as $row)	{ ?>

						<tr>
							<td class="text-center">
								<h6 class="no-margin"></h6>
								<?php echo $i ;?>
								</h6>
							</td>
							<td>
								<div class="media-left media-middle">
									<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
                                    <span class="letter-icon"><?php echo $row->idBarang[0];?></span>
                                </a>
								




								</div>

								<div class="media-body">
									<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">
										<?php echo $row->namaBarang;?>
									</a>
									<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span>
										<?php echo $row->stokBarang;?>
									</div>
								</div>
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url();?>index.php/home/prosesHapusBarang/<?php echo $row->idBarang;?>"><i class="icon-undo"></i> Hapus Barang</a>
											</li>
											<li><a href="<?php echo base_url();?>index.php/home/openPageBarangDetail/<?php echo $row->idBarang;?>">
												<i class="icon-history"></i> Perbaharui Barang</a>
											



											</li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
						<?php $i++;}
					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Tambah Barang</h5>
			<div class="heading-elements">
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/SimpanBarang" method='post' name='updateProfile'>
				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label col-lg-2">ID Barang : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="idBarang">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Nama Barang : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="namaBarang">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Stok Barang : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="stokBarang">
						</div>
					</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
	</div>

	<?php }?>

	<!--Tampilan Beranda Teknisi-->

	<?php if($role =="1"){?>

	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Tambah Pemesanan</h5>
			<div class="heading-elements">
				<ul class="icons-list">
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/processKirimPesan" method='post' enctype="multipart/form-data" name="kirimpesan">
				<fieldset class="content-group">

					<div class="form-group">
						<label class="control-label col-lg-2">Nomor Pesanan : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="idPesanan">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Deskripsi : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="description">
						</div>
					</div>
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_form_inline">Launch <i class="icon-play3 ml-2"></i></button>

				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-white">
		<div class="panel-heading">
			<h5 class="panel-title">Menejemen Pesanan</h5>
			<div class="heading-elements">
				<ul class="icons-list">
				</ul>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel panel-flat">
			<div class="table">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th >ID Pesanan</th>
							<th >Description</th>
							<th >Timestamp</th>
							<th >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($barang->num_rows() > 0) {
							$i = 1;
							foreach ($barang->result() as $row)	{ ?>

						<tr>
							<td>
								<h6 class="no-margin"></h6>
								<?php echo $i ;?>
								</h6>
							</td>
							<td>
									<h6 class="no-margin"></h6>
									<?php echo $row->idBarang;?>
									</h6>
							</td>

							<td>
									<h6 class="no-margin"></h6>
									<?php echo $row->namaBarang;?>
									</h6>
							</td>
							<td>
									<?php echo $row->statusBarang;?>
							</td>

						</tr>
						<?php $i++;}
					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="modal_form_inline" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Inline form</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<form action="#" class="modal-body form-inline justify-content-center">
					<label>Username:</label>
					<input type="text" placeholder="Your username" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">

					<label class="ml-sm-2">Password:</label>
					<input type="password" placeholder="Your password" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">

					<button type="submit" class="btn bg-primary ml-sm-2 mb-sm-0">Sign me in <i class="icon-plus22"></i></button>
				</form>
			</div>
		</div>
	</div>
	<?php }?>
</div>


</body>
</html>