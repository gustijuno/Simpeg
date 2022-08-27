<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          @if(Auth::user()->foto == 'null')
          <img src="{{ asset('img/avatar.png')}}" alt="image profile" class="avatar-img rounded-circle">
          @else
          <img src="{{ Storage::url(Auth::user()->foto)}}" alt="image profile" class="avatar-img rounded-circle">
          @endif
        </div>
        <div class="info">
          <a href="" aria-expanded="true">
            <span>
              {{Auth::user()->nama}}
              <span class="user-level">{{Auth::user()->tipe_user}}</span>
            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item @yield('statusdashboard')">
          <a href="{{route('dashboard')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item @yield('statuskaryawan')">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-user-friends"></i>
            <p>Karyawan</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li class="@yield('statusdatakaryawan')">
                <a href="{{ route('Karyawan.index')}}">
                  <span class="sub-item">Data Karyawan</span>
                </a>
              </li>
              <li class="@yield('statusdatakeluarga')">
                <a href="{{route('Keluarga.index')}}">
                  <span class="sub-item">Data Keluarga</span>
                </a>
              </li>
              <li class="@yield('statusdatatraining')">
                <a href="{{route('Training.index')}}">
                  <span class="sub-item">Data Training</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{route('tipePegawai.index')}}">
            <i class="fas fa-user-edit"></i>
            <p>Tipe Pegawai</p>
          </a>
        </li>
        <li class="nav-item @yield('statusjabatan')">
          <a href="{{route('Jabatan.index')}}">
            <i class="fas fa-users"></i>
            <p>Data Jabatan</p>
          </a>
        </li>
        <li class="nav-item @yield('statusorganisasi')">
          <a href="{{route('Organisasi.index')}}">
            <i class="far fa-building"></i>
            <p>Data Organisasi</p>
          </a>
        </li>
        <li class="nav-item @yield('statusnip')">
          <a href="{{route('NIP.index')}}">
            <i class="fas fa-user"></i>
            <p>NIP</p>
          </a>
        </li>
        @if (Auth::user()->tipe_user == 'superadmin')
        <li class="nav-item @yield('statusadmin')">
          <a href="{{route('admin.index')}}">
            <i class="fas fa-user-shield"></i>
            <p>Admin</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>