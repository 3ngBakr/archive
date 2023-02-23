<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <!-- Search bar -->
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="{{ __('Type to search...') }}">
                    <span class="position-absolute top-50 search-show translate-middle-y"><i
                                class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                                class='bx bx-x'></i></span>
                </div>
            </div>
            <!-- End Search bar -->
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <!-- Mobile search bar -->
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <!-- End Mobile search bar -->
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{--<span class="alert-count">0</span>--}}
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#">
                                <div class="msg-header">
                                    <p class="msg-header-title">{{ __('Notifications') }}</p>
                                    <p class="msg-header-clear ms-auto">{{ __('Marks all as read') }}</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                            </div>
                            <a href="#">
                                <div class="text-center msg-footer">{{ __('View All Notifications') }}</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{--<span class="alert-count">0</span>--}}
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#">
                                <div class="msg-header">
                                    <p class="msg-header-title">{{ __('Messages') }}</p>
                                    <p class="msg-header-clear ms-auto">{{ __('Marks all as read') }}</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                            </div>
                            <a href="#">
                                <div class="text-center msg-footer">{{ __('View All Messages') }}</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ \Auth::user()->profile_photo_url }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ \Auth::user()->name }}</p>
                        <p class="designattion mb-0">{{ \Auth::user()->roles->first()->name }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                    class="bx bx-user"></i><span>{{ __('Profile') }}</span></a>
                    </li>
                  {{--   <li><a class="dropdown-item" href="#"><i
                                    class="bx bx-cog"></i><span>{{ __('Settings') }}</span></a>
                    </li> --}} 
                    <li><a class="dropdown-item" href="{{ route('home') }}"><i
                                    class='bx bx-home-circle'></i><span>{{ __('Web site') }}</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class=" dropdown-item">
                                <i class='bx bx-log-out-circle'></i><span>{{ __('Log Out') }}</span></a>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>