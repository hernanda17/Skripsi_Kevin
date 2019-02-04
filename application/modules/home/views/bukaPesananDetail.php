<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Detail Pesanan</h5>
			<div class="heading-elements">
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">

			<?php 
			$dataPesanan = $pesananDetail->result_array()[0];
			?>
			<!--Detail Pesanan-->
			<fieldset class="content-group">
				<div class="form-group row">
					<label class="col-lg-2 col-form-label">ID Pesanan:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo $dataPesanan['idPesanan']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label">TimeStamp : </label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo $dataPesanan['timestamp']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-lg-2">Status Pesanan : </label>
					<div class="col-lg-10">
						<?php 
						$status = $dataPesanan[ 'status' ];
						if($status == 0)
							echo "Pesanan belum Disetujui";
						else if ($status == 1)
							echo "Pesanan telah disetujui";
						else if($status == 2)
							echo "Pesanan telah selesai";
						else if($status == 3)
							echo "Pesanan telah dibatalkan";
						?>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo $dataPesanan['username']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Waktu Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo $dataPesanan['timeapproval']?>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	
	
	<div class="panel panel-white">
		<div class="panel-heading">
			<h5 class="panel-title">Detail Barang</h5>
			<div class="heading-elements">
				<ul class="icons-list">
				</ul>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel panel-flat">
			<div class="datatable-header">
						<form class="form" action="<?php echo base_url();?>index.php/home/procesCariBarang" method='post' name='updateProfile'>

							<div id="DataTables_Table_2_filter" class="dataTables_filter">

								<label><span>Cari:</span> 
									<input type="search" name="cariData" class="" placeholder="Cari data barang..." aria-controls="DataTables_Table_2">
								</label>
							</div>
						</form>
				</div>
			<div class="table">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th >NO</th>
							<th >ID Barang</th>
							<th >Nama Barang</th>
						</tr>
					</thead>
					<tbody>
						<?php
						  if ($pesananBarang->num_rows() > 0) {
							$i = 1;
							foreach ($pesananBarang->result() as $row)	{ ?>

						<tr>
							<td>
								<h6 class="no-margin"></h6>
								<?php echo $i ;?>
								</h6>
							</td>
							<td><h6 class="no-margin"></h6>
									<?php echo $row->idBarang;?>
									</h6>
								</td>

							<td>
									<h6 class="no-margin"></h6>
									<?php echo $row->namaBarang;?>
									</h6>
							</td>
						</tr>
						<?php $i++;}
					} ?>
					</tbody>
				</table>
			</div>
	</div>
<!--Detail Barang-->
<div class="text-right">
			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_form_inline">Tambah Barang</i></button>
</div>
	</div>


			<!--Tambah Barang Qty-->
			<div id="modal_form_inline" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Tambah Barang</h5>
							<button type="button" class="close" data-dismiss="modal">×</button>
						</div>	
						<form class="modal-body form-inline justify-content-center" action="<?php echo base_url();?>index.php/home/procesDataBarangPesanan" method='post' name='tambahBarang'>
							<table class="table datatable-select-checkbox dataTable no-footer" id="DataTables_Table_3" role="grid" aria-describedby="DataTables_Table_3_info">
						<thead>
							<tr role="row">
								<th>Checked</th>
								<th>Nama Barang</th>
						</thead>
						<tbody>
								<?php
							foreach ($barang->result() as $row)	{ ?>
						<tr role="row" class="odd">
								<td class=" select-checkbox">
									<div class="form-check form-check-right">
										<label class="form-check-label">
											<div class="uniform-checker">
												<span class="checked">
												<input type="checkbox" name="idBarang[]" value="<?php echo $row->idBarang; ?>" class="form-check-input-styled">
												</span></div>
										</label>
									</div></td>
							
								<td class="sorting_1"><?php echo $row->namaBarang; ?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
							<input type="hidden" value="<?php echo $dataPesanan['idPesanan']; ?>" name="idPesanan">
					
							
							<button type="submit" class="btn bg-primary ml-sm-2 mb-sm-0">Tambah Barang <i class="icon-plus22"></i></button>
						</form>
					</div>
				</div>
			</div>
</div>