
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
{{--            <img src="images/user.png" width="48" height="48" alt="User" />--}}
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Sign Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                        </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->


    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard')? 'active' : '' }}">
                    <a href="index.html">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="pages/typography.html">--}}
{{--                        <i class="material-icons">text_fields</i>--}}
{{--                        <span>Typography</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li>
                    <a href="{{route('admin.product')}}">
                        <i class="material-icons">assessment</i>
                        <span>Product View</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.payment')}}">
                        <i class="material-icons">assessment</i>
                        <span>Payment details</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="pages/helper-classes.html">--}}
{{--                        <i class="material-icons">layers</i>--}}
{{--                        <span>Helper Classes</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0);" class="menu-toggle">--}}
{{--                        <i class="material-icons">map</i>--}}
{{--                        <span>Maps</span>--}}
{{--                    </a>--}}
{{--                    <ul class="ml-menu">--}}
{{--                        <li>--}}
{{--                            <a href="pages/maps/google.html">Google Map</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages/maps/yandex.html">YandexMap</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages/maps/jvectormap.html">jVectorMap</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0);" class="menu-toggle">--}}
{{--                        <i class="material-icons">trending_down</i>--}}
{{--                        <span>Multi Level Menu</span>--}}
{{--                    </a>--}}
{{--                    <ul class="ml-menu">--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0);">--}}
{{--                                <span>Menu Item</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0);">--}}
{{--                                <span>Menu Item - 2</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0);" class="menu-toggle">--}}
{{--                                <span>Level - 2</span>--}}
{{--                            </a>--}}
{{--                            <ul class="ml-menu">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:void(0);">--}}
{{--                                        <span>Menu Item</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:void(0);" class="menu-toggle">--}}
{{--                                        <span>Level - 3</span>--}}
{{--                                    </a>--}}
{{--                                    <ul class="ml-menu">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <span>Level - 4</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="header">LABELS</li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="material-icons col-light-blue">donut_large</i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif



            @if(Request::is('author*'))
                <li class="{{ Request::is('author/dashboard')? 'active' : '' }}">
                    <a href="index.html">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="pages/typography.html">
                        <i class="material-icons">text_fields</i>
                        <span>Typography</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">trending_down</i>
                        <span>Multi Level Menu</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Menu Item</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Menu Item - 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Level - 2</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Level - 3</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span>Level - 4</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="header">LABELS</li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="material-icons col-light-blue">donut_large</i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

        </ul>
    </div>
    <!-- #Menu -->






