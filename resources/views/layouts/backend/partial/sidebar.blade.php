<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::guard('admin')->user()->image ? URL(Auth::guard('admin')->user()->image) : asset('public/backend/upload/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.order') }}" class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Orders
                            <span class="badge badge-danger right">{{ \App\Model\Order::where('is_seen', 0)->count() }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ request()->is('admin/profile/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Manage Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.view.profile') }}" class="nav-link {{ request()->is('admin/profile/view') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.change.password') }}" class="nav-link {{ request()->is('admin/profile/change/password') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.category') }}" class="nav-link {{ request()->is('admin/category/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.subcategory') }}" class="nav-link {{ request()->is('admin/subcategory/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Sub Category
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.product') }}" class="nav-link {{ request()->is('admin/product/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.setmenu') }}" class="nav-link {{ request()->is('admin/setmenu/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-menorah"></i>
                        <p>
                            Set Menu
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.reservation') }}" class="nav-link {{ request()->is('admin/reservation/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-star"></i>
                        <p>
                            Reservation
                            <span class="badge badge-danger right">{{ \App\Model\Reservation::where('is_seen', 0)->count() }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.coupon') }}" class="nav-link {{ request()->is('admin/coupon/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-gift"></i>
                        <p>
                            Coupon
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.slider') }}" class="nav-link {{ request()->is('admin/slider/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.view.logo') }}" class="nav-link {{ request()->is('admin/logo/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-images"></i>
                        <p>
                            Logo & Favicon
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ request()->is('admin/settings/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.show.order.time') }}" class="nav-link {{ request()->is('admin/settings/order-time/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order Time</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.show.payment.setting') }}" class="nav-link {{ request()->is('admin/settings/payment/view') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Setting</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.view.shipping.charges') }}" class="nav-link {{ request()->is('admin/settings/shipping/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipping Charges</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.view.min_max') }}" class="nav-link {{ request()->is('admin/settings/set-amount/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Max & Min Amount</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.view.website_setting') }}" class="nav-link {{ request()->is('admin/settings/website-setting/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Setting</p>
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
