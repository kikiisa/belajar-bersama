<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Tambah</title>
    <style>
        .row {
            margin-top: 50px;
        }

        body
        {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Mahasiswa</h3>
                        <form action="<?= base_url('Home/update') ?>" method="post">
                        <input type="text" hidden name="id" value="<?= $data_edit["id"] ?>" id="">
                            <div class="form-group">
                                <input type="text" required  name="nama" class="form-control" value="<?= $data_edit["nama"]?>" placeholder="Nama">
                                <?= form_error('nama','<small class="text-center text-danger">',"</small>") ?>
                            </div>
                            <div class="form-group">
                                <input type="text" required name="email" class="form-control" value="<?= $data_edit["email"]?>" placeholder="Email">
                                <?= form_error('email','<small class="text-center text-danger">',"</small>") ?>
                            </div>
                            <div class="form-group">
                                <input type="text"  required name="nim" class="form-control" value="<?= $data_edit["nim"]?>" placeholder="Nim">
                                <?= form_error('nim','<small class="text-center text-danger"> !',"</small>") ?>
                            </div>
                            <button class="btn btn-primary mt-4">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>