<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Detail Admin</h5>
			<div class="heading-elements">
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">

			<?php 
			$dataBarang = $Admin->result_array()[0];
			?>
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/PerbaharuiAdmin" method='post' name='updateProfile'>
				<fieldset class="content-group">
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">ID Admin:</label>
						<div class="col-lg-10">
							<div class="form-control-plaintext">
								<?php echo $dataBarang['idUser']?>
							<input type="hidden" value="<?php echo $dataBarang['idUser']?>" name="idUser">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">username : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" value="<?php echo $dataBarang['username']?>" name="username">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">idRFID : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" value="<?php echo $dataBarang['idRFID']?>" name="idRFID">
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