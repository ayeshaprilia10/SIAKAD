
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD | Print KRS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/template/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-file"></i> Kartu Rencana Studi.
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-sm-12">
        <table class="table-striped table-responsive">
            <tr>
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
            <table class="table table-striped table-bordered table-responsive">
                <tr class="label-primary">
                    <th>#</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                </tr>
                <tr class="label-primary">
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
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
                    </tr>
                <?php }?>
                
            </table>
            <h4><b>Total SKS : <?= $sks ?></b></h4>
        </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>