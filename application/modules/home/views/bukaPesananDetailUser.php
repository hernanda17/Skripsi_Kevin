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
						<?php
						if ( $dataPesanan[ 'status' ] == "0" ) {
							echo "Belum di setujui";
						} else if ( $dataPesanan[ 'status' ] == "1" ) {
							echo "Telah di setujui";
						} else if ( $dataPesanan[ 'status' ] == "2" ) {
							echo "Telah di ambil";
						} else if ( $dataPesanan[ 'status' ] == "3" ){
							echo "Ditolak";
						}
						?>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['UserApproval']?>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Waktu Disetujui:</label>
					<div class="col-lg-10">
						<div class="form-control-plaintext">
							<?php echo @$dataPesanan['timeapproval']?>
						</div>
						<?php if ($dataPesanan['status']=="1"){?>
					</div>
					<div class="text-right">
						<a href="<?php echo base_url();?>index.php/home/prosesPesananConfirmation/<?php echo @$dataPesanan['idPesanan'];?>" class="btn bg-teal-400 btn-icon btn-xs"><h5>Submit</h5></a>
					</div>
					<?php }?>
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
			<div class="table">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th>NO</th>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ( $pesananBarang->num_rows() > 0 ) {
							$i = 1;
							foreach ( $pesananBarang->result() as $row ) {
								?>

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
</div>