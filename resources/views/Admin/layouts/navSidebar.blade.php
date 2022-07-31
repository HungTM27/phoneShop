<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">Admin|</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Auth::check())
                <div class="image">
                    <img src="{{ url(Auth()->user()->avatar) }}" class="img-boder">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                </div>
                <div class="info">
                    <a href="{{ route('logout') }}" class="d-block">Đăng Xuất</a>
                </div>
            @endif

        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Admin Panel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Quản lí tài khoản
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('listUser') }}" class="nav-link">
                                        <p>Danh sách tài khoản</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link">
                                        <p>Thêm tài khoản</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản lí danh mục
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('listcates') }}" class="nav-link">
                                        <p>Danh sách danh mục</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link">
                                        <p>Thêm danh mục</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Quản lí Banner
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('listBanner') }}" class="nav-link">
                                        <p>Danh sách Banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link">
                                        <p>Thêm Banner</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-store"></i>
                                <p>
                                    Quản lí sản phẩm
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('listProducts') }}" class="nav-link">
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link">
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Quản lí giỏ hàng
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Danh sách đơn hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
