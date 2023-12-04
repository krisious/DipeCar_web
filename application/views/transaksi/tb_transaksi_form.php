<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Fasilitas Mobil <small>Detail Data</small></h1>
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

                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="int">ID USER <?php echo form_error('ID_USER') ?></label>
                                <input type="text" class="form-control" name="ID_USER" id="ID_USER" placeholder="ID USER" value="<?php echo $ID_USER; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="datetime">TGL ORDER <?php echo form_error('TGL_ORDER') ?></label>
                                <input type="text" class="form-control" name="TGL_ORDER" id="TGL_ORDER" placeholder="TGL ORDER" value="<?php echo $TGL_ORDER; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="decimal">TOTAL PEMBAYARAN <?php echo form_error('TOTAL_PEMBAYARAN') ?></label>
                                <input type="text" class="form-control" name="TOTAL_PEMBAYARAN" id="TOTAL_PEMBAYARAN" placeholder="TOTAL PEMBAYARAN" value="<?php echo $TOTAL_PEMBAYARAN; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="datetime">TGL PEMBAYARAN <?php echo form_error('TGL_PEMBAYARAN') ?></label>
                                <input type="text" class="form-control" name="TGL_PEMBAYARAN" id="TGL_PEMBAYARAN" placeholder="TGL PEMBAYARAN" value="<?php echo $TGL_PEMBAYARAN; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="BUKTI_PEMBAYARAN">BUKTI PEMBAYARAN <?php echo form_error('BUKTI_PEMBAYARAN') ?></label>
                                <textarea class="form-control" rows="3" name="BUKTI_PEMBAYARAN" id="BUKTI_PEMBAYARAN" placeholder="BUKTI PEMBAYARAN"><?php echo $BUKTI_PEMBAYARAN; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS PEMBAYARAN <?php echo form_error('STATUS_PEMBAYARAN') ?></label>
                                <input type="text" class="form-control" name="STATUS_PEMBAYARAN" id="STATUS_PEMBAYARAN" placeholder="STATUS PEMBAYARAN" value="<?php echo $STATUS_PEMBAYARAN; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS TRANSAKSI <?php echo form_error('STATUS_TRANSAKSI') ?></label>
                                <input type="text" class="form-control" name="STATUS_TRANSAKSI" id="STATUS_TRANSAKSI" placeholder="STATUS TRANSAKSI" value="<?php echo $STATUS_TRANSAKSI; ?>" />
                            </div>
                            <input type="hidden" name="KODE_TRANSAKSI" value="<?php echo $KODE_TRANSAKSI; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->