<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Master Kegiatan Logbook
      <a class="btn btn-info btn-xs pull-right" href="#formaddlb" onclick="submitlb('tambah')" data-toggle="modal">
            <i class="fa fa-plus"></i> <span>Tambah Logbook</span>
          </a>
    </h1>

  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="display responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nama Kegiatan</th>
                  <th>Keterangan</th>
                  <th>Skor</th>
                  <th>Unit</th>
                  <th>Jabatan Fungsional</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->data['masterlogbook'] as $key => $value): ?>
                <tr>
                  <td><?php echo $value['MKL_NAMA'] ?></td>
                  <td><?php echo $value['MKL_KETERANGAN'] ?></td>
                  <td><?php echo $value['MKL_SCORE'] ?></td>
                  <td><?php echo $value['MSU_NAMA'] ?></td>
                  <td><?php echo $value['REF_JB_FN_NAMA'] ?></td>
                  <td>
                    <a class="btn btn-xs text-success" href="#formaddlb" onclick="submitlb(<?php echo $value['MKL_KODE'] ?>)" data-toggle="modal">
                      <i class="glyphicon glyphicon-edit"></i>Edit
                    </a><br>
                    <a onClick="konfirmasiHapus('<?php echo site_url('masterlogbook/deletemasterlogbook/'.$value['MKL_KODE']) ?>')"
                      href="#!" class="btn btn-xs text-danger">
                      <i class="glyphicon glyphicon-trash"></i>Hapus
                    </a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>