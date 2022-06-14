<h1><?= $title ?></h1>
<br>

<div class="row">
    <div class="col-sm-12">
        <table class="table-striped table-responsive">
            <tr>
                <th rowspan="5"><img src="<?= base_url('fotomhs/'.$mhs['foto_mhs']) ?>" height="150px" width="120px"></th>
                <th width="150px">  NIM</th>
                <th width="20px">:</th>
                <th><?= $mhs['nim'] ?></th>
            </tr>
            <tr>
                <td>  Nama</td>
                <td>:</td>
                <td><?= $mhs['nama_mhs'] ?></td>
            </tr>
            <tr>
                <td>  Fakultas</td>
                <td>:</td>
                <td><?= $mhs['fakultas'] ?></td>
            </tr>
            <tr>
                <td>  Program Studi</td>
                <td>:</td>
                <td><?= $mhs['prodi'] ?></td>
            </tr>
        </table>
    </div>
        <div class="col-sm-12">
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add"> <i class="fa fa-plus"></i>  Kontrak Mata Kuliah</button>
            <a href="<?= base_url('krs/print')?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>  Cetak KRS</a>
            <a href="<?= base_url('krs/printpdf')?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>  Download KRS</a>
        </div>
        <div class="col-sm-12">
            <?php 
                if(session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
            ?>
            <table class="table table-striped table-bordered table-responsive">
                <tr class="label-primary">
                    <th>#</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th></th>
                </tr>
                <?php $no=1; $sks = 0;
                 foreach ($data_kontrak as $key => $value) {
                     $sks = $sks + $value['sks'];
                     ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_matkul']?></td>
                        <td><?= $value['matkul']?></td>
                        <td><?= $value['sks']?></td>
                        <td><?= $value['smt']?></td>
                        <td class="text-center">
                        <button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"> <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php }?>
                
            </table>
            <h4><b>Total SKS : <?= $sks ?></b></h4>
        </div>
</div>

<!-- /.modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Mata Kuliah</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-borderes text-sm" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1;
                        foreach ($kontrak as $key => $value) {?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['kode_matkul'] ?></td>
                            <td><?= $value['matkul'] ?></td>
                            <td><?= $value['sks'] ?></td>
                            <td><?= $value['smt'] ?></td>
                            <td>
                                <a href="<?= base_url('krs/tambah_mk/'.$value['id_matkul']) ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal delete -->
<?php foreach($data_kontrak as $key => $value){ ?>
<div class="modal fade" id="delete<?= $value['id_krs'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Kontrak Mata Kuliah</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus <b><?= $value['matkul'] ?></b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('krs/delete/'.$value['id_krs'])?>" class="btn btn-success">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>