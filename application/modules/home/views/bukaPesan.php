<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Detail Barang</h5>
			<div class="heading-elements">
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">

			<?php 
			$dataBarang = $barang->result_array()[0];
			?>
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/PerbaharuiBarang" method='post' name='updateProfile'>
				<fieldset class="content-group">
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">ID Barang:</label>
						<div class="col-lg-10">
							<div class="form-control-plaintext">
								<?php echo $dataBarang['idBarang']?>
							<input type="hidden" value="<?php echo $dataBarang['idBarang']?>" name="idBarang">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Nama Barang : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" value="<?php echo $dataBarang['namaBarang']?>" name="namaBarang">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Stok Barang : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" value="<?php echo $dataBarang['stokBarang']?>" name="stokBarang">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Timestamp:</label>
						<div class="col-lg-10">
							<div class="form-control-plaintext">
								<?php echo $dataBarang['timestamp']?>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 col-form-label">User:</label>
						<div class="col-lg-10">
							<div class="form-control-plaintext">
								<?php echo $dataBarang['username']?>
							</div>
						</div>
					</div>

				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>