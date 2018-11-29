<div class="content">
  <div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">LOGIN</h6>
        <div class="heading-elements">
            <ul class="icons-list">
            </ul>
        </div>
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>
  </div>
  <div class="panel panel-flat">
     <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/process" method='post' name='process'>
                <fieldset class="content-group">
        
                    <div class="form-group">
                        <label class="control-label col-lg-2">Username</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password">
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
 </div>     