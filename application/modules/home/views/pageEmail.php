<div class="content">
  
  	<div class="panel panel-white">
      <div class="panel-heading">
          <h6 class="panel-title">Menejemen Email</h6>
          <div class="heading-elements">
              <ul class="icons-list">
              </ul>
          </div>
      	<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
          <div class="datatable-header">
            <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label><span>Filter:</span> 
            <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0">
            </label>
          </div>
            <div class="dataTables_length" id="DataTables_Table_0_length">
                <label><span>Show:</span> 
                    <div class="select2-container" id="s2id_autogen51">
                        <a href="javascript:void(0)" class="select2-choice" tabindex="-1">   
                        <span class="select2-chosen" id="select2-chosen-52">25</span>
                        <abbr class="select2-search-choice-close"></abbr>   
                        <span class="select2-arrow" role="presentation">
                        <b role="presentation"></b></span></a>
                        <label for="s2id_autogen52" class="select2-offscreen"></label>
                        <input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-52" id="s2id_autogen52">
                        <div class="select2-drop select2-display-none">   
                            <div class="select2-search select2-search-hidden select2-offscreen">       
                            <label for="s2id_autogen52_search" class="select2-offscreen"></label>       
                            <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-52" id="s2id_autogen52_search" placeholder="">   
                        </div>  
                            <ul class="select2-results" role="listbox" id="select2-results-52"></ul>
                         </div>
                     </div>
                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="select2-offscreen" tabindex="-1" title="">
                         <option value="15">15</option>
                         <option value="25">25</option>
                         <option value="50">50</option>
                         <option value="75">75</option>
                         <option value="100">100</option>
                     </select>
                </label>
            </div>
          </div>
            <div class="datatable-scroll-lg">
                <table class="table tasks-list table-lg dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                  <thead>
                      <tr role="row">
                      <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending" style="width: 20px;">No</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Latest update: activate to sort column ascending" style="width: 15%;">Pengirim</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Task Description: activate to sort column ascending" style="width: 40%;">Pesan</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Latest update: activate to sort column ascending" style="width: 15%;">Tanggal</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 15%;">Status</th>
                      <th class="text-center text-muted sorting_disabled" style="width: 100px;" rowspan="1" colspan="1" aria-label=""><i class="icon-checkmark3"></i></th></tr>
                  </thead>
                  <tbody>
                  <?php 
				  if ($pesan->num_rows() > 0)
					{ $i = 1;
						foreach ($pesan->result() as $row)
        				{
				  ?> 
                            <tr role="row" class="odd">
                              <td class="sorting_1"><?php echo $i; ?></td>   
                              <td class="sorting_1"> <?php echo $row->namaAdmin ;?>
							    </td>                     
                              <td>
                                  <div class="text-semibold"><a href="<?php echo base_url();?>index.php/home/bukaPesan/<?php echo $row->idPesan;?>" ><?php echo $row->judulPesan; ?> </a></div>
                                  <div class="text-muted"><?php 
								  $str = $row->isiPesan;
								  if (strlen($str) > 30)
  									 $str = substr($str, 0, 20) . '...';
								  echo $str; ?> </div>
                              </td>
                              <td>
                                  <div class="input-group input-group-transparent">
                                      <div class="input-group-addon"><i class="icon-calendar2 position-left"></i></div>
                                      <input type="text" class="form-control datepicker hasDatepicker" value=" <?php echo $row->timestamp; ?>" id="dp1496207393561">
                                  </div>
                              </td>
                              <td class="sorting_1">
							  <?php $status = (int)$row->status;
							  if ($status == 0) 
							  {
								  echo "Pesan Belum Dibuka";
							  }else 
							  {
								  echo "Pesan Sudah Terbuka";
							  }
							   ?> </td> 
                              <td class="text-center">
                                  <ul class="icons-list">
                                      <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                          <?php  $session_id = $this->session->userdata('logged_in');
										
										  	  if($session_id["idAdmin"] == $row->idAdmin){ ?>
                                              <li><a href="<?php echo base_url();?>index.php/home/kirimUlang/<?php echo $row->idPesan;?>"><i class="icon-alarm-add"></i> Kirim Ulang</a></li>
                                              <?php } ?>
                                              <li><a href="#"><i class="icon-mail-read"></i> Buka Pesan</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                               </td>
                            </tr> 
                    <?php $i++;}
					}?>
                    
                  </tbody>
                </table>
            </div>
            <div class="datatable-footer">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Tampilkan 1 dari 1 Pesan</div>
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">←</a>
                    <span>
                    <a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a></span>
                    <a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">→</a>
                </div>
            </div>
        </div>
	</div>
  <div class="panel panel-flat">
  	 <div class="panel-heading">
      <h5 class="panel-title">Kirim Email </h5>
      <div class="heading-elements">
          <ul class="icons-list">
          </ul>
      </div>
  	 </div>
 	 <div class="panel-body">
          <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/processKirimPesan" method='post' enctype="multipart/form-data" name="kirimpesan">
              <fieldset class="content-group">
                <div class="form-group">
                      <label class="control-label col-lg-2">Kirim Ke</label>
                      <div class="col-lg-10">
                          <div class="multi-select-full">
                          <?php ?>
                              <select class="multiselect" multiple="multiple" name="email[]" style="display: none;" >
                              
                              <?php 
							  foreach($member->result() as $row){?>
                                  <option value="<?php echo $row->idAdmin.'|'.$row->emailAdmin;?>"><?php echo $row->idAdmin." | ".$row->emailAdmin;?></option>
                                  <?php }?>
                              </select>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-lg-2">Judul Pesan : </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="judulPesan">
                        </div>
                    </div>
                  <div class="form-group">
                      <label class="control-label col-lg-2">Isi Pesan :</label>
                      <div class="col-lg-10">
                          <textarea name="isiPesan" rows="5" cols="5" class="form-control" ></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-lg-2">Upload File :</label>
                      <div class="col-lg-10">
                          <div class="uploader bg-warning"><input type="file" name="userfile" class="file-styled-primary"><span class="filename" style="user-select: none;"></span><span class="action" style="user-select: none;"><i class="icon-plus2"></i></span></div>
                      </div>
                  </div>
              </fieldset>
              <div class="text-right">
                  <button type="submit" class="btn btn-primary">Kirim Pesan <i class="icon-arrow-right14 position-right"></i></button>
              </div>
          </form>
      </div>
  </div>
</div>