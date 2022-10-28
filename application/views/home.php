<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title><?= $title ?></title>
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
                        
                        <?= $this->session->flashdata('errors') ?>
                        <div class="notif">
                        
                        </div>
                        <h3>Data Mahasiswa</h3>
                        <a href="<?= base_url('tambah-data') ?>" class="btn btn-success mt-4 mb-1">Tambah Data</a>
                        <a href="<?= base_url('logout') ?>" class="btn btn-danger mt-4 mb-1">Logout</a>
                        <table class="table mt-4 bg-dark text-light">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nim</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                <?php foreach($mahasiswa->result() as $x){ ?>
                                <tr>
                                    <th scope="row"><?= $no+=1 ?></th>
                                    <td><?= $x->nama ?></td>
                                    <td><?= $x->nim ?></td>
                                    <td><?= $x->email ?></td>
                                    <td>
                                        <a href="<?= base_url('hapus/'.$x->id) ?>" class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('edit/' .$x->id) ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        let alert = document.querySelector('#peng');
        let notif = document.querySelector('.notif');
        <?php if($this->session->flashdata('success')){ ?>
            notif.innerHTML = '<div class="alert alert-success">Selamat Datang !</div>'
            setTimeout(() => {
                notif.innerHTML = ''
            },2000)
        <?php } ?>
    </script>
</body>
</html>