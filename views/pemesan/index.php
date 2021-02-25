<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= APP_NAME ?> - <?= $judul ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/node_modules/summernote/dist/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/components.css">
</head>

<body>
  <div id="app">
  
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
	  <?php partial('topbar') ?>
	

      <div class="main-sidebar">
		  <!-- untuk memanggil Navbar -->
	  <?php partial('navbar', $aktif) ?> 
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul ?></h1>
          </div>
				<div class="row">
					<div class="col-sm-4">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
							</div>
							<div class="card-body">
								<form method="POST" action="<?= base_url('pemesan/tambah') ?>" enctype="multipart/form-data">
								  	<div class="form-group">
								  		<label for="nama">Nama Pemesan</label>
								  		<input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								  	</div>

								  	<div class="form-group">
								  		<label for="jenis_kelamin">Jenis Kelamin</label>
								  		<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
								  			<option value="L">Laki laki</option>
								  			<option value="P">Perempuan</option>
								  		</select>
								  	</div>
								  	
									<div class="form-group">
								  		<label for="alamat">Alamat Pemesan</label>
								  		<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="ketik"></textarea>
								  	</div>

								  	<div class="form-group">
								  		<label for="foto">Foto Pemesan</label>
								  		<input type="file" name="foto" id="foto" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
								  		<p class="text-danger">ukuran foto wajib 200px X 200px</p>
								  	</div>
								  	<div class="form-group">
										<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
										<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
								  	</div>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Daftar Pemesan</h6>
							</div>
							<div class="card-body">
								<?php if(checkSession('success')): ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
							  			<?= getSession('success', true) ?>
							  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    			<span aria-hidden="true">&times;</span>
							  			</button>
									</div>
								<?php elseif(checkSession('error')): ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  			<?= getSession('error', true) ?>
							  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    			<span aria-hidden="true">&times;</span>
							  			</button>
									</div>
								<?php endif ?>

								<table class="table table-bordered" id="dataTable" width="" cellspacing="0">
	                  				<thead>
	                    				<tr>
	                    					<th>No</th>
	                    					<th>Nama</th>
	                    					<th>Jenis Kelamin</th>
	                    					<th>Aksi</th>
	                    				</tr>
	                 				</thead>
	                  				<tfoot>
	                    				<tr>
	                    					<th>No</th>
	                    					<th>Nama</th>
	                    					<th>Jenis Kelamin</th>
	                    					<th>Aksi</th>
	                    				</tr>
	                  				</tfoot>
	                 				<tbody>
										<?php while($pemesan = $data_pemesan->fetch_object()) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $pemesan->nama ?></td>
												<td><?= $pemesan->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' ?></td>
												<td>
													<a href="<?= base_url('pemesan/ubah/' . $pemesan->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
													<a href="<?= base_url('pemesan/detail/' . $pemesan->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
	                 								<a href="<?= base_url('pemesan/hapus/' . $pemesan->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
              					</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php partial('footer') ?>
	</div>
	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('stisla') ?>/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url('stisla') ?>/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="<?= base_url('stisla') ?>/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('stisla') ?>/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?= base_url('stisla') ?>/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?= base_url('stisla') ?>/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?= base_url('stisla') ?>/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('stisla') ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url('stisla') ?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('stisla') ?>/assets/js/page/index-0.js"></script>
</body>

</html>
