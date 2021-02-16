<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <title><?= $data->judul;?></title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </div>
      </div>
    </div>
  </nav>
  
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-6">
        <?= form_open_multipart('upload/edit_aksi'); ?>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <input type="hidden" class="form-control" name="id" value="<?= $data->id;?>">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $data->judul;?>">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/upload_gambar/'.$data->gambar);?>" width="120">
                  </div>
                  <div class="col">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                    <input type="hidden" class="form-control" name="gambarLama" value="<?= $data->gambar?>">
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
            <a href="<?= base_url('');?>" class="btn btn-sm btn-danger">Kembali</a>
          </div>
        <?= form_close();?>
      </div>
    </div>
   

    
   
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>