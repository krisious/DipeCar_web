
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
            <label for="int">ID DETAIL TRANSAKSI <?php echo form_error('ID_DETAIL_TRANSAKSI') ?></label>
            <input type="text" class="form-control" name="ID_DETAIL_TRANSAKSI" id="ID_DETAIL_TRANSAKSI" placeholder="ID DETAIL TRANSAKSI" value="<?php echo $ID_DETAIL_TRANSAKSI; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">JUMLAH HARI <?php echo form_error('JUMLAH_HARI') ?></label>
            <input type="text" class="form-control" name="JUMLAH_HARI" id="JUMLAH_HARI" placeholder="JUMLAH HARI" value="<?php echo $JUMLAH_HARI; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">TOTAL DENDA <?php echo form_error('TOTAL_DENDA') ?></label>
            <input type="text" class="form-control" name="TOTAL_DENDA" id="TOTAL_DENDA" placeholder="TOTAL DENDA" value="<?php echo $TOTAL_DENDA; ?>" />
        </div>
	    <input type="hidden" name="ID_DENDA" value="<?php echo $ID_DENDA; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('denda') ?>" class="btn btn-default">Cancel</a>
	</form>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->



