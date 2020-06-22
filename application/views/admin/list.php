<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Daftar Pegawai
    </h1>
      <div class="dropdown pull-right">
        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell"></i>
          <span class="badge"><?php echo count($this->data['belumdinilai']) ?></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <div class="dropdown-header">Pegawai yang belum dinilai</div><br>
          <?php 
            foreach ($this->data['belumdinilai'] as $key):?>
              <a href="<?php echo base_url('scoring/page/'.$key['MPG_KODE']) ?>" class="dropdown-item"><?php echo $key['MPG_NAMA'] ?></a><br><br>
            <?php endforeach ?>
        </div>
      </div>
      <a class="btn btn-info btn-xs pull-right" href="#formadd" onclick="submit('tambah')" data-toggle="modal">
        <i class="fa fa-plus"></i> <span>Tambah Pegawai</span>
      </a>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="display responsive nowrap">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Telpon</th>
                  <th>Jabatan</th>
                  <th>Unit</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->data['pegawai'] as $key => $value): ?>
                <tr>
                  <td><?php echo $value['MPG_NAMA'] ?></td>
                  <td><?php echo $value['MPG_NIP'] ?></td>
                  <td><?php echo $value['MPG_NO_TELP'] ?></td>
                  <td><?php echo $value['REF_JB_FN_NAMA'] ?></td>
                  <td><?php echo $value['MSU_NAMA'] ?></td>
                  <td><img src="<?=base_url()?>./assets/img/<?=$value['MPG_FOTO'];?>" width="30%"></td>
                  <td>
                    <a class="btn btn-xs text-success" href="#formadd" onclick="submit(<?php echo $value['MPG_KODE'] ?>)" data-toggle="modal">
                      <i class="glyphicon glyphicon-edit"></i>Edit
                    </a><br>
                    <a onClick="konfirmasiHapus('<?php echo site_url('admin/deletepegawai/'.$value['MPG_KODE']) ?>')"
                      href="#!" class="btn btn-xs text-danger">
                      <i class="glyphicon glyphicon-trash"></i>Hapus
                    </a><br>
                    <a class="btn btn-xs text-info" href="<?php echo base_url('scoring/page/'.$value['MPG_KODE']) ?>">
                      <i class="glyphicon glyphicon-pencil"></i>Penilaian
                    </a><br>
                    <a class="btn btn-xs text-info" href="<?php echo base_url('admin/logbookpegawai/'.$value['MPG_KODE']) ?>">
                      <i class="glyphicon glyphicon-book"></i>Logbook
                    </a><br>
                    <a class="btn btn-xs text-success" href="<?php echo base_url('ikipegawai/page/'.$value['MPG_KODE']) ?>">
                      <i class="glyphicon glyphicon-list-alt"></i>IKI
                    </a><br>
                    <a class="btn btn-xs text-warning" href="<?php echo base_url('chartpegawai/page/'.$value['MPG_KODE']) ?>">
                      <i class="glyphicon glyphicon-signal"></i>Statistik
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