    <body>
        <h2 style="margin-top:0px">Tb_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="PASSWORD">NIP <?php echo form_error('PASSWORD') ?></label>
            <input type="text" class="form-control" name="NIP" id="NIP" placeholder="NIP" value="<?php echo $NIP; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">USERNAME <?php echo form_error('USERNAME') ?></label>
            <input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="USERNAME" value="<?php echo $USERNAME; ?>" />
        </div>
	    <div class="form-group">
            <label for="PASSWORD">PASSWORD <?php echo form_error('PASSWORD') ?></label>
            <input type="text" class="form-control" name="PASSWORD" id="PASSWORD" placeholder="PASSWORD" value="<?php echo $PASSWORD; ?>" />
        </div>
        <div class="form-group">
            <label for="PHOTO">PHOTO</label>
            <input type="file" class="form-control" name="PHOTO" id="PHOTO" placeholder="PHOTO" />
        </div>
	    <input type="hidden" name="TEMP_NIP" value="<?php echo $NIP; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_user') ?>" class="btn btn-default">Cancel</a>
	</form>
