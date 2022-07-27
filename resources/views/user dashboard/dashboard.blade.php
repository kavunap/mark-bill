<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Tonny Jack">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium SMM services provider">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('front/img/favicon/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config('app.name') }} | User Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('user dashboard/assets/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('user dashboard/assets/css/theme.css?ver=2.2.0') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/img/favicon/favicon.png') }}">
    <link rel="manifest" href="front/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#Bills bell Invoicing solution">
    <meta name="msapplication-TileImage" content="{{ asset('front/img/favicon/favicon.png') }}">
    <meta name="theme-color" content="Bills bell perfect invoicing solution for companies and individuals">
@livewireStyles
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="/" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" alt="Billsbell" srcset="{{ asset('images/logo.png') }}" alt="Billsbell" style="width:100px;border-radius: 5%;">
                            <img class="logo-dark logo-img" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo.png') }}" alt="logo-dark1" style="width:100px;border-radius: 5%;">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="/" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>

                <!-- .nk-sidebar-element -->
                                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>

                            <ul class="nk-menu">

                                <li class="nk-menu-item">
                                    <a href="/dashboard" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">My Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                {{-- <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Income</span>
                                    </a>
                                    <ul class="nk-menu-sub">

                                        <a href="{{ route('invoices.index') }}" class="nk-menu-link"><span class="nk-menu-text">All</span></a>
                                       @foreach ($documentTypes as $documentType)
                                       <li class="nk-menu-item">
                                        <a href="{{ route('invoices.show', $documentType->id) }}" class="nk-menu-link"><span class="nk-menu-text">{{ $documentType->document }}</span></a>
                                    </li>
                                       @endforeach
                                    </ul><!-- .nk-menu-sub -->
                                </li> --}}

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Manage</span>
                                    </a>
                                    <ul class="nk-menu-sub">

                                        @if(Auth::user()->user_role=='admin' || Auth::user()->user_role=='super_admin') <a href="{{ route('schools.index') }}" class="nk-menu-link"><span class="nk-menu-text">All schools</span></a>@endif
                                        <a href="{{ route('dashboard.index') }}" class="nk-menu-link"><span class="nk-menu-text">All users</span></a>
                                        <a href="{{ route('student.list') }}" class="nk-menu-link"><span class="nk-menu-text">All students</span></a>
                                        {{-- <a href="{{ route('invoice.pending') }}" class="nk-menu-link"><span class="nk-menu-text">Pending invoices</span></a>
                                        <a href="{{ route('invoice.ongoing') }}" class="nk-menu-link"><span class="nk-menu-text">Ongoing invoices</span></a>
                                        <a href="{{ route('invoice.paid') }}" class="nk-menu-link"><span class="nk-menu-text">Paid invoices</span></a>
                                        <a href="{{ route('new-invoice') }}" class="nk-menu-link"><span class="nk-menu-text">Create invoice</span></a> --}}
                                        
                                       {{-- @foreach ($documentTypes as $documentType)
                                       <li class="nk-menu-item">
                                        <a href="{{ route('invoices.show', $documentType->id) }}" class="nk-menu-link"><span class="nk-menu-text">{{ $documentType->document }}</span></a>
                                    </li>
                                       @endforeach --}}
                                    </ul><!-- .nk-menu-sub -->
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('classrooms.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                        <span class="nk-menu-text">Classes</span>
                                    </a>
                                </li>

                                {{-- <li class="nk-menu-item">
                                    <a href="{{ route('proposals.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Proposals</span>
                                    </a>
                                </li> --}}


                                {{-- <li class="nk-menu-item">
                                    <a href="{{ route('customer.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                        <span class="nk-menu-text">Clients</span>
                                    </a>
                                </li> --}}
                                
                                
                                {{-- @if (Auth::user() && Auth::user()->user_role !="user")
                                    <li class="nk-menu-item">
                                        <a href="{{ route('users') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                            <span class="nk-menu-text">Users</span>
                                        </a>
                                    </li> 
                                @endif --}}
                                
                                {{-- <li class="nk-menu-item">
                                    <a href="{{ route('product.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                </li> --}}
                                

                                {{-- @if (Auth::user() && Auth::user()->user_role=="super_admin")
                                <li class="nk-menu-item">
                                    <a href="{{ route('messages.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                        <span class="nk-menu-text">Messages</span>
                                    </a>
                                </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('pricings.index')}}" class="nk-menu-link"><span class="nk-menu-text">Pricings</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('features.index')}}" class="nk-menu-link"><span class="nk-menu-text">Features</span></a>
                                    </li>
                                    
                                @endif --}}
                                {{-- <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Reports</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Charts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Reports list</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li> --}}


                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Settings</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    
                                    <ul class="nk-menu-sub">
                                        
                                        <li class="nk-menu-item">
                                            <a href="{{route('users.edit',Auth::user()->id)}}" class="nk-menu-link"><span class="nk-menu-text">Account</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li>
                               <!-- .nk-menu-item -->
                                {{-- <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Settings</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Configuration</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Print Settings</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Documents Numbering</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Invoice Sending</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Invoice Templates</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Integration</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Show All Options</span>
                                    </a>
                                </li> --}}

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->

            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="/" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="/" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('images/logo2.png') }}" srcset="{{ asset('images/logo2.png 2x') }}" alt="logo">
                                <img class="logo-dark logo-img" src="{{ asset('images/logo2.png') }}" srcset="{{ asset('images/logo2.png 2x') }}" alt="logo-dark1">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                            <p>Simple And Affordable student reports generator</p>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                     <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <button class="btn btn-outline-primary"><span><em class="icon ni ni-plus"></em> Create</span></button>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-s1">
                                           
                                            <div class="dropdown-body">
                                                <div class="nk-notification">

                                                   <a href="{{ route('schools.create') }}">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="bg-primary-dim icon ni ni-file-docs"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="">School</div>
                                                        </div>
                                                    </div></a> 

                                                    {{-- <a href="{{ route('proposals.create') }}">
                                                        <div class="nk-notification-item dropdown-inner">
                                                            <div class="nk-notification-icon">
                                                                <em class="bg-primary-dim icon ni ni-file-docs"></em>
                                                            </div>
                                                            <div class="nk-notification-content">
                                                                <div class="nk-notification-text">Proposal</div>
                                                            </div>
                                                        </div>
                                                    </a> --}}


                                                </div><!-- .nk-notification -->
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    @auth
                                                     @if (Auth::user()->avatar)
                                                     <img src="{{ asset('profiles/'.Auth::user()->profile) }}" style="width:100px; height:auto" alt="">
                                                     @else
                                                     <em class="icon ni ni-user-alt"></em>
                                                     @endif
                                                     @else
                                                     <em class="icon ni ni-user-alt"></em>
                                                    @endauth

                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span><img src="{{ asset('profiles/'.Auth::user()->profile) }}" alt=""></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    @if(Auth::user()->user_role =="super_admin")
                                                        <li><a href="{{route('users.create')}}"><em class="icon ni ni-user-alt"></em><span>Add user</span></a></li>
                                                    @endif
                                                    <li><a href="{{ route('users.edit',Auth::user()->id) }}"><em class="icon ni ni-setting-alt"></em><span>Setting</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>{{ __('Sign out') }}</span></a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">

                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>


                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                 <!-- content @s -->
                 <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                @yield('content')
            </div>
        </div>
    </div>
    <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; {{date('Y')}} Marks Bill
                            </div>

                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="/">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @livewireScripts
    <script src="{{ asset('user dashboard/assets/js/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('user dashboard/assets/js/scripts.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('user dashboard/assets/js/charts/gd-default.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('user dashboard/assets/js/charts/chart-ecommerce.js?ver=2.2.0') }}"></script>
    {{-- <script src="./assets/js/charts/chart-ecommerce.js?ver=2.2.0"></script> --}}

    <script>
        window.addEventListener('close-modal', event => {
            $('#addClient').modal('hide');
        })
    </script>
    
</body>

</html>
