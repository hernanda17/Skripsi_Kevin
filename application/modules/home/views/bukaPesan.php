<div class="content">
  
  <?php if ($pesan->num_rows() > 0){ 
	  foreach ($pesan->result() as $row)
							{
	  ?>
	  
		<div class="panel panel-white">
		  <div class="panel-heading">
			  <h6 class="panel-title"><?php echo $row->judulPesan; ?></h6>
			  <div class="heading-elements">
				  <ul class="icons-list">
				  </ul>
			  </div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		  </div>
		<div class="panel-body">
		<div class="input-group input-group-transparent">
			<div class="input-group-addon"><i class="icon-calendar2 position-left"></i></div>
			<input type="text" class="form-control datepicker hasDatepicker" value="<?php echo $row->timestamp; ?>" id="dp1496207393561">
		</div>
        <p  class=" icon-people"> </p> <?php echo $row->namaAdmin; ?>
        <p  class=" icon-people"> </p><br>
	    <a href="<?php echo $row->file; ?>"> DOWNLOADS </a>
		<p class="content-group-lg">
		<?php echo $row->isiPesan; ?>
		</p>
		
		</div>
    <?php  
		}
  }?>
    </div>