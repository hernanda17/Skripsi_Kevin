<?php  $userdata = $this->session->userdata('logged_in');?>


<div class="content">


	<!--tampilan head-->
	<div class="row">
		<?php 
	  $role = $userdata['role'];?>
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
								<th>NO</th>
								<th>ID Pesanan</th>
								<th>Description</th>
								<th>Timestamp</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ( $pesanan->num_rows() > 0 ) {
								$i = 1;
								foreach ( $pesanan->result() as $row ) {
									?>

							<tr>
								<td>
									<h6 class="no-margin"></h6>
									<?php echo $i ;?>
									</h6>
								</td>
								<td>
									<a href="<?php echo base_url();?>index.php/home/openPesananDetail/<?php echo $row->idPesanan;?>" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
										<h6 class="no-margin"></h6>
										<?php echo $row->idPesanan;?>
										</h6>
									</a>
								</td>

								<td>
									<h6 class="no-margin"></h6>
									<?php echo $row->description;?>
									</h6>
								</td>
								<td>
									<?php echo $row->timestamp;?>
								</td>

								<td>
									<?php 
									$status = $row->status;
									if($status == 0)
									{
										echo "Belum Disetujui";
									}else if ($status == 1)
										echo "Sudah disetujui";
									else 
										echo "Selesai";
									?>
								</td>

							</tr>
							<?php $i++;}
					} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php }?>

		<!--Tampilan Beranda Kepala Teknisi-->

		<?php if($role =="2"){?>

		<div class="panel panel-white">
			<div class="panel-heading">
				<h5 class="panel-title">Menejemen Konfirmasi Pesanan</h5>
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
								<th style="width: 50px;">No</th>
								<th style="width: 50px;">ID Pesanan</th>
								<th style="width: 50px;">Username</th>
								<th style="width: 50px;">Description</th>
								<th style="width: 50px;">Timestamp</th>
								<th class="text-center" style="width: 20px;">
									<i class="icon-arrow-down12"></i>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($pesanan->num_rows() > 0) {
							$i = 1;
							foreach ($pesanan->result() as $row)	{ ?>

							<tr>
								<td class="text-center">
									<h6 class="no-margin"></h6>
									<?php echo $i ;?>
									</h6>
								</td>
								<td>
									<a href="<?php echo base_url();?>index.php/home/openPesananDetailConfirmationAccept/<?php echo $row->idPesanan;?>" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
										<h6 class="no-margin"></h6>
										<?php echo $row->idPesanan;?>
										</h6>
									</a>
								</td>
								<td>
									<div class="media-left media-middle">
											<?php echo $row->username;?>
									</div>
								</td>
								<td>
									<div class="media-left media-middle">
										<?php echo $row->description;?>
									</div>
								</td>
								<td>
									<div class="media-left media-middle">
										<?php echo $row->timestamp;?>
									</div>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="<?php echo base_url();?>index.php/home/processKonfirmasiPesanan/<?php echo $row->idPesanan;?>">
													<i class="icon-checkmark4"></i> Konfirmasi Pesanan</a>
												</li>
												<li><a href="<?php echo base_url();?>index.php/home/processBatalPesanan/<?php echo $row->idPesanan;?>">
												<i class="icon-cross2"></i> Batalkan Pesanan</a>
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

		<?php }?>

	</div>


	</body>
	</html>