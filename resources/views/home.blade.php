@extends('layouts.kss')

@section('content')

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>แผงควบคุม</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>ระบบจัดการข้อมูล</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">แบรนด์</a>
            <a class="dropdown-item" href="#">หมวดหมู่</a>
            <a class="dropdown-item" href="#">สินค้า</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">ผู้จัดจำหน่าย</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">ลูกค้า</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>ระบบบิลเคลม</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">เคลมสินค้า</h6>
            <a class="dropdown-item" href="#">เพิ่มรายการเคลมสินค้า</a>
            <div class="dropdown-divider"></div>
			<h6 class="dropdown-header">ผู้จัดจำหน่าย</h6>
            <a class="dropdown-item" href="#">เพิ่มรายการส่งเคลมสินค้า</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">#####</a>
			<a class="dropdown-item" href="#">#####</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>รายงาน</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">แผงควบคุม</a>
            </li>
            <li class="breadcrumb-item active">หน้าหลัก</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-at"></i>
                  </div>
                  <div class="mr-5">BLANK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">รายละเอียด</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-at"></i>
                  </div>
                  <div class="mr-5">BLANK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">รายละเอียด</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-at"></i>
                  </div>
                  <div class="mr-5">BLANK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">รายละเอียด</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-at"></i>
                  </div>
                  <div class="mr-5">BLANK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">รายละเอียด</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection
