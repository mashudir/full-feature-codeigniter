<script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/Moment.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/dist/js/demo.js')?>"></script>

<!-- download -->
<script type="text/javascript" src="<?= base_url('assets/JSZip-2.5.0/jszip.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/pdfmake-0.1.36/pdfmake.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/pdfmake-0.1.36/vfs_fonts.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/DataTables-1.10.20/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/DataTables-1.10.20/js/dataTables.jqueryui.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/dataTables.buttons.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/buttons.jqueryui.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/buttons.colVis.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/buttons.flash.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/buttons.html5.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Buttons-1.6.1/js/buttons.print.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Responsive-2.2.3/js/dataTables.responsive.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/Responsive-2.2.3/js/responsive.jqueryui.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/selectize/standalone/selectize.min.js')?>"></script>


<script>

	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .insertBefore( '#example_filter' );
	} );

  $(function () {
    $('#table_id').DataTable()
  });

  $('.kegiatan').selectize({
    sortField: 'text'
  });

  $('.output').selectize({
    sortField: 'text'
  });

  $('.kesulitan').selectize({
    sortField: 'text'
  });
</script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });
  $(function() {
    $('#datetimepicker2').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });
  $(function() {
    $('#datetimepicker3').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });
  $(function() {
    $('#datetimepicker4').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });
</script>
<script type="text/javascript">

  function tambahlogbook(){
    if ($("[name='nama_kegiatan']").val()=='') {
      $("#pesan").text('Kegiatan tidak boleh kosong');
    }else if($("[name='keterangan_logbook']").val()==''){
      $("#pesan").text('Keterangan kegiatan tidak boleh kosong');
    }else if($("[name='output_logbook']").val()==''){
      $("#pesan").text('Output kegiatan tidak boleh kosong');
    }else if($("[name='level_kesulitan']").val()==''){
      $("#pesan").text('Level kegiatan tidak boleh kosong');
    }else{
      var kode_pegawai = $("[name='kode_pegawai']").val();
      var nama_pegawai = $("[name='nama_pegawai']").val();
      var kode_unit = $("[name='kode_unit']").val();
      var tanggal_awal = $("[name='tanggal_awal']").val();
      var tanggal_ahir = $("[name='tanggal_ahir']").val();
      var kode_kegiatan = $("[name='nama_kegiatan']").val();
      var nama_kegiatan = $("[name='nama_kegiatan']").text();
      var keterangan_logbook = $("[name='keterangan_logbook']").val();
      var output_logbook = $("[name='output_logbook']").val();
      var level_kesulitan = $("[name='level_kesulitan']").val();

      $('#btn-tambah').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
      $('#btn-tambah').attr('disabled',true);

      $.ajax({
        type:'POST',
        data:'kode_pegawai='+kode_pegawai+'&nama_pegawai='+nama_pegawai+'&kode_unit='+kode_unit+'&tanggal_awal='+tanggal_awal+'&tanggal_ahir='+tanggal_ahir+'&kode_kegiatan='+kode_kegiatan+'&nama_kegiatan='+nama_kegiatan+'&keterangan_logbook='+keterangan_logbook+'&output_logbook='+output_logbook+'&level_kesulitan='+level_kesulitan,
        url:'<?php echo base_url('pegawai/logbook/addlogbook') ?>',
        dataType : 'JSON',
        success : function(hasil){
          if (hasil.status=='success') {
            $("#formadd").modal('hide');

            $("[name='kode_pegawai']").val('');
            $("[name='nama_pegawai']").val('');
            $("[name='kode_unit']").val('');
            $("[name='kode_kegiatan']").val('');
            $("[name='nama_kegiatan']").val('');
            $("[name='keterangan_logbook']").val('');
            $("[name='output_logbook']").val('');
            $("[name='level_kesulitan']").val('');

            if (hasil.status == "success"){
                    window.location.href = hasil.redirect_url;
                  }
          }
        }
      });
    }
  }

  function submit(x){
    if (x=='tambah') {
      $('#btn-tambah').show();
      $('#btn-tambah').attr('disabled',false);
      $('#btn-tambah').html("SIMPAN <i class='fa fa-paper-plane-o'></i>");
      $('#btn-ubah').hide();
      $("#pesan").text('');

      $('[name="tlb_id"]').val("");
      $('[name="tanggal_awal"]').val("<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d H:i:s") ?>");
      $('.kegiatan').data('selectize').setValue("");
      $('[name="keterangan_logbook"]').val("");
      $('[name="tanggal_ahir"]').val("<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d H:i:s") ?>");
      $('[name="output_logbook"]').val("");
      $('.kesulitan').data('selectize').setValue("");
    }else{
      $('#btn-tambah').hide();
      $('#btn-ubah').show();

      $('#btn-ubah').attr('disabled',false);
      $('#btn-ubah').html('UBAH <i class="fa fa-paper-plane-o ml-1"></i>');

      $.ajax({
        type:"POST",
        data:'id='+x,
        url:'<?php echo base_url('pegawai/logbook/getlogbookbyid') ?>',
        dataType:'JSON',
        success: function(data){
          $('[name="tlb_id"]').val(data[0].TLB_ID);
          $('[name="tanggal_awal"]').val(data[0].TLB_TANGGAL);
          $('.kegiatan').data('selectize').setValue(data[0].MST_KEG_LOGB_MKL_KODE);
          $('[name="keterangan_logbook"]').val(data[0].TLB_KETERANGAN_KEGIATAN);
          $('[name="tanggal_ahir"]').val(data[0].TLB_TANGGAL_AKHIR);
          $('.output').data('selectize').setValue(data[0].TLB_OUTPUT);
          $('.kesulitan').data('selectize').setValue(data[0].REF_LVL_KESLTN_RLK_KODE);
        }
      })
    }
  }

  function ubahlogbook(){
    if ($("[name='nama_kegiatan']").val()=='') {
      $("#pesan").text('Kegiatan tidak boleh kosong');
    }else if($("[name='keterangan_logbook']").val()==''){
      $("#pesan").text('Keterangan kegiatan tidak boleh kosong');
    }else if($("[name='output_logbook']").val()==''){
      $("#pesan").text('Output kegiatan tidak boleh kosong');
    }else if($("[name='level_kesulitan']").val()==''){
      $("#pesan").text('Level kegiatan tidak boleh kosong');
    }else{
      var tlb_id = $("[name='tlb_id']").val();
      var kode_pegawai = $("[name='kode_pegawai']").val();
      var nama_pegawai = $("[name='nama_pegawai']").val();
      var kode_unit = $("[name='kode_unit']").val();
      var tanggal_awal = $("[name='tanggal_awal']").val();
      var tanggal_ahir = $("[name='tanggal_ahir']").val();
      var kode_kegiatan = $("[name='nama_kegiatan']").val();
      var nama_kegiatan = $("[name='nama_kegiatan']").text();
      var keterangan_logbook = $("[name='keterangan_logbook']").val();
      var output_logbook = $("[name='output_logbook']").val();
      var level_kesulitan = $("[name='level_kesulitan']").val();

      $('#btn-ubah').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
      $('#btn-ubah').attr('disabled',true);

      $.ajax({
        type:'POST',
        data:'tlb_id='+tlb_id+'&kode_pegawai='+kode_pegawai+'&nama_pegawai='+nama_pegawai+'&kode_unit='+kode_unit+'&tanggal_awal='+tanggal_awal+'&tanggal_ahir='+tanggal_ahir+'&kode_kegiatan='+kode_kegiatan+'&nama_kegiatan='+nama_kegiatan+'&keterangan_logbook='+keterangan_logbook+'&output_logbook='+output_logbook+'&level_kesulitan='+level_kesulitan,
        url:'<?php echo base_url('pegawai/logbook/updatelogbook') ?>',
        dataType : 'JSON',
        success: function(data){
          if (data.status=='success') {
            $("#formadd").modal('hide');

            $("[name='kode_pegawai']").val('');
            $("[name='nama_pegawai']").val('');
            $("[name='kode_unit']").val('');
            $("[name='kode_kegiatan']").val('');
            $("[name='nama_kegiatan']").val('');
            $("[name='keterangan_logbook']").val('');
            $("[name='output_logbook']").val('');
            $("[name='level_kesulitan']").val('');

            if (data.status == "success"){
                    window.location.href = data.redirect_url;
                  }
          }
        }
      });
    }
  }


  function konfirmasiHapus(url){
  $('#btn-delete').attr('href', url);
  $('#deletemodal').modal();
}
</script>

</body>
</html>