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
                            <h3 class="box-title">Form Mobil</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <div class="box-body">
                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="varchar">NAMA BARANG <?php echo form_error('NAMA_MOBIL') ?></label>
                                <input type="text" class="form-control" name="NAMA_MOBIL" id="NAMA_MOBIL" placeholder="NAMA MOBIL" value="<?php echo $NAMA_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">MERK MOBIL <?php echo form_error('MERK_MOBIL') ?></label>
                                <input type="text" class="form-control" name="MERK_MOBIL" id="MERK_MOBIL" placeholder="MERK MOBIL" value="<?php echo $MERK_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="DESKRIPSI_MOBIL">DESKRIPSI MOBIL <?php echo form_error('DESKRIPSI_MOBIL') ?></label>
                                <textarea class="form-control" rows="3" name="DESKRIPSI_MOBIL" id="DESKRIPSI_MOBIL" placeholder="DESKRIPSI MOBIL"><?php echo $DESKRIPSI_MOBIL; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">TAHUN MOBIL <?php echo form_error('TAHUN_MOBIL') ?></label>
                                <input type="number" class="form-control" name="TAHUN_MOBIL" id="TAHUN_MOBIL" placeholder="TAHUN MOBIL" value="<?php echo $TAHUN_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">KAPASITAS MOBIL <?php echo form_error('KAPASITAS_MOBIL') ?></label>
                                <input type="number" class="form-control" name="KAPASITAS_MOBIL" id="KAPASITAS_MOBIL" placeholder="KAPASITAS MOBIL" value="<?php echo $KAPASITAS_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="decimal">HARGA MOBIL <?php echo form_error('HARGA_MOBIL') ?></label>
                                <input type="number" class="form-control" name="HARGA_MOBIL" id="HARGA_MOBIL" placeholder="HARGA MOBIL" value="<?php echo $HARGA_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">WARNA MOBIL <?php echo form_error('WARNA_MOBIL') ?></label>
                                <input type="text" class="form-control" name="WARNA_MOBIL" id="WARNA_MOBIL" placeholder="WARNA MOBIL" value="<?php echo $WARNA_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">BENSIN MOBIL <?php echo form_error('BENSIN_MOBIL') ?></label>
                                <select class="form-control" name="BENSIN_MOBIL" id="BENSIN_MOBIL">
                                    <option value="1" <?php if ($BENSIN_MOBIL==1) echo "selected" ?> >Premium</option>
                                    <option value="2" <?php if ($BENSIN_MOBIL==2) echo "selected" ?> >Pertalite</option>
                                    <option value="3" <?php if ($BENSIN_MOBIL==3) echo "selected" ?> >Pertamax</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">PLAT NO MOBIL <?php echo form_error('PLAT_NO_MOBIL') ?></label>
                                <input type="text" class="form-control" name="PLAT_NO_MOBIL" id="PLAT_NO_MOBIL" placeholder="PLAT NO MOBIL" value="<?php echo $PLAT_NO_MOBIL; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS SEWA <?php echo form_error('STATUS_SEWA') ?></label>
                                <select class="form-control" name="STATUS_SEWA" id="STATUS_SEWA">
                                    <option value="0" <?php if ($STATUS_SEWA==0) echo "selected" ?> >Tidak Disewa</option>
                                    <option value="1" <?php if ($STATUS_SEWA==1) echo "selected" ?> >Disewa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS MOBIL <?php echo form_error('STATUS_MOBIL') ?></label>
                                <select class="form-control" name="STATUS_MOBIL" id="STATUS_MOBIL">
                                    <option value="0" <?php if ($STATUS_MOBIL==0) echo "selected" ?> >Tidak Aktif</option>
                                    <option value="1" <?php if ($STATUS_MOBIL==1) echo "selected" ?> >Aktif</option>
                                </select> 
                            </div>
                            
                            <div class="form-group">
                                <label for="int">IMAGE MOBIL</label>
                                <input class="form-control" type="file" name="PHOTO" id="PHOTO">
                            </div>
                            
                            <div class="form-group">
                                <label for="int">Fasilitas</label><br>
                                <?php foreach ($fasilitas as $row): ?>
                                    <input type="checkbox" name="FASILITAS[]" value="<?php echo $row->ID_FASILITAS ?>" <?php echo $fasilitas_mobil[$row->ID_FASILITAS]; ?>> <?php echo $row->FASILITAS ?>&nbsp;                                
                                <?php endforeach ?>
                            </div>

                            <input type="hidden" name="ID_MOBIL" value="<?php echo $ID_MOBIL; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('mobil') ?>" class="btn btn-default">Cancel</a>
                        </form>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


