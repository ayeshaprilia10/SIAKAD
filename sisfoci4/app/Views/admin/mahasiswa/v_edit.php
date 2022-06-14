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
                echo form_open_multipart('mahasiswa/update/'.$mhs['id_mhs']);
                ?>
                <div class="form-group">
                    <label>NIM</label>
                    <input value="<?= $mhs['nim'] ?>" name="nim" placeholder="NIM" type="text"class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input value="<?= $mhs['nama_mhs'] ?>" name="nama_mhs" placeholder="Nama Mahasiswa" type="text"class="form-control">
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="<?= $mhs['id_prodi'] ?>"><?= $mhs['jenjang']?>-<?= $mhs['prodi']?></option>
                        <?php foreach ($prodi as $key => $value) {?>
                            <option value="<?= $value['id_prodi']?>"><?= $value['jenjang']?>-<?= $value['prodi']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input value="<?= $mhs['password'] ?>" name="password" placeholder="Password" type="text"class="form-control">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('fotomhs/'.$mhs['foto_mhs']) ?>" id="gambar_load" width="200px" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('mahasiswa')?>" class="btn btn-danger pull-left"><i class="fa fa-mail-reply"></i>  Back</a>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <?php 
                echo form_close()
            ?>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>