<?php  $userdata = $this->session->userdata('logged_in');?>


<div class="content">


	<!--tampilan head-->
	<div class="row">
		<?php 
	  $role = $userdata['role'];?>
		<!--Tampilan Beranda Gudang-->

		<?php if($role =="0"){?>

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
							<label class="control-label col-lg-2">Supplier : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="supplier">
							</div>
						</div>
						
						<div class="form-group">
		                        	<label class="control-label col-lg-2">Jenis Barang : </label>
		                        	<div class="col-lg-10">
			                            <div class="uniform-select fixedWidth">
										<select class="form-control form-control-uniform" data-fouc="" name="JenisBarang">
			                               
										   <?php if ($jenis->num_rows() > 0) {
											$i = 1;
											foreach ($jenis->result() as $row)	{ ?>
														   
										    <option value="<?php echo $row->id_jenisBarang;?>"><?php echo $row->Nama_jenis;?></option>
											<?php }}?>
											
			                            </select></div>
		                            </div>
		                        </div>
						
						
						<div class="form-group">
							<label class="control-label col-lg-2">ID RFID : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="idRFID">
							</div>
						</div>
						
					</fieldset>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		
		
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Jenis Barang</h5>
				<div class="heading-elements">
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/SimpanJenis" method='post' name='SimpanJenis'>
					<fieldset class="content-group">
						<div class="form-group">
							<label class="control-label col-lg-2">ID Jenis : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="id_jenisBarang">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Nama Jenis : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="Nama_jenis">
							</div>
						</div>
					</fieldset>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>

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
					<div class="datatable-header">
						<form class="form" action="<?php echo base_url();?>index.php/home/procesCariBarang" method='post' name='updateProfile'>

							<div id="DataTables_Table_2_filter" class="dataTables_filter">

								<label><span>Cari:</span> 
									<input type="search" name="cariData" class="" placeholder="Cari data barang..." aria-controls="DataTables_Table_2">
								</label>
							</div>
						</form>
					</div>
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th style="width: 50px;">ID Barang</th>
									<th style="width: 50px;">Nama Barang</th>
									<th style="width: 50px;">Supplier</th>
									<th style="width: 50px;">Tanggal Masuk</th>
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
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->idBarang;?>
										</h6>
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->namaBarang;?>
										</h6>
										
									</td>
			
			
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->Supplier;?>
										</h6>
										
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->timestamp;?>
										</h6>
										
									</td>
			
			
										
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a data-toggle="modal" data-target="#modal_default"><i class="icon-undo"></i> Hapus Barang</a>
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
		
		
		
			<div class="panel panel-white">
			<div class="panel-heading">
				<h5 class="panel-title">Menejemen Jenis Barang</h5>
				<div class="heading-elements">
					<ul class="icons-list">
					</ul>
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div>


			<div class="panel panel-flat">
				<div class="table">
					<div class="datatable-header">
						<form class="form" action="<?php echo base_url();?>index.php/home/procesCariBarang" method='post' name='updateProfile'>

							<div id="DataTables_Table_2_filter" class="dataTables_filter">

								<label><span>Cari:</span> 
									<input type="search" name="cariData" class="" placeholder="Cari data jenis..." aria-controls="DataTables_Table_2">
								</label>
							</div>
						</form>
					</div>
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th style="width: 50px;">ID Jenis</th>
									<th style="width: 50px;">Nama Jenis</th>
									<th style="width: 50px;">Stok</th>
									<th class="text-center" style="width: 20px;">
										<i class="icon-arrow-down12"></i>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($jenis->num_rows() > 0) {
							$i = 1;
							foreach ($jenis->result() as $row)	{ ?>

								<tr>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->id_jenisBarang;?>
										</h6>
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->Nama_jenis;?>
										</h6>
										
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->Jumlah;?>
										</h6>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a data-toggle="modal" data-target="#modal_default"><i class="icon-undo"></i> Hapus Jenis</a>
													</li>
													<li><a href="<?php echo base_url();?>index.php/home/openPageBarangDetail/<?php echo $row->id_jenisBarang;?>">
												<i class="icon-history"></i> Perbaharui Jenis</a>
													

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
										echo "Pesanan belum Disetujui";
									}else if ($status == 1)
										echo "Pesanan telah disetujui";
									else if($staus == 2)
										echo "Pesanan telah selesai";
									else if($staus == 3)
										echo "Pesanan telah dibatalkan";
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
												<li>
													<a data-toggle="modal" data-target="#modal_default2"><i class="icon-checkmark4"></i> Konfirmasi Pesanan</a>
												</li>
												<li>
													<a data-toggle="modal" data-target="#modal_default3"><i class="icon-cross2"></i> Batalkan Pesanan</a>
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

	<div id="modal_default" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					<h6 class="font-weight-semibold">Apakah anda yakin menghapus barang ?</h6>
				</div>

				<div class="modal-footer">
					<a href="<?php echo base_url();?>index.php/home/prosesHapusBarang/<?php echo $row->idBarang;?>" class="btn bg-primary">
									 Ya</a>
				

					<button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>

	<div id="modal_default2" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					<h6 class="font-weight-semibold">Apakah anda yakin konfirmasi pesanan ?</h6>
				</div>

				<div class="modal-footer">
					<a href="<?php echo base_url();?>index.php/home/processKonfirmasiPesanan/<?php echo $row->idPesanan;?>">
													<i class="icon-checkmark4"></i> Konfirmasi Pesanan</a>
				

					<button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>

	<div id="modal_default3" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					<h6 class="font-weight-semibold">Apakah anda yakin batalkan pesanan ?</h6>
				</div>

				<div class="modal-footer">
					<a href="<?php echo base_url();?>index.php/home/processBatalPesanan/<?php echo $row->idPesanan;?>">
												<i class="icon-cross2"></i> Batalkan Pesanan</a>
				

					<button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	</body>
	</html>