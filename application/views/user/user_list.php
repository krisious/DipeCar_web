
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">user List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>NIP</th>
        		    <th>USERNAME</th>
		            <th>PHOTO</th>
		            <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($data as $row): ?>
                <tr>
                    <td width="80px"><?php echo $i ?></td>
                    <td><?php echo $row->NIP; ?></td>
                    <td><?php echo $row->USERNAME; ?></td>
                    <td class="text-center"><img src="<?php echo base_url("upload/foto/".$row->PHOTO);?>" width="50px;"></td>
                    <td width="30%" class="text-center"><a href="<?php echo base_url('user/update')."/".$row->NIP ?>"><button class="btn btn-warning">Update</button></a>&nbsp;<a href="<?php echo base_url('user/read')."/".$row->NIP ?>"><button class="btn btn-primary">Detail</button></a>&nbsp;<a href="<?php echo base_url('user/delete')."/".$row->NIP ?>"><button class="btn btn-danger">Hapus</button></a></td>
                </tr>
                <?php $i=1; endforeach ?>
            </tbody>
	    
        </table>
