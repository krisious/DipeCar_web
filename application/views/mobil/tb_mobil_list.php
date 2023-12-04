<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Halaman Mobil <small>form data mobil</small></h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Level</a>
                </li>
                <li class="active">Here</li>
            </ol>
        </section><!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">Mobil</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                        <div style="margin-top: 4px"  id="message">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                </div>
                                <div class="col-md-12 text-right">
                                        <?php echo anchor(site_url('mobil/create'), 'Create', 'class="btn btn-primary"'); ?>
                                </div>                  
                            </div>
                            <br><br>
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                <th>NAMA MOBIL</th>
                                <th>MERK MOBIL</th>
                                <!-- <th>DESKRIPSI MOBIL</th> -->
                                <th>TAHUN MOBIL</th>
                                <!-- <th>KAPASITAS MOBIL</th> -->
                                <th>HARGA MOBIL</th>
                                <!-- <th>WARNA MOBIL</th> -->
                                <!-- <th>BENSIN MOBIL</th> -->
                                <th>PLAT NO MOBIL</th>
                                <!-- <th>IMAGE</th> -->
                                <th>STATUS SEWA</th>
                                <th>STATUS MOBIL</th>
                                <th>CREATED MOBIL</th>
                                <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php var_dump($data) ?> -->
                                    <?php foreach ($data as $key => $val): ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $val->NAMA_MOBIL; ?></td>
                                            <td><?php echo $val->MERK_MOBIL ?></td>
                                            <!-- <td><?php echo $val->DESKRIPSI_MOBIL ?></td> -->
                                            <td><?php echo $val->TAHUN_MOBIL ?></td>
                                            <!-- <td><?php echo $val->KAPASITAS_MOBIL ?></td> -->
                                            <td>Rp. <?php echo number_format($val->HARGA_MOBIL)?></td>
                                            <!-- <td><?php echo $val->WARNA_MOBIL ?></td> -->
                                            <!-- <td><?php echo $val->BENSIN_MOBIL ?></td> -->
                                            <td><?php echo $val->PLAT_NO_MOBIL ?></td>
                                            <!-- <td><img src="<?php echo base_url('upload/m/'.$val->PHOTO) ?>"></td> -->
                                            <td><?php if ($val->STATUS_SEWA==1) echo "Disewa"; else echo "Tidak Disewa"; ?></td>
                                            <td><?php if ($val->STATUS_MOBIL==1) echo "Aktif"; else echo "Tidak Aktif";  ?></td>
                                            <td><?php echo $val->CREATED_MOBIL ?></td>
                                            <td class="text-center"><a href="<?php echo base_url('mobil/update').'/'.$val->ID_MOBIL ?>">Edit</a>&nbsp;||&nbsp;<a href="<?php echo base_url('mobil/read').'/'.$val->ID_MOBIL ?>">Detail</a>&nbsp;||&nbsp;<a href="<?php echo base_url('mobil/delete').'/'.$val->ID_MOBIL ?>">Delete</a></td>
                                        </tr>    
                                    <?php endforeach ?>
                                    
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
                var t = $("#mytable").dataTable({});
            });
        </script>
