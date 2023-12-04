
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
                <?php echo anchor(site_url('denda/create'),'Create', 'class="btn btn-primary"'); ?>
                                </div>                  
                            </div>
                            <br><br>
        <table class='table table-bordered table-striped' id='mytable'>
        <thead>
            <tr>
                <th>No</th>
		<th>ID DETAIL TRANSAKSI</th>
		<th>JUMLAH HARI</th>
		<th>TOTAL DENDA</th>
		<th>Action</th>
            </tr></thead><tbody><?php
            $start=0;
            foreach ($denda_data as $denda)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $denda->ID_DETAIL_TRANSAKSI ?></td>
			<td><?php echo $denda->JUMLAH_HARI ?></td>
			<td><?php echo $denda->TOTAL_DENDA ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('denda/read/'.$denda->ID_DENDA),'Read'); 
				echo ' | '; 
				echo anchor(site_url('denda/update/'.$denda->ID_DENDA),'Update'); 
				echo ' | '; 
				echo anchor(site_url('denda/delete/'.$denda->ID_DENDA),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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


