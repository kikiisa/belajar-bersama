<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Login</title>
    <style>
        .row {
            margin-top: 50px;
        }

        body {
            background-color: lightgray;
        }

        .card{
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('success') ?>
                        <?= $this->session->flashdata('errors') ?>
                        <h3>Login</h3>
                        <hr>
                        <form action="<?= base_url('Login/store') ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" required name="username" id="" class="form-control" placeholder="username">
                            </div>

                            <div class="form-group">
                                <label for="username">Password</label>
                                <input type="password" name="password" id="" class="form-control" placeholder="password">
                            </div>
                            <button class="btn btn-dark" required name="login">Masuk</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>