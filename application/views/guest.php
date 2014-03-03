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
            <h1>Hello, ini tampil data buku tamu!</h1>
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo base_url(); ?>guest/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Buku Tamu</a>
                </div>
            </div>

            <?php if ($this->session->flashdata('message') != "") { ?>
                <br/>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message') == "") { ?>
                <br/>
            <?php } ?>
            <table class="table table-hover table-bordered">
                <tr class="info">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                <?php if ($show->num_rows > 0) { ?>
                    <?php foreach ($show->result() as $row) { ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->nama_buku; ?></td>
                            <td><?php echo $row->keterangan; ?></td>
                            <td width="10%">
                                <a href="<?php echo base_url(); ?>guest/edit/<?php echo $row->id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="<?php echo base_url(); ?>guest/delete/<?php echo $row->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>                
                    <?php } ?>
                <?php } ?>
                <?php if ($show->num_rows == 0) { ?>
                    <tr>
                        <td class="alert alert-danger" colspan="4" style="border-radius: 0; -moz-border-radius: 0;">Data masih kosong</td>
                    </tr>
                <?php } ?>
            </table>
            <div class="text-center">
                <div class="btn-group" align="center">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>