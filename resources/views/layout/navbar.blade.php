 @php
     $tahunAjaran = DB::table('tahun_ajaran')
         ->orderBy('tahun_ajaran', 'desc')
         ->get();
     
     if (!Session::has('tahun_ajaran')) {
         Session::put('tahun_ajaran', Request()->tahun_ajaran);
         Session::put('semester', Request()->semester);
         $thn2 = Session::get('tahun_ajaran', Request()->tahun_ajaran);
         $sem = Session::get('semester');
     } else {
         if (!Request()->tahun_ajaran) {
             $thn2 = Session::get('tahun_ajaran');
             $sem = Session::get('semester');
         } else {
             Session::forget('tahun_ajaran');
             Session::put('tahun_ajaran', Request()->tahun_ajaran);
             Session::put('semester', Request()->semester);
             $thn2 = Session::get('tahun_ajaran');
             $sem = Session::get('semester');
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
             {{-- <select onchange="this.form.submit()" name="tahun_ajaran" id=""
                 class="pr-5 form-control rounded-pill">
                 <option value="" disabled selected>Pilih Tahun Ajaran</option>
                 @foreach ($tahunAjaran as $ta)
                     <option {{ $thn2 == $ta->tahun_ajaran ? 'selected' : '' }} value="{{ $ta->tahun_ajaran }}">
                         {{ $ta->tahun_ajaran }}
                         {{ $ta->semester }}</option>
                 @endforeach
             </select> --}}
             <div class="dropdown w-100 d-inline">
                 <a class="font-weight-600 bg-white form-control dropdown-toggle pr-3 text-decoration-none"
                     data-toggle="dropdown" href="#" id="orders-month">Tahun Ajaran
                     {{ $thn2 . ' Semester ' . $sem }}</a>
                 <ul class="dropdown-menu dropdown-menu">
                     <li class="dropdown-title">Pilih Tahun Ajaran</li>
                     @foreach ($tahunAjaran as $ta)
                         <li><a href="?tahun_ajaran={{ $ta->tahun_ajaran }}&semester={{ $ta->semester }}"
                                 class="dropdown-item {{ $thn2 == $ta->tahun_ajaran && $sem === $ta->semester ? 'active' : '' }}">
                                 {{ $ta->tahun_ajaran }}
                                 {{ $ta->semester }}</a></li>
                     @endforeach
                 </ul>
             </div>
         </div>
     </form>
     <ul class="navbar-nav navbar-right">
         <li class="dropdown"><a href="#" data-toggle="dropdown"
                 class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                 <img alt="image" src="{{ asset('template') }}/assets/img/avatar/avatar-1.png"
                     class="rounded-circle mr-1">
                 <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->nama_lengkap }}</div>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <div class="dropdown-title"> {{ auth()->user()->nama_lengkap }}</div>

                 <div class="dropdown-divider"></div>
                 <a href="/logout" class="dropdown-item has-icon text-danger">
                     <i class="fas fa-sign-out-alt"></i> Logout
                 </a>
             </div>
         </li>
     </ul>
 </nav>
