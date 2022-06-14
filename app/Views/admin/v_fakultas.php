<h1><?= $title ?></h1>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>  Add</button>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Fakultas</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($fakultas as $key => $value) {?>
                           <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['fakultas']?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-pencil" data-toggle="modal" data-target="#edit<?= $value['id_fakultas'] ?>"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" data-toggle="modal" data-target="#delete<?= $value['id_fakultas'] ?>"></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Fakultas</h4>
            </div>
            <div class="modal-body">
                <?php 
                echo form_open('fakultas/add');
                ?>
                <div class="form-group">
                    <label>Fakultas</label>
                    <input type="text" name="fakultas" placeholder="Fakultas" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <?php 
                echo form_close()
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal edit -->
<?php foreach($fakultas as $key => $value){ ?>
<div class="modal fade" id="edit<?= $value['id_fakultas'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fakultas</h4>
            </div>
            <div class="modal-body">
                <?php 
                echo form_open('fakultas/edit/' . $value['id_fakultas']);
                ?>
                <div class="form-group">
                    <label>Fakultas</label>
                    <input value="<?= $value['fakultas'] ?>" type="text" name="fakultas" placeholder="Fakultas" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <?php 
                echo form_close()
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- /.modal delete -->
<?php foreach($fakultas as $key => $value){ ?>
<div class="modal fade" id="delete<?= $value['id_fakultas'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Fakultas</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus fakultas <b><?= $value['fakultas'] ?></b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('fakultas/delete/'.$value['id_fakultas'])?>" class="btn btn-success">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>