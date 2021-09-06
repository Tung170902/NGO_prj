<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> NGO ADMIN - @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="{{'/admin/assets/css/vendor.min.css'}}" rel="stylesheet" />
    <link href="{{'/admin/assets/css/app.min.css'}}" rel="stylesheet" />
</head>

<body>
    <div id="app" class="app">
        <div id="header" class="app-header">
            <div class="mobile-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <div class="brand">
                <div class="desktop-toggler">
                    <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
                <a href="/dashboard" class="brand-logo" style="padding: 0;">
                    <img src="{{'/assets/images/logo.jpg'}}" alt="" />
                </a>
            </div>
            <div class="menu">
                <form class="menu-search" method="POST" name="header_search_form">
                    <div class="menu-search-icon"><i class="fa fa-search"></i></div>
                    <div class="menu-search-input">
                        <input type="text" class="form-control" placeholder="Search user..." />
                    </div>
                </form>
                <div class="menu-item dropdown">
                    <div class="dropdown-menu dropdown-menu-end dropdown-notification">
                        <h6 class="dropdown-header text-gray-900 mb-1">Notifications</h6>
                        <a href="#" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <i class="fa fa-receipt fa-lg fa-fw text-success"></i>
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">Your store has a new order for 2 items totaling $1,299.00</div>
                                <div class="time">just now</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <i class="far fa-user-circle fa-lg fa-fw text-muted"></i>
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">3 new customer account is created</div>
                                <div class="time">2 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <img src="assets/img/icon/android.svg" alt="" width="26" />
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">Your android application has been approved</div>
                                <div class="time">5 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <img src="assets/img/icon/paypal.svg" alt="" width="26" />
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">Paypal payment method has been enabled for your store</div>
                                <div class="time">10 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <div class="p-2 text-center mb-n1">
                            <a href="#" class="text-gray-800 text-decoration-none">See all</a>
                        </div>
                    </div>
                </div>
                <div class="menu-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-img online">
                            <img src="{{'/admin/assets/img/admin.png'}}" alt="" class="mw-100 mh-100 rounded-circle" />
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3">
                        <a class="dropdown-item d-flex align-items-center" href="#">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-gray-400 fs-16px"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Inbox <i class="fa fa-envelope fa-fw ms-auto text-gray-400 fs-16px"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-gray-400 fs-16px"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Setting <i class="fa fa-wrench fa-fw ms-auto text-gray-400 fs-16px"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('signout') }}">Log Out <i class="fa fa-toggle-off fa-fw ms-auto text-gray-400 fs-16px"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <div id="sidebar" class="app-sidebar">

            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

                <div class="menu">
                    <div class="menu-header">Navigation</div>
                    <div class="menu-item active">
                        <a href="/dashboard" class="menu-link">
                            <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="/admin/contact" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="menu-text">Contact</span>
                        </a>
                    </div>
                    <div class="menu-divider"></div>
                    <div class="menu-header">Components</div>

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="fa fa-heart"></i></span>
                            <span class="menu-text">Campaign</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="/admin/campaign" class="menu-link">
                                    <span class="menu-text">List Campaign</span>
                                </a>
                                <a href="#" class="menu-link">
                                    <span class="menu-text">Donate</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-lg fa-fw fa-book" style="font-size: 16px;"></i>
                            </span>
                            <span class="menu-text">Blog</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="/admin/blog/category" class="menu-link">
                                    <span class="menu-text">Category</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/admin/blog/post" class="menu-link">
                                    <span class="menu-text">Post</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item ">
                        <a href="/admin/user" class="menu-link">
                            <span class="menu-icon"><i class="fa fa-table"></i></span>
                            <span class="menu-text">Users</span>
                        </a>
                    </div>
                    <div class="menu-divider"></div>
                    <div class="menu-header">Users</div>
                    <div class="menu-item">
                        <a href="/admin/profile" class="menu-link">
                            <span class="menu-icon"><i class="fa fa-user-circle"></i></span>
                            <span class="menu-text">Profile</span>
                        </a>
                    </div>
                </div>

            </div>


            <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>

        </div>
        <div id="content" class="app-content">
            @yield('content')
        </div>
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    </div>
    <script src="{{'/admin/assets/js/vendor.min.js'}}"></script>
    <script src="{{'/admin/assets/js/app.min.js'}}"></script>
    <script src="{{'/admin/assets/plugins/apexcharts/dist/apexcharts.min.js'}}"></script>
    <script src="{{'/admin/assets/js/demo/dashboard.demo.js'}}"></script>
    @yield('script')
</body>

</html>