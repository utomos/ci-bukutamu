<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h1>Hello, ini tambah data buku tamu!</h1>
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo base_url(); ?>guest" class="btn btn-primary"><span class="glyphicon glyphicon-backward"></span> Kembali Buku Tamu</a>
                </div>
            </div>
            <br/>
            <?php echo validation_errors(); ?>
            <div class="well">
                <form role="form" method="post" action="<?php echo base_url(); ?>guest/add">
                    <div class="form-group">
                        <label>Nama : </label>
                        <input type="text" name="nama_buku" value="<?php echo set_value('nama_buku'); ?>" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan"><?php echo set_value('keterangan'); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Buku Tamu</button>
                </form>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>