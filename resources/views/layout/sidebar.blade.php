  <div class="main-sidebar">
      <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                  <a href="{{ auth()->user()->role == 'admin' ? '/admin/dashboard' : '/dashboard' }}"
                      class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown ">
                  <a href="/admin/rekap" class="nav-link "><i class="fas fa-list"></i><span>Rekap</span></a>
              </li>

              <li class="nav-item dropdown ">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Data
                          Master</span></a>
                  <ul class="dropdown-menu">
                      <li class="nav-item dropdown ">
                          <a href="/admin/siswa" class="nav-link "><span>Siswa</span></a>
                      </li>
                      <li class="nav-item dropdown ">
                          <a href="/admin/guru" class="nav-link "><span>Guru</span></a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item dropdown ">
                  <a href="/admin/kelas" class="nav-link "><i class="fa fa-chalkboard"></i><span>Kelas</span></a>
              </li>
              <li class="nav-item dropdown ">
                  <a href="/admin/jurusan" class="nav-link "><i class="fa fa-atom"></i><span>Jurusan</span></a>
              </li>

          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="/admin/laporan" class="btn btn-primary btn-lg btn-block btn-icon-split">
                  <i class="fa fa-copy"></i> Laporan
              </a>
          </div>
      </aside>
  </div>
