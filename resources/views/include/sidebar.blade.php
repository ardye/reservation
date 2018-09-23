<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGASI</li>

        @if(!empty($halaman) && $halaman =='dashboard')
          <li class="active">
        @else
          <li>
        @endif
          <a href="{{ url('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        
        @if(!empty($halaman) && $halaman == 'event')
          <li class="active">
        @else
          <li>
        @endif
          <a href=" {{ url('event') }}">
            <i class="fa fa-money"></i> <span>Event</span>
          </a>
        </li>

        @if(!empty($halaman) && $halaman == 'fasilitas')
          <li class="active">
        @else
          <li>
        @endif
          <a href=" {{ url('fasilitas') }}">
            <i class="fa fa-bank"></i> <span>Fasilitas</span>
          </a>
        </li>
        
        @if(!empty($halaman) && $halaman == 'menu')
          <li class="active">
        @else
          <li>
        @endif
          <a href=" {{ url('menu') }}">
            <i class="fa fa-book"></i> <span>Menu</span>
          </a>
        </li>

        @if(!empty($halaman) && $halaman == 'kategori')
          <li class="active">
        @else
          <li>
        @endif
          <a href=" {{ url('kategori') }}">
            <i class="fa fa-clone"></i> <span>Kategori</span>
          </a>
        </li>

        @if(!empty($halaman) && $halaman == 'booked')
          <li class="active">
        @else
          <li>
        @endif
          <a href=" {{ url('booked') }}">
            <i class="fa fa-users"></i> <span>Booking</span>
                        <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>