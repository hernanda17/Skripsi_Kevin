<?php  $userdata = $this->session->userdata('logged_in');?>

<div class="content">
	
	<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Tambah Admin</h5>
				<div class="heading-elements">
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/SimpanAdmin" method='post' name='SimpanJenis'>
					<fieldset class="content-group">
						<div class="form-group">
							<label class="control-label col-lg-2">User Name : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="username" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Password : </label>
							<div class="col-lg-10">
								<input type="password" class="form-control" name="password" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">ID RFID : </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="id_rfid">
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
				<h5 class="panel-title">Menejemen Admin</h5>
				<div class="heading-elements">
					<ul class="icons-list">
					</ul>
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div>


			<div class="panel panel-flat">
				<div class="table">
					<div class="datatable-header">
						<form class="form" action="<?php echo base_url();?>index.php/home/procesCariAdmin" method='post' name='updateProfile'>

							<div id="DataTables_Table_2_filter" class="dataTables_filter">

								<label><span>Cari:</span> 
									<input type="search" name="cariData" class="" placeholder="Cari data admin..." aria-controls="DataTables_Table_2">
								</label>
							</div>
						</form>
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th style="width: 50px;">ID Admin</th>
									<th style="width: 50px;">Username</th>
									<th style="width: 50px;">ID RFID</th>
									<th class="text-center" style="width: 20px;">
										<i class="icon-arrow-down12"></i>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($Admin->num_rows() > 0) {
							$i = 1;
							foreach ($Admin->result() as $row)	{ ?>

								<tr>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->idUser;?>
										</h6>
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->username;?>
										</h6>
										
									</td>
									<td class="">
										<h6 class="no-margin"></h6>
										<?php echo $row->idRFID;?>
										</h6>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li>
													<a href="<?php echo base_url();?>index.php/home/prosesHapusAdmin/<?php echo $row->idUser;?>">""
												<i class="icon-undo"></i> Hapus Admin</a>
													</li>
													<li>
														<a href="<?php echo base_url();?>index.php/home/openPageAdminDetail/<?php echo $row->idUser;?>">""
												<i class="icon-history"></i> Perbaharui Admin</a>
													

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
		</div>
</div>