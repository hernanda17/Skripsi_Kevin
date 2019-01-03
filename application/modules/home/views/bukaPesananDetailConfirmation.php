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
			$dataPesanan = @$pesananDetail->result_array()[0];
			?>
			<!--Detail Pesanan-->
			<fieldset class="content-group">
				<div class="form-group row">
					<label class="col-lg-2 col-form-label">ID Pesanan:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['idPesanan']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label">TimeStamp : </label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['timestamp']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-lg-2">Status Pesanan : </label>
					<div class="col-lg-10">
						<?php echo @$dataPesanan['status']?>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['username']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Waktu Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['timeapproval']?>
						</div>
					</div>
				</div>
				<?php $idpes =  $dataPesanan['idPesanan']?>
				<form name="kofirmasi" action="<?php echo base_url();?>index.php/home/processKonfirmasiPesanan/<?php echo $idpes?>" method='post'>
							
				<button type="submit" class="btn btn-light"><i class="icon-checkmark4"></i> Konfirmasi Pesanan</button>
				</form>
				<form name="batal" action="<?php echo base_url();?>index.php/home/processBatalPesanan/ <?php echo $idpes?>" method='post'>
				
					<button type="submit" class="btn btn-light"><i class="icon-cross2"></i> Batalkan Pesanan</button>
				</form>
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
			<div class="table">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th >NO</th>
							<th >ID Barang</th>
							<th >Nama Barang</th>
							<th >Quantity</th>
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
							<td>
									<?php echo $row->qty;?>
							</td>
						</tr>
						<?php $i++;}
					} ?>
					</tbody>
				</table>
			</div>
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
							<label>ID Barang:</label>
								<select name="idBarang" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" data-fouc="" tabindex="-1" aria-hidden="true">
									<?php
							foreach ($barang->result() as $row)	{ ?>	
									
									<option value="<?php echo $row->idBarang; ?>"><?php echo $row->namaBarang; ?></option>
									<?php }?>
								</select>
							<input type="hidden" value="<?php echo $dataPesanan['idPesanan']; ?>" name="idPesanan">
					
							<label class="ml-sm-2">Quantity:</label>
							<input type="text" placeholder="Quantity" name="qty" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">

							<button type="submit" class="btn bg-primary ml-sm-2 mb-sm-0">Tambah Barang <i class="icon-plus22"></i></button>
						</form>
					</div>
				</div>
			</div>
</div>