<!-- Navigation Bar-->
<header id="topnav" class="boonhome-font">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                

                <li class="dropdown notification-list">
                    {{-- <div class="row mt-2"> --}}
                        {{-- <div class="col-md-2 mt-2 waves-effect waves-light">
                            <img src="{{asset('backend/assets/images/user-icon.png')}}" alt="user-image" height="37"
                            class="rounded-circle">
                        </div> --}}
                        {{-- <div class="col-md-12"> --}}
                            {{-- <div class="row"> --}}
                                {{-- <label for="" class="text-white">{{$username}}</label> --}}
                                {{-- <div class="row"> --}}
                                    
                                    <h5  class="text-white">{{$username}}</h5>
                                </n>
                                    <h6  class="text-white">{{$dp_id['name']}}</h6>
                                {{-- </div> --}}
                               
                            {{-- <div class="row">
                                <label for="" class="text-white"></label>
                            </div> --}}
                            
                            
                        {{-- </div> --}}
                    {{-- </div> --}}
                   
                    {{-- <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                        aria-expanded="false">
                        <img src="{{asset('backend/assets/images/user-icon.png')}}" alt="user-image"
                            class="rounded-circle">
                            {{$username}}
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title text-center">
                            <h6 class="text-overflow m-0"> admin </h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('profile')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>ໂປຣຟາຍ</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route('logout')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>ອອກຈາກລະບົບ</span>
                        </a>

                    </div> --}}
                </li>


                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title text-center">
                            <h6 class="text-overflow m-0"> admin </h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('profile')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>ໂປຣຟາຍ</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        {{-- <a href="{{route('logout')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>ອອກຈາກລະບົບ</span>
                        </a> --}}

                    </div>
                </li>
       

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index-1.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/Artboard.png')}}" alt="" height="45">
                        <span class="logo-lg-text-light"></span>
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                </a>
            </div>


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                <!-- <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    @include('components.layouts.navmenu')
</header>
<!-- End Navigation Bar-->