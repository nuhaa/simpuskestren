<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      {{-- <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
       --}}
      <li class="header">MAIN NAVIGATION</li>
      <li class='{{ Request::path() == "admin/dashboard" ? "active" : "" }}' ><a href="{{ route('admin.index') }}"><i class="fa fa-angle-double-right"></i> <span>Dashboard</span></a></li>
      @role('admin' or 'dokter')
      <li class="treeview {{ (Request::is('admin/role/*') or Request::is('admin/role') or Request::is('admin/permission/*')  or Request::is('admin/permission') or Request::is('admin/position/*') or Request::is('admin/position') or Request::is('admin/poly/*') or Request::is('admin/poly') or Request::is('dokter/poly/*') or Request::is('dokter/poly/') or Request::is('admin/medicine/*') or Request::is('admin/medicine') or Request::is('dokter/medicine/*') or Request::is('dokter/medicine') or Request::is('admin/room/*') or Request::is('admin/room') )  ? "menu-open" : "" }}">
          <a href="#">
            <i class="fa fa-angle-double-right"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ (Request::is('admin/role/*') or Request::is('admin/role') or Request::is('admin/permission/*')  or Request::is('admin/permission') or Request::is('admin/position/*') or Request::is('admin/position') or Request::is('admin/poly/*') or Request::is('admin/poly') or Request::is('admin/medicine/*') or Request::is('admin/medicine') or Request::is('admin/room/*') or Request::is('admin/room') )  ? "display:block" : "" }}">
            @role('admin')
            <li><a href="{{ route('role.index') }}"><i class="fa fa-angle-right"></i> Level </a></li>
            {{-- <li><a href="{{ route('permission.index') }}"><i class="fa fa-angle-right"></i> Hak Akses</a></li> --}}
            <li><a href="{{ route('position.index') }}"><i class="fa fa-angle-right"></i> Jabatan</a></li>
            <li><a href="{{ route('room.index') }}"><i class="fa fa-angle-right"></i> Ruang</a></li>
            <li><a href="{{ route('poly.index') }}"><i class="fa fa-angle-right"></i> Poli</a></li>
            <li><a href="{{ route('medicine.index') }}"><i class="fa fa-angle-right"></i> Obat</a></li>
            @endrole
            @role('dokter')
            <li><a href="{{ route('dokter.poly.index') }}"><i class="fa fa-angle-right"></i> Poli</a></li>
            <li><a href="{{ route('dokter.medicine.index') }}"><i class="fa fa-angle-right"></i> Obat</a></li>
            @endrole
          </ul>
        </li>
        @endrole

        @role('admin')
        <li class='{{ Request::path() == "admin/user" ? "active" : "" }}' ><a href="{{ route('user.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Pengguna</span></a></li>
        <li class='{{ Request::path() == "admin/listmedicine" ? "active" : "" }}' ><a href="{{ route('listmedicine.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Obat</span></a></li>
        <li class='{{ Request::path() == "admin/schedule" ? "active" : "" }}' ><a href="{{ route('schedule.index') }}"><i class="fa fa-angle-double-right"></i> <span>Jadwal Dokter</span></a></li>
        <li class='{{ Request::path() == "admin/data-register" ? "active" : "" }}' ><a href="{{ route('data-register.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Pendaftaran</span></a></li>
        @endrole

        @role('dokter')
        <li class='{{ Request::path() == "dokter/listmedicine" ? "active" : "" }}' ><a href="{{ route('dokter.listmedicine.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Obat</span></a></li>
        <li class='{{ Request::path() == "dokter/schedule" ? "active" : "" }}' ><a href="{{ route('dokter.schedule.index') }}"><i class="fa fa-angle-double-right"></i> <span>Jadwal Dokter</span></a></li>
        <li class='{{ Request::path() == "dokter/data-register" ? "active" : "" }}' ><a href="{{ route('dokter.data-register.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Pendaftaran</span></a></li>
        @endrole

        @role('apotek')
        <li class='{{ Request::path() == "apotek/listmedicine" ? "active" : "" }}' ><a href="{{ route('apotek.listmedicine.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Obat</span></a></li>
        <li class='{{ Request::path() == "apotek/data-register" ? "active" : "" }}' ><a href="{{ route('apotek.data-register.index') }}"><i class="fa fa-angle-double-right"></i> <span>Data Pendaftaran</span></a></li>
        @endrole
        {{-- <li class='{{ Request::path() == "admin/medicine-stok" ? "active" : "" }}' ><a href="{{ route('admin.medicine.stok') }}"><i class="fa fa-angle-double-right"></i> <span>Stok Obat</span></a></li> --}}
      {{-- <li class='{{ (Request::is('admin/category/*') or Request::is('admin/category'))  ? "active" : "" }}' ><a href="{{ route('category.index') }}"><i class="fa fa-angle-double-right"></i> <span>Category</span></a></li>
      <li class='{{ (Request::is('admin/product/*') or Request::is('admin/product'))  ? "active" : "" }}' ><a href="{{ route('product.index') }}"><i class="fa fa-angle-double-right"></i> <span>Product</span></a></li> --}}
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
