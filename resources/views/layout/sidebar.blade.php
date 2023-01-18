  <div class="main-sidebar">
      <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <a href="{{ auth()->user()->role == 'admin' ? '/admin/dashboard' : 'dashboard' }}"><span
                      class="display-4">📨</span> Sirat</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
              <a href="{{ auth()->user()->role == 'admin' ? '/admin/dashboard' : 'dashboard' }}" class="display-5">📨</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                  <a href="{{ auth()->user()->role == 'admin' ? '/admin/dashboard' : '/dashboard' }}"
                      class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Exports</li>
              <li class="nav-item dropdown ">
                  <a href="#" class="nav-link has-dropdown"><i
                          class="fas fa-file-export"></i><span>Exports</span></a>
                  <ul class="dropdown-menu">
                      <li class="nav-item dropdown ">
                          <a href="/export/siswa" class="nav-link "><span>Export Siswa</span></a>
                      </li>
                      <li class="nav-item dropdown ">
                          <a href="/export/rekap" class="nav-link "><span>Export Rekap</span></a>
                      </li>
                      <li class="nav-item dropdown ">
                          <a href="/export/rekap" class="nav-link "><span>Export Jurusan</span></a>
                      </li>

                  </ul>
              </li>
              <li class="menu-header">Admin</li>

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
                  <a href="/admin/kelas" class="nav-link "><i class="fas fa-chalkboard"></i><span>Kelas</span></a>
              </li>
              <li class="nav-item dropdown ">
                  <a href="/admin/jurusan" class="nav-link "><i class="fas fa-atom"></i><span>Jurusan</span></a>
              </li>
              <li class="nav-item dropdown ">
                  <a href="/admin/tahun_ajaran" class="nav-link "><i class="fas fa-calendar-alt"></i><span>Tahun
                          Ajaran</span></a>
              </li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="/admin/laporan" class="btn btn-primary btn-lg btn-block btn-icon-split">
                  <i class="fa fa-copy"></i> Laporan
              </a>
          </div>
      </aside>
  </div>
