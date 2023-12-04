
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('')?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('')?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('')?>assets/dist/js/app.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('')?>assets/plugins/select2/select2.full.min.js"></script>
<!-- Data Tables -->
<script type="text/javascript" src="<?php echo base_url('')?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('')?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('')?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('')?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('')?>assets/plugins/iCheck/icheck.min.js"></script>     
<!-- Mask Money      -->
<script src="<?php echo base_url('')?>assets/plugins/maskmoney/jquery.maskMoney.min.js"></script>



<script type="text/javascript">
    $(".selected").select2();
    
    $('#datepicker').datepicker({
      autoclose: true,
      dateFormat:'yyyy-mm-dd'
    });

    $('#dataTables').DataTable({
        "scrollX": true
    });
    $("#harga1").maskMoney({thousands:".",decimal:",",precision:0});
    
        //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    
</script>

<script>

$(document).ready(function(){

$("#harga1").keyup(function() {
  var clone = $(this).val();
  var cloned = clone.replace(/[A-Za-z$. ,-]/g, "");
  $("#harga").val(cloned);
});


});
</script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> -->
<script>
$().ready(function(){

  $("#harga").on("keydown",function(){
    // setTimeout($.proxy(function(){
        $("#harga1").text(this.value);
    // },this),10);
  });

  $('#provinsi').change(function(){
    var provinsi = $('#provinsi').val();
      $.ajax({
        type:'GET',
        url:'<?php echo base_url('')?>index.php/karyawan/getkota',
        data:'id='+provinsi,
            success: function(html){
              $('#kota').html(html); 
            }
      });
  });

  $('#kota').change(function(){
      var kota = $('#kota').val();
      $.ajax({
        type:'GET',
        url:'<?php echo base_url('')?>index.php/karyawan/getkecamatan',
        data:'id='+kota,
          success: function(html){
            $('#kecamatan').html(html); 
          }
      });
  });

  $('#kecamatan').change(function(){
      var kecamatan = $('#kecamatan').val();
        $.ajax({
          type:'GET',
          url:'<?php echo base_url('')?>index.php/karyawan/getdesa',
          data:'id='+kecamatan,
                  success: function(html){
              $('#desa').html(html); 
                }
          });
      });

  $('#no_ktp_cash').keyup(function(){
    var no_ktp=$('#no_ktp_cash').val();
    $.ajax({
       type:'GET',
       url:"<?php echo base_url('')?>index.php/pembeli_cash/get_pembeli",
       data:'id='+ no_ktp,
       dataType:"json",
       success: function(data){
        if(data!=null){
          $('#nama_lengkap').val(data.nama);
          $('#alamat').html(data.alamat);
          $('#provinsi').val(data.nama_provinsi);
          $('#kota').val(data.nama_kota);
          $('#kecamatan').val(data.nama_kecamatan);
          $('#desa').val(data.nama_desa);
          $('#no_telp').val(data.telp);
          $('.gambar_ktp').html('<img height="100%" src="<?php echo base_url('')?>assets/img/'+data.file_ktp+'" width="50%">');
        }else{
          $('#nama_lengkap').val("");
          $('#alamat').html("");
          $('#provinsi').val("");
          $('#kota').val("");
          $('#kecamatan').val("");
          $('#desa').val("");
          $('#no_telp').val("");
          $('.gambar_ktp').html('');
        }
       }
    });
  });
  
  $('#kd_motor_search').keyup(function(){
    var kd_motor=$('#kd_motor_search').val();
    $.ajax({
       type:'GET',
       url:"<?php echo base_url('')?>index.php/pembeli_cash/get_motor",
       data:'id='+ kd_motor,
       dataType:"json",
       success: function(data){
          if(data!=null){
            $('#merk_motor').val(data.merk_motor);
            $('#nama_motor').val(data.nama_motor);
            $('#type_motor').val(data.tipe_motor);
            $('#warna').val(data.warna_motor);
            $('#harga').val(data.harga);
            $('.gambar_motor').html('<img height="100%" src="<?php echo base_url('')?>assets/img/'+data.photo+'" width="50%">');
          }else{
            $('#merk_motor').val("");
            $('#nama_motor').val("");
            $('#type_motor').val("");
            $('#warna').val("");
            $('#harga').val("");
            $('.gambar_motor').html('');

          }

        }
    });
  });

  $('#pembayaran').keyup(function(){
      var harga=$('#harga').val();
      var pembayaran=$('#pembayaran').val();
      $('#kembalian').val(pembayaran-harga);
  });


    
});
</script>
</body>
</html>