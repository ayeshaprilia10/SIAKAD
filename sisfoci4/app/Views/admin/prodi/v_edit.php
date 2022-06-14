<h1><?= $title ?></h1>
<br>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>
                <div class="box-tools pull-right">
                    
                </div>
            </div>
            <div class="box-body">
            <?php 
            $errors = session()->getFlashdata('errors');
            if(!empty($errors)){?>
                <div role="alert" class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $key => $value) { ?>
                            <li><?= esc($value) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
                <?php
                echo form_open('prodi/update/' . $prodi['id_prodi']);
                ?>

                <div class="form-group">
                    <label>Fakultas</label>
                    <select name="id_fakultas" class="form-control">
                        <option value="<?=$prodi['id_fakultas']?>"><?=$prodi['fakultas']?></option>
                        <?php foreach($fakultas as $key => $value){?>
                            <option value="<?= $value['id_fakultas']?>"><?= $value['fakultas']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Program Studi</label>
                    <input name="kode_prodi" placeholder="Kode Program Studi" type="text"class="form-control" value="<?=$prodi['kode_prodi']?>" readonly>
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi" placeholder="Program Studi" type="text"class="form-control" value="<?=$prodi['prodi']?>">
                </div>
                <div class="form-group">
                    <label>Jenjang</label>
                    <select name="jenjang" class="form-control" value="<?=$prodi['jenjang']?>">
                        <option value=""><?=$prodi['jenjang']?></option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('prodi')?>" class="btn btn-danger pull-left"><i class="fa fa-mail-reply"></i>  Back</a>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <?php 
                echo form_close()
            ?>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>