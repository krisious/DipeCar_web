<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Halaman Fasilitas Mobil <small>form data Fasilitas Mobil</small></h1>
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
                            <h3 class="box-title">Detail <?php echo $FASILITAS ?></h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <div class="box-body">
                            <table class="table">
                                <tr><td>FASILITAS</td><td><?php echo $FASILITAS; ?></td></tr>
                                <tr><td>KET FASILITAS</td><td><?php echo $KET_FASILITAS; ?></td></tr>
                                <!-- <tr><td>BIAYA</td><td><?php echo $BIAYA; ?></td></tr> -->
                                <tr><td></td><td><a href="<?php echo site_url('fasilitas') ?>" class="btn btn-default">Cancel</a></td></tr>
                            </table>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
