<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
					<form class="login-form" action="<?php echo base_url();?>index.php/home/openPesananDetailConfirmation" method='post' name='tambahBarang'>
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Pengambilan barang</h5>
								<span class="d-block text-muted">Scan RFID anda</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="RFID" name="idRFID" autocomplete="off" autofocus>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Submit <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
</body>