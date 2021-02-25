<div class="sidebar-brand">
            <a href="">Rental Mobil</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
          </div>
      <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>                
              </li>

              
              <li class="nav-item <?= $data == 'merk' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('merk') ?>"><i class="fas fa-bookmark"></i> <span>Data Merek</span></a>
              </li>
              <li class="nav-item <?= $data == 'mobil' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('mobil') ?>"><i class="fas  fa-car"></i> <span>Data Mobil</span></a>
              </li>                      
              
              <li class="nav-item <?= $data == 'pemesan' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('pemesan') ?>"><i class="fas fa-book"></i> <span>Data Pemesan</span></a>
              </li>
              <li class="nav-item <?= $data == 'jenis_bayar' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('jenis_bayar') ?>"><i class="fas  fa-credit-card"></i> <span>Data Jenis Bayar</span></a>
              </li>             
              
              <li class="nav-item <?= $data == 'perjalanan' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('perjalanan') ?>"><i class="fas  fa-map-signs"></i> <span>Data Perjalanan</span></a>
              </li>
              <li class="nav-item <?= $data == 'pesanan' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('pesanan') ?>"><i class="fas  fa-comment"></i> <span>Data Pesanan</span></a>
              </li>
              

              <li class="menu-header">Pengaturan</li>
              <li class="nav-item <?= $data == 'akun' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('akun') ?>"><i class="fas fa-users"></i> <span>Manajemen Akun</span></a>
              </li>
            </ul>
						