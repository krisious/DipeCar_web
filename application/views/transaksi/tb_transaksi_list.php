<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Pesanan Mobil <small>form data Pesanan Mobil</small></h1>
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
                        <h3 class="box-title">Pesanan Mobil</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div style="margin-top: 4px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <table class='table table-bordered table-striped' id='mytable'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID USER</th>
                                    <th>TGL ORDER</th>
                                    <th>TOTAL PEMBAYARAN</th>
                                    <th>TGL PEMBAYARAN</th>
                                    <th>BUKTI PEMBAYARAN</th>
                                    <th>STATUS PEMBAYARAN</th>
                                    <th>STATUS TRANSAKSI</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                    $start = 0;
                                    foreach ($transaksi_data as $transaksi) {
                                    ?>
                                    <tr>
                                        <td width="80px"><?php echo ++$start ?></td>
                                        <td><?php echo $transaksi->ID_USER ?></td>
                                        <td><?php echo $transaksi->TGL_ORDER ?></td>
                                        <td>Rp. <?php echo number_format($transaksi->TOTAL_PEMBAYARAN) ?></td>
                                        <td><?php echo $transaksi->TGL_PEMBAYARAN ?></td>
                                        <td><?php echo $transaksi->BUKTI_PEMBAYARAN ?></td>
                                        <td><?php echo $transaksi->STATUS_PEMBAYARAN ?></td>
                                        <td><?php echo $transaksi->STATUS_TRANSAKSI ?></td>
                                        <td style="text-align:center" width="200px">
                                            <?php
                                            echo anchor(site_url('transaksi/read/' . $transaksi->KODE_TRANSAKSI), 'Detail');
                                            // echo ' | '; 
                                            // echo anchor(site_url('transaksi/update/'.$transaksi->KODE_TRANSAKSI),'Confirm'); 
                                            // echo ' | '; 
                                            // echo anchor(site_url('transaksi/delete/'.$transaksi->KODE_TRANSAKSI),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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