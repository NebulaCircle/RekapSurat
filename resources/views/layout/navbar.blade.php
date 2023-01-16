 @php
     $tahunAjaran = DB::table('tahun_ajaran')->get();
     
     if (!Session::has('tahun_ajaran')) {
         Session::put('tahun_ajaran', Request()->tahun_ajaran);
         $thn = Session::get('tahun_ajaran', Request()->tahun_ajaran);
     } else {
         if (!Request()->tahun_ajaran) {
             $thn = Session::get('tahun_ajaran');
         } else {
             Session::forget('tahun_ajaran');
             Session::put('tahun_ajaran', Request()->tahun_ajaran);
             $thn = Session::get('tahun_ajaran');
         }
     }
     Session::save();
 @endphp
 <div class="navbar-bg"></div>
 <nav class="navbar navbar-expand-lg main-navbar">
     <form class="form-inline mr-auto">
         <ul class="navbar-nav mr-3">
             <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
             <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                         class="fas fa-search"></i></a></li>
         </ul>
         <div class="search-element">
             <select onchange="this.form.submit()" name="tahun_ajaran" id=""
                 class="pr-5 form-control rounded-pill">
                 <option value="" disabled selected>Pilih Tahun Ajaran</option>
                 @foreach ($tahunAjaran as $ta)
                     <option {{ $thn == $ta->tahun_ajaran ? 'selected' : '' }} value="{{ $ta->tahun_ajaran }}">
                         {{ $ta->tahun_ajaran }}
                         {{ $ta->semester }}</option>
                 @endforeach
             </select>
             {{-- <div class="dropdown d-inline">
                 <a class="font-weight-600 bg-white form-control dropdown-toggle" data-toggle="dropdown" href="#"
                     id="orders-month">{{ !$fil ? $montNum[date('m')] : $montNum[$fil] }}</a>
                 <ul class="dropdown-menu dropdown-menu-sm">
                     <li class="dropdown-title">Pilih Tahun Ajaran</li>
                     @foreach ($tahunAjaran as $ta)
                         <li><a href="?tahun_ajaran={{ $ta->tahun_ajaran }}"
                                 class="dropdown-item {{ $thn == $ta->tahun_ajaran ? 'active' : '' }}">
                                 {{ $ta->tahun_ajaran }}
                                 {{ $ta->semester }}</a></li>
                     @endforeach
                 </ul>
             </div> --}}
         </div>
     </form>
     <ul class="navbar-nav navbar-right">
         <li class="dropdown"><a href="#" data-toggle="dropdown"
                 class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                 <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                 <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->nama_lengkap }}</div>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <div class="dropdown-title">Logged in 5 min ago</div>
                 <a href="features-profile.html" class="dropdown-item has-icon">
                     <i class="far fa-user"></i> Profile
                 </a>
                 <a href="features-activities.html" class="dropdown-item has-icon">
                     <i class="fas fa-bolt"></i> Activities
                 </a>
                 <a href="features-settings.html" class="dropdown-item has-icon">
                     <i class="fas fa-cog"></i> Settings
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="/logout" class="dropdown-item has-icon text-danger">
                     <i class="fas fa-sign-out-alt"></i> Logout
                 </a>
             </div>
         </li>
     </ul>
 </nav>
