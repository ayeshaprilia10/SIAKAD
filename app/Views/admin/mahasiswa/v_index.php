<h1><?= $title ?></h1>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
        <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>
                <div class="box-tools pull-right">
                <a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i>  Add</a>
                </div>
            </div>
            <div class="box-body">
                <?php 
                    if(session()->getFlashdata('pesan')){
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenjang</th>
                            <th>Program Studi</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($mhs as $key => $value) {
                            ?>
                           <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nim']?></td>
                            <td><?= $value['nama_mhs']?></td>
                            <td><?= $value['jenjang']?></td>
                            <td><?= $value['prodi']?></td>
                            <td><?= $value['password']?></td>
                            <td class="text-center"><img src="<?= base_url('fotomhs/'.$value['foto_mhs'])?>" class="img-circle" width="100px" height="100px" alt="User Image"></td>
                            <td class="text-center">
                                <a href="<?= base_url('mahasiswa/edit/'.$value['id_mhs'])?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" data-toggle="modal" data-target="#delete<?= $value['id_mhs'] ?>"></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.modal delete -->
<?php foreach($mhs as $key => $value){ ?>
<div class="modal fade" id="delete<?= $value['id_mhs'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title ?></h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus <b><?= $value['nama_mhs'] ?></b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('mahasiswa/delete/'.$value['id_mhs'])?>" class="btn btn-success">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>