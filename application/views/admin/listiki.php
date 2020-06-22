<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Master Indeks Kinerja
      <a class="btn btn-info btn-xs pull-right" href="#formaddiki" onclick="submitiki('tambah')" data-toggle="modal">
            <i class="fa fa-plus"></i> <span>Tambah Indeks Kinerja</span>
          </a>
    </h1>

  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example3" class="table table-bordered table-stripped display responsive wrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Indikator</th>
                  <th>Definisi</th>
                  <th>Target</th>
                  <th>Bobot</th>
                  <th>Kategori</th>
                  <th>Jabatan</th>
                  <th>Unit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i=1;
                foreach ($this->data['masteriki'] as $key => $value): ?>
                <tr style="<?php if ($value['MST_IKI_KATEGORI'] == 'kualitas') {?>
                    background: lightgrey;
                <?php }elseif ($value['MST_IKI_KATEGORI'] == 'kuantitas') {?>
                  background: lightblue;
                <?php } ?>">
                  <td>
                    <?php echo $i ?>
                  </td>
                  <td><?php echo $value['MST_IKI_INDIKATOR'] ?></td>
                  <td><?php echo $value['MST_IKI_DEFINISI'] ?></td>
                  <td><?php echo $value['MST_IKI_TARGET'] ?></td>
                  <td><?php echo $value['MST_IKI_BOBOT'] ?></td>
                  <td><?php echo $value['MST_IKI_KATEGORI'] ?></td>
                  <td><?php if ($value['REF_JAB_KODE'] == NULL) {
                    echo "SEMUA JABATAN";
                  }else{
                    echo $value['REF_JB_FN_NAMA'];
                  } ?></td>
                  <td><?php echo $value['MSU_NAMA'] ?></td>
                  <td>
                    <a class="btn btn-xs text-success" href="#formaddiki" onclick="submitiki(<?php echo $value['MST_IKI_KODE'] ?>)" data-toggle="modal">
                      <i class="glyphicon glyphicon-edit"></i>Edit
                    </a><br>
                    <a onClick="konfirmasiHapus('<?php echo site_url('masteriki/deletemasteriki/'.$value['MST_IKI_KODE']) ?>')"
                      href="#!" class="btn btn-xs text-danger">
                      <i class="glyphicon glyphicon-trash"></i>Hapus
                    </a>
                  </td>
                </tr>
                <?php $i++; endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>