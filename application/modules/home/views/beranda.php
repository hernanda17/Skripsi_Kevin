<?php  $member = $this->session->userdata('logged_in');?>

<div class="content">
  <div class="row">
      <div class="col-lg-4">
          <div class="panel bg-teal-400">
              <div class="panel-body">
                  <div class="heading-elements">
                       <ul class="icons-list">
                          <li class="dropdown">
                             <i class="icon-user-plus"></i></span>
                          </li>
                      </ul>
                  </div>

                  <h3 class="no-margin"><?php echo $banyakMember->num_rows() ?></h3>
                  Banyak Member
                  <div class="text-muted text-size-small">-</div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

              <div class="container-fluid">
                  <div id="members-online"></div>
              </div>
          </div>
      </div>

      <div class="col-lg-4">
          <div class="panel bg-pink-400">
              <div class="panel-body">
                  <div class="heading-elements">
                      <ul class="icons-list">
                          <li class="dropdown">
                             <i class="icon-cog3"></i>
                          </li>
                      </ul>
                  </div>

                  <h3 class="no-margin"><?php echo $banyakEmail->num_rows() ?></h3>
                  Banyak E-mail
                  <div class="text-muted text-size-small">-</div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

              <div id="server-load">
              </div>
          </div>
          <!-- /current server load -->

      </div>
 
      <div class="col-lg-4">
          <div class="panel bg-blue-400">
          	<div class="panel-body">
                  <div class="heading-elements">
                      <ul class="icons-list">
                          <li class="dropdown">
                             <i class="icon-cog3"></i>
                          </li>
                      </ul>
                  </div>

                  <h3 class="no-margin"></h3>
                  kosong
                  <div class="text-muted text-size-small">-</div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

              <div id="server-load">
              </div>
          </div>
      </div>
  </div>
  
  <div class="panel panel-flat">
      <div class="panel-heading">
          <h5 class="panel-title">Profile Admin</h5>
          <div class="heading-elements">
          </div>
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
<div class="panel-body">
          <form class="form-horizontal"action="<?php echo base_url();?>index.php/home/updateProfile" method='post' name='updateProfile'>
              <fieldset class="content-group">
                  <div class="form-group">
                      <label class="control-label col-lg-2">Nama Admin : </label>
                      <div class="col-lg-10">
                          <input type="text" class="form-control" value="<?php echo $member["namaAdmin"];?>" name="namaAdmin">
                      </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-lg-2">Email Admin : </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $member["emailAdmin"];?>" name="emailAdmin">
                        </div>
                    </div>
                  <div class="form-group">
                      <label class="control-label col-lg-2">Password : </label>
                      <div class="col-lg-10">
                          <input type="password" class="form-control"  placeholder="Password Tidak Dapat Diubah">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-lg-2">Alamat Admin :</label>
                      <div class="col-lg-10">
                          <textarea rows="5" cols="5" class="form-control" name="alamatAdmin"><?php echo $member["alamatAdmin"];?></textarea>
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
</body>
</html>
