  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/admin/dashboard') }}" class="brand-link">
          <img src="{{ asset('images/admin_images/ecom.png') }}" style="width:50px;height:50px;">
          <span class="brand-text font-weight-light">E Commerce Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('images/admin_images/' . Auth::guard('admin')->user()->image) }}"
                      class="rounded-circle" style="width:40px;height:40px;">
              </div>
              <div class="info">
                  <a href="{{ url('/admin/dashboard') }}"
                      class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  
                  <li class="nav-item ">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Products
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('/admin/product') }}" class="nav-link">
                                  <i class="fab fa-product-hunt nav-icon"></i>
                                  <p>All Product</p>
                              </a>
                          </li>

                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
