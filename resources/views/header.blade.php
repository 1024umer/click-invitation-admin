s
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"
        description="Click Invitations">
    <title>Click Invitations</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/logoclick.png') }}" />
    {{-- Gallery --}}
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
</head>
<style>
    .for-error {
        color: red;
    }
</style>

<body style="background-color:white">
    <div class="loader"></div>
    <div id="app" style="background-color:white">
        <div class="main-wrapper main-wrapper-1" style="background-color:white">
            <div class="navbar-bg"></div>
            {{-- #5864bd --}}
            <nav class="navbar navbar-expand-lg main-navbar sticky" style="background-color:#5864bd">
                <div class="form-inline mr-auto" style="background-color:#5864bd">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify" style="color: white"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize" style="color: white"></i>
                            </a>
                        </li>
                        <li class="text-center">
                            {{-- <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form> --}}
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i style="color: white"  data-feather="mail"></i>
              <span class="badge headerBadge1">
                1 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="{{asset('assets/img/users/user-1.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" style="color: white" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> 
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('assets/img/userlogo.png') }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Admin</div>
                            {{-- <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> --}}
                            {{-- <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2" style="background-color:white">
                <aside id="sidebar-wrapper" style="background-color:white">
                    <div class="sidebar-brand">
                        <a href="/dashboard"> <img alt="" src="{{ asset('assets/img/logoclick.png') }}"
                                class="header-logo" /> <span class="logo-name"><img
                                    src="{{ asset('assets/img/clicklogomain.png') }}" alt=""></span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Admin Panel</li>
                        <li class="dropdown active">
                            <a href="/dashboard" class="nav-link"><i data-feather="monitor" style="color:#639"></i><span
                                    style="color: black">Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"
                                    style="color:#639"></i><span style="color: black">Accounts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/users">Users</a></li>
                                <li><a class="nav-link" href="/resellers">Reseller</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/coupons" class="nav-link"><i data-feather="codepen" style="color:#639"></i><span
                                    style="color: black">Coupons</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="align-left"
                                    style="color:#639"></i><span style="color: black">Events</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/eventtypes">Event Types</a></li>
                                <li><a class="nav-link" href="/userevents">User Events</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/records" class="nav-link"><i data-feather="bar-chart-2"
                                    style="color:#639"></i><span style="color: black">Invoices</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/promotional" class="nav-link"><i data-feather="bar-chart-2"
                                    style="color:#639"></i><span style="color: black">Promotional</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"
                                    style="color:#639"></i><span style="color: black">Settings</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/prices">Prices</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/sticker" class="nav-link"><i data-feather="bar-chart-2"
                                    style="color:#639"></i><span style="color: black">Stickers</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('card-template-list') }}" class="nav-link"><i
                                    data-feather="bar-chart-2" style="color:#639"></i><span
                                    style="color: black">Templates</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="{{ route('blog.list') }}" class="nav-link"><i class="fas fa-blog"
                                    style="color:#639"></i><span style="color: black">Blogs</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('card.list') }}" class="nav-link"><i class="fa fa-square" style="color:#639"></i><span
                                    style="color: black">Card Uploads</span></a>
                        </li>

                      <li class="dropdown">
                        <button class="nav-link p-3" data-toggle="modal" data-target="#SendEmail"><i class="fa fa-envelope"
                        style="color:#639"></i><span style="color: black">Mail</span></button>
                    </li>
                    </ul>

                </aside>
            </div>

            {{-- Send email modal --}}
<div class="modal fade show" id="SendEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" action="{{ route('send.all.users.mail') }}" id="SendEmailForm">
          <input type="hidden" name="_token" value="">
          <div class="form-row">
            <div class="col-6">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" required="">
            </div>
            <div class="col-6">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" required="">
            </div>
          </div>                                                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{ route('send.all.users.mail') }}" class="btn btn-primary">Send</a>
          </div>
        </form>
      </div>
    </div>
  </div>