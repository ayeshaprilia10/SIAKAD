<div class="row">
    <div class="col-md-12">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('fotomhs/'.$mhs['foto_mhs'])?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $mhs['nim'] ?></h3>
                <h3 class="profile-username text-center"><?= $mhs['nama_mhs'] ?></h3>

                <p class="text-muted text-center"><?= $mhs['prodi'] ?></p>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Biodata Mahasiswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-responsive">
                <tr>
                    <th>Fakultas</th>
                    <td>:</td>
                    <td><?= $mhs['fakultas'] ?></td>
                </tr>
            </table>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
</div>