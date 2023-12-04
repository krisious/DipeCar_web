
<div class="content-wrapper">
        <section class="content-header">
            <h1>Halaman Fasilitas Mobil <small>form data Fasilitas Mobil</small></h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Level</a>
                </li>
                <li class="active">Here</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">Fasilitas Mobil</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                        <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                </div>
                                <div class="col-md-12 text-right">
                <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary"'); ?>
                                </div>                  
                            </div>
                            <br><br>
        <table class='table table-bordered table-striped' id='mytable'>
        <thead>
            <tr>
                <th>No</th>
		<th>USERNAME</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th>NO TELP</th>
		<th>JENIS KELAMIN</th>
		<th>ALAMAT</th>
		<th>PASSWORD</th>
		<th>PHOTO</th>
		<th>ACTIVATED</th>
		<th>CREATED</th>
		<th>GROUP USER</th>
		<th>LAST LOGIN</th>
		<th>LAST UPDATE</th>
		<th>Action</th>
            </tr></thead><tbody><?php
            $start=0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $users->USERNAME ?></td>
			<td><?php echo $users->NAME ?></td>
			<td><?php echo $users->EMAIL ?></td>
			<td><?php echo $users->NO_TELP ?></td>
			<td><?php echo $users->JENIS_KELAMIN ?></td>
			<td><?php echo $users->ALAMAT ?></td>
			<td><?php echo $users->PASSWORD ?></td>
			<td><?php echo $users->PHOTO ?></td>
			<td><?php echo $users->ACTIVATED ?></td>
			<td><?php echo $users->CREATED ?></td>
			<td><?php echo $users->GROUP_USER ?></td>
			<td><?php echo $users->LAST_LOGIN ?></td>
			<td><?php echo $users->LAST_UPDATE ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('users/read/'.$users->ID_USER),'Read'); 
				echo ' | '; 
				echo anchor(site_url('users/update/'.$users->ID_USER),'Update'); 
				echo ' | '; 
				echo anchor(site_url('users/delete/'.$users->ID_USER),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var t = $("#mytable").dataTable({
                    "scrollX": true
                });
            });
        </script>


