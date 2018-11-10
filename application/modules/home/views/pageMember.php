<div class="content">
	<div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title">Menejemen Member</h6>
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
							<th style="width: 50px">ID Member</th>
							<th style="width: 50px;">User</th>
							<th style="width: 50px;">Alamat</th>
							<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($member->num_rows() > 0) {
							$i = 1;
							foreach ($member->result() as $row)	{ ?>

						<tr>
							<td class="text-center">
								<h6 class="no-margin"></h6>
								<?php echo $i ;?>
								</h6>
							</td>
							<td>
								<div class="media-left media-middle">
									<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
                                    <span class="letter-icon"><?php echo $row->namaAdmin[0];?></span>
                                </a>
								
								</div>

								<div class="media-body">
									<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">
										<?php echo $row->namaAdmin;?>
									</a>
									<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span>
										<?php echo $row->emailAdmin;?>
									</div>
								</div>
							</td>
							<td>
								<a href="#" class="text-default display-inline-block">
                                <span class="text-semibold"><?php echo $row->alamatAdmin;?></span>
                            </a>
							
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#"><i class="icon-undo"></i> Hapus Member</a>
											</li>
											<li><a href="#"><i class="icon-history"></i> Edit Member</a>
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
			<h5 class="panel-title">Tambah Member</h5>
			<div class="heading-elements">
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/AddMember" method='post' name='updateProfile'>
				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label col-lg-2">Nama Admin : </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" placeholder="Nama" name="namaAdmin">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Email Admin : </label>
						<div class="col-lg-10">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" type="text" class="form-control" placeholder="Email" name="emailAdmin">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Password : </label>
						<div class="col-lg-10">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Alamat Admin :</label>
						<div class="col-lg-10">
							<textarea rows="5" cols="5" class="form-control" name="alamatAdmin"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Profile Picture : </label>
						<div class="col-lg-10">
							<input type="file" class="form-control">
						</div>
					</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
	</div>