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

<script src="<?php echo base_url('assets/adminlte/bower_components/morris.js/morris.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/raphael/raphael.min.js')?>"></script>


<script type="text/javascript">
  $(function () {
    $('#example1').DataTable();
    $('#example3').dataTable();
    $('#example4').DataTable();

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });

  $(function() {
    $('#datetimepicker1').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });

  $(function() {
    $('#sort1').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });

  $(function() {
    $('#sort2').datetimepicker({locale:'id',format : "yyyy/mm/dd h:i:s"});
  });

  $('.agama').selectize({
    sortField: 'text'
  });

  $('.jabatan').selectize({
    sortField: 'text'
  });

  $('.unit').selectize({
    sortField: 'text'
  });

  $('.mstjabatan2').selectize({
    sortField: 'text'
  });

  $('.mstunit2').selectize({
    sortField: 'text'
  });

  $('.mstunit').selectize({
    sortField: 'text'
  });

  $('.mstjabatan').selectize({
    persist:false,
    sortField: 'text'
  });

  $('.kategori').selectize({
    sortField: 'text'
  });
  $('.target').selectize({
    inputType: 'number',
    sortField: 'number'
  });
  $('.bobot').selectize({
    sortField: 'number'
  });
</script>

<script type="text/javascript">
/**
*manipulasi pegawai
*/
  function submit(x){
    if (x=='tambah') {
      $('#btn-tambah').show();
      $('#btn-ubah').hide();
      $('#photo-preview').hide();
      $('#modal-title').html('<b>Tambah Pegawai</b>');

      $("[name='namapegawai']").val('');
      $("[name='alamatpegawai']").val('');
      $('input[name=jeniskelamin]').prop("checked",false);
      $("[name='nomertelepon']").val('');
      $("[name='email']").val('');
      $("[name='tempatlahir']").val('');
      $("[name='tanggallahir']").val('');
      $('.agama').data('selectize').setValue("");
      $('.unit').data('selectize').setValue("");
      $('.jabatan').data('selectize').setValue("");

    }else{
      $('#btn-tambah').hide();
      $('#btn-ubah').show();
      $('#btn-ubah').attr('disabled',false);
      $('#btn-ubah').html('UBAH <i class="fa fa-paper-plane-o ml-1"></i>');
      $('#modal-title').html('<b>Ubah Pegawai</b>');

      $.ajax({
        type:"POST",
        data:'id='+x,
        url:'<?php echo base_url('admin/getpegawaibyid') ?>',
        dataType:'JSON',
        success: function(data){
          var base_url = '<?php echo base_url();?>';
          var jk = data[0].MPG_JK;
          $('[name="idpegawai"]').val(data[0].MPG_KODE);
          $('[name="namapegawai"]').val(data[0].MPG_NAMA);
          $('[name="alamatpegawai"]').val(data[0].MPG_ALAMAT);
          $('input[name=jeniskelamin][value='+data[0].MPG_JK+']').prop("checked",true);
          // $('[name="jeniskelamin"]').val(data[0].MPG_JK).click();
          $('[name="nomertelepon"]').val(data[0].MPG_NO_TELP);
          $('[name="email"]').val(data[0].MPG_EMAIL);
          $('.agama').data('selectize').setValue(data[0].REF_AGAMA_RAG_KODE);
          $('[name="tempatlahir"]').val(data[0].MPG_TMPT_LAHIR);
          $('[name="tanggallahir"]').val(data[0].MPG_TGL_LAHIR);
          $('.unit').data('selectize').setValue(data[0].MSU_KODE);
          $('.jabatan').data('selectize').setValue(data[0].REF_JB_FN_KODE);
          $('#photo-preview').show();
          // $('[name="foto"]').val(data[0].MPG_FOTO);
          if(data[0].MPG_FOTO)
          {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'./assets/img/'+data[0].MPG_FOTO+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="hapusfoto" value="'+data[0].MPG_FOTO+'"/> Hapus foto ketika menyimpan ?'); // remove photo
              }
              else
              {
                // $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
              }
            }
          })
    }
  }

  function cekhuruf(a){
    re = /^[a-zA-Z ]+$/;
    return re.test(a);
  }

  function cekemail(a){
    re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(a);
  }

  function ceknohp(a){
    re = /^[0-9]+$/;
    return re.test(a);
  }

  function tambahpegawai(){
    if ($("[name='namapegawai']").val()=='') {
      $('#nama_alert').text('Field ini tidak boleh kosong');
    }else if(!cekhuruf($("[name='namapegawai']").val())){
      $('#nama_alert').text('Nama harus berupa huruf');
    }else if($("[name='alamatpegawai']").val()==''){
      $('#alamat_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='jeniskelamin']").val()==''){
      $('#jeniskelamin_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='nomertelepon']").val()==''){
      $('#nomortelepon_alert').text('Field ini tidak boleh kosong');
    }else if(!ceknohp($("[name='nomertelepon']").val())){
      $('#nomortelepon_alert').text('Nomor telepon harus angka');
    }else if($("[name='email']").val()==''){
      $('#email_alert').text('Field ini tidak boleh kosong');
    }else if(!cekemail($("[name='email']").val())){
      $('#email_alert').text('Alamat email tidak valid');
    }else if($("[name='agama']").val()==''){
      $('#agama_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='tempatlahir']").val()==''){
      $('#tempatlahir_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='tanggallahir']").val()==''){
      $('#tanggallahir_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='unit']").val()==''){
      $('#unit_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='jabatan']").val()==''){
      $('#jabatan_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='foto']").val()==''){
      $('#foto_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-tambah').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
      $('#btn-tambah').attr('disabled',true);
      var formData = new FormData($('#form')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('admin/addpegawai') ?>',
        dataType : 'JSON',
        success : function(hasil){
          console.log(hasil);
        if (hasil.status=='success') {
          $("#formadd").modal('hide');

          $("[name='namapegawai']").val('');
          $("[name='alamatpegawai']").val('');
          $("[name='jeniskelamin']").val('');
          $("[name='nomertelepon']").val('');
          $("[name='email']").val('');
          $("[name='agama']").val('');
          $("[name='tempatlahir']").val('');
          $("[name='tanggallahir']").val('');
          $("[name='unit']").val('');
          $("[name='jabatan']").val('');
          $("[name='foto']").val('');

          window.location.href = hasil.redirect_url;
        }else if(hasil.inputerror){
          $('#error_msg').text('File lebih 100 kb atau format selain (jpg/png/jpeg)')
        }
      }
    });
    }
  }

    function ubahpegawai(){
    if ($("[name='namapegawai']").val()=='') {
      $('#nama_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='alamatpegawai']").val()==''){
      $('#alamat_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='nomertelepon']").val()==''){
      $('#nomortelepon_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='email']").val()==''){
      $('#email_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='agama']").val()==''){
      $('#agama_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='tempatlahir']").val()==''){
      $('#tempatlahir_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='tanggallahir']").val()==''){
      $('#tanggallahir_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='unit']").val()==''){
      $('#unit_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='jabatan']").val()==''){
      $('#jabatan_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-ubah').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
      $('#btn-ubah').attr('disabled',true);
      var formData = new FormData($('#form')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('admin/updatepegawai') ?>',
        dataType : 'JSON',
        success : function(hasil){
        if (hasil.status=='success') {
          $("#formadd").modal('hide');

          $("[name='namapegawai']").val('');
          $("[name='alamatpegawai']").val('');
          $("[name='jeniskelamin']").val('');
          $("[name='nomertelepon']").val('');
          $("[name='email']").val('');
          $("[name='agama']").val('');
          $("[name='tempatlahir']").val('');
          $("[name='tanggallahir']").val('');
          $("[name='unit']").val('');
          $("[name='jabatan']").val('');
          $("[name='foto']").val('');

          if (hasil.status == "success"){
            window.location.href = hasil.redirect_url;
          }
        }
      }
    });
    }
  }
  
/**
*manipulasi masterlogbook
*/
  function submitlb(x){
    if (x=='tambah') {
      $('#btn-tambahlb').show();
      $('#btn-ubahlb').hide();
      $('#modal-titlelb').html('<b>Tambah Master Kegiatan Logbook</b>');

      $("[name='namakegiatan']").val('');
      $("[name='idlogbook']").val('');
      $("[name='keterangankegiatan']").val('');
      $("[name='score']").val('');
      $('.mstunit').data('selectize').setValue("");
      $('.mstjabatan').data('selectize').setValue("");
    }else{
      $('#btn-tambahlb').hide();
      $('#btn-ubahlb').show();
      $('#btn-ubahlb').attr('disabled',false);
      $('#btn-ubahlb').html('UBAH <i class="fa fa-paper-plane-o ml-1"></i>');
      $('#modal-titlelb').html('<b>Ubah Master Kegiatan Logbook</b>');

      $.ajax({
        type:"POST",
        data:'id='+x,
        url:'<?php echo base_url('masterlogbook/getmasterlogbookbyid') ?>',
        dataType:'JSON',
        success: function(data){
          $('[name="namakegiatan"]').val(data[0].MKL_NAMA);
          $('[name="idlogbook"]').val(data[0].MKL_KODE);
          $('[name="keterangankegiatan"]').val(data[0].MKL_KETERANGAN);
          $('[name="score"]').val(data[0].MKL_SCORE);
          $('.mstunit').data('selectize').setValue(data[0].MSU_KODE);
          $('.mstjabatan').data('selectize').setValue(data[0].REF_JB_FN_KODE);
        }
      })
    }
  }
    function tambahlb(){
    if ($("[name='namakegiatan']").val()=='') {
      $('#namakegiatan_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='keterangankegiatan']").val()==''){
      $('#keterangankegiatan_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='score']").val()==''){
      $('#score_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstunit']").val()==''){
      $('#unit_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstjabatan']").val()==''){
      $('#jabatan_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-tambahlb').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
      $('#btn-tambahlb').attr('disabled',true);
      var formData = new FormData($('#formlb')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('masterlogbook/addmasterlogbook') ?>',
        dataType : 'JSON',
        success : function(hasil){
          console.log(hasil);
          if (hasil.status=='success') {
            $("#formaddlb").modal('hide');

            $("[name='namakegiatan']").val('');
            $("[name='keterangankegiatan']").val('');
            $("[name='score']").val('');
            $("[name='idlogbook']").val('');
            $("[name='mstunit']").val('');
            $("[name='mstjabatan']").val('');

            if (hasil.status == "success"){
              window.location.href = hasil.redirect_url;
            }
          }
        }
      });
    }
  }

    function ubahlb(){
    if ($("[name='namakegiatan']").val()=='') {
      $('#namakegiatan_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='keterangankegiatan']").val()==''){
      $('#keterangankegiatan_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='score']").val()==''){
      $('#score_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstunit']").val()==''){
      $('#unit_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstjabatan']").val()==''){
      $('#jabatan_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-ubahlb').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
      $('#btn-ubahlb').attr('disabled',true);
      var formData = new FormData($('#formlb')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('masterlogbook/updatemasterlogbook') ?>',
        dataType : 'JSON',
        success : function(hasil){
        // console.log(FormData);
        // $("#pesan").html(hasil.pesan);
        if (hasil.status=='success') {
          $("#formaddlb").modal('hide');

          $("[name='namakegiatan']").val('');
          $("[name='idlogbook']").val('');
          $("[name='keterangankegiatan']").val('');
          $("[name='score']").val('');
          $("[name='idlogbook']").val('');
          $("[name='mstunit']").val('');
          $("[name='mstjabatan']").val('');

          if (hasil.status == "success"){
            window.location.href = hasil.redirect_url;
          }
        }
      }
    });
    }
  }
/**
*manipulasi master iki
*/
  function submitiki(x){
    if (x=='tambah') {
      $('#btn-tambahiki').show();
      $('#btn-ubahiki').hide();
      $('#btn-tambahiki').html("<i class='fa fa-paper-plane-o'></i> SIMPAN");
      $('#btn-tambahiki').attr('disabled',false);
      $('#error').text('');
      $('#modal-titleiki').html('<b>Tambah Master Indeks Kinerja</b>');

      $('.kategori').data('selectize').setValue('');
      $("[name='indikator']").val('');
      $("[name='idiki']").val('');
      $("[name='definisi']").val('');
      $('.target').data('selectize').setValue('');
      $('.bobot').data('selectize').setValue('');
      $('.mstunit2').data('selectize').setValue('');
      $('.mstjabatan2').data('selectize').setValue('');
    }else{
      $('#btn-tambahiki').hide();
      $('#btn-ubahiki').show();
      $('#btn-ubahiki').attr('disabled',false);
      $('#btn-ubahiki').html('UBAH <i class="fa fa-paper-plane-o ml-1"></i>');
      $('#error').text('');
      $('#modal-titleiki').html('<b>Ubah Master Indeks Kinerja</b>');

      $.ajax({
        type:"POST",
        data:'id='+x,
        url:'<?php echo base_url('masteriki/getmasterikibyid') ?>',
        dataType:'JSON',
        success: function(data){
          $('.kategori').data('selectize').setValue(data[0].MST_IKI_KATEGORI);
          $("[name='indikator']").val(data[0].MST_IKI_INDIKATOR);
          $("[name='idiki']").val(data[0].MST_IKI_KODE);
          $('#bobot_lama').val(data[0].MST_IKI_BOBOT);
          $("[name='definisi']").val(data[0].MST_IKI_DEFINISI);
          $('.target').data('selectize').setValue(data[0].MST_IKI_TARGET);
          $('.bobot').data('selectize').setValue(data[0].MST_IKI_BOBOT);
          $('.mstunit2').data('selectize').setValue(data[0].MSU_KODE);
          if (data[0].REF_JAB_KODE != null) {
            $('.mstjabatan2').data('selectize').setValue(data[0].REF_JB_FN_KODE);  
          }else{
            $('.mstjabatan2').data('selectize').setValue(null);
          }
          
        }
      })
    }
  }

    function tambahiki(){
    if ($("[name='kategori']").val()=='') {
      $('#kategori_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='indikator']").val()==''){
      $('#indikator_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='definisi']").val()==''){
      $('#definisi_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='target']").val()==''){
      $('#target_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='bobot']").val()==''){
      $('#bobot_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstunit2']").val()==''){
      $('#mstunit2_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-tambahiki').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
      $('#btn-tambahiki').attr('disabled',true);
      var formData = new FormData($('#formiki')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('masteriki/addmasteriki') ?>',
        dataType : 'JSON',
        success : function(hasil){
          console.log(hasil);
          if (hasil.status=='success') {
            $("#formaddiki").modal('hide');

            $('.kategori').data('selectize').setValue("");
            $("[name='indikator']").val('');
            $("[name='idiki']").val('');
            $("[name='definisi']").val('');
            $('.target').data('selectize').setValue("");
            $('.bobot').data('selectize').setValue("");
            $('.mstunit2').data('selectize').setValue("");
            $('.mstjabatan2').data('selectize').setValue("");

            if (hasil.status == "success"){
              window.location.href = hasil.redirect_url;
            }
          }else{
            $('#error').text('Presentase sudah mencukupi, mohon ubah data yang sudah ada');
          }
        }
      });
    }
  }

    function ubahiki(){
    if ($("[name='kategori']").val()=='') {
      $('#kategori_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='indikator']").val()==''){
      $('#indikator_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='definisi']").val()==''){
      $('#definisi_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='target']").val()==''){
      $('#target_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='bobot']").val()==''){
      $('#bobot_alert').text('Field ini tidak boleh kosong');
    }else if($("[name='mstunit2']").val()==''){
      $('#mstunit2_alert').text('Field ini tidak boleh kosong');
    }else{
      $('#btn-ubahiki').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
      $('#btn-ubahiki').attr('disabled',true);
      var formData = new FormData($('#formiki')[0]);

      $.ajax({
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        url:'<?php echo base_url('masteriki/updatemasteriki') ?>',
        dataType : 'JSON',
        success : function(hasil){
        if (hasil.status=="success") {
          $("#formaddiki").modal('hide');

          $('.kategori').data('selectize').setValue('');
          $("[name='indikator']").val('');
          $("[name='idiki']").val('');
          $("[name='definisi']").val('');
          $('.target').data('selectize').setValue('');
          $('.bobot').data('selectize').setValue('');
          $('.mstunit2').data('selectize').setValue('');
          $('.mstjabatan2').data('selectize').setValue('');
          window.location.href = hasil.redirect_url;
        }else if (hasil.status=="error"){
          $('#error').text('Presentase sudah mencukupi, mohon ubah data yang sudah ada');
        }
      }
    });
    }
  }  
/**
*manipulasi penilaian
*/
  function penilaian(){
    $('#btn-penilaian').html("<i class='fa fa-spinner fa-spin'></i> Saving...")
    $('#btn-penilaian').attr('disabled',true)
    var formData = new FormData($('#formpenilaian')[0])

    $.ajax({
      type:'POST',
      data: formData,
      contentType: false,
      processData: false,
      url:'<?php echo base_url('scoring/inputNilai') ?>',
      dataType : 'JSON',
      success : function(hasil){
        // console.log(hasil)
        if (hasil.status=='success') {
          window.alert("Data berhasil diinputkan")
          // window.location.href = hasil.redirect_url;
        }
      }
    })
  }
/**
*konfirmasi hapus
*/
  function konfirmasiHapus(url){
    $('#btn-delete').attr('href', url);
    $('#deletemodal').modal();
  }
</script>
<script>
  $(function () {
    "use strict";
    var line = new Morris.Bar({
      element: 'chart',
      resize: true,
      data: [
      <?php for($i=1 ; $i < count($this->data['lb']); $i++){ ?>
        {
          y: "<?php echo $this->data['lb'][$i]['MONTH'] ?>",
          a: <?php echo intval($this->data['lb'][$i]['SCORE']) ?>,
          b: <?php echo intval($this->data['kual'][$i]['NILAI']) ?>,
          c: <?php echo intval($this->data['peri'][$i]['NILAI']) ?>
        },
      <?php } ?>
      ],
      xkey: 'y',
      ykeys: ['a','b','c'],
      labels: ['Kuantitas','Kualitas', 'Perilaku'],
      lineColors: ['gray','red','green'],
      hideHover: 'auto'
    });
  });
</script>

<script>
  $(function () {
    "use strict";
    var line = new Morris.Bar({
      element: 'allchart',
      resize: true,
      data: [
      <?php for($i=1 ; $i < count($this->data['lb']); $i++){ ?>
        {
          y: "<?php echo $this->data['lb'][$i]['TLB_NAMA_PEGAWAI'] ?>",
          a: <?php echo intval($this->data['lb'][$i]['SCORE']) ?>,
          b: <?php echo intval($this->data['kual'][$i]['NILAI']) ?>,
          c: <?php echo intval($this->data['peri'][$i]['NILAI']) ?>
        },
      <?php } ?>
      ],
      xkey: 'y',
      ykeys: ['a','b','c'],
      labels: ['Kuantitas','Kualitas', 'Perilaku'],
      lineColors: ['gray','red','green'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>