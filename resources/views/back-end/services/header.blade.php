<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                {{-- Logo --}}
                <div id="logo">
                    <a href="{{ route('home') }}" class="standard-logo"
                       data-dark-logo="{{ asset('images/front-end/main-site/logo.png') }}">
                        <img src="{{ asset('images/front-end/main-site/logo.png') }}" alt="ryadh Logo">
                    </a>
                    <a href="{{ route('home') }}" class="retina-logo"
                       data-dark-logo="{{ asset('images/front-end/main-site/logo.png') }}">
                        <img src="{{ asset('images/front-end/main-site/logo.png') }}" alt="ryadh Logo">
                    </a>
                </div>
                {{-- #logo end --}}

                <div class="header-misc">
                    {{-- Top Search --}}
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger">
                            <i class="icon-search3"></i>
                            <i class="icon-line-cross"></i>
                        </a>
                    </div>
                    {{-- #top-search end --}}
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                {{-- Primary Navigation --}}
                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('home') }}">
                                <div>@lang('Home')</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link">
                                <div>@lang('services')</div>
                            </a>
                            @if($services->count() !== 0)
                                <ul class="sub-menu-container">
                                    @foreach( $services as $service)
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('services.show',$service->id) }}">
                                                <div>{{ $service->name }}</div>
                                            </a>
                                            @if($service->services->count() !== 0)
                                                <ul class="sub-menu-container">
                                                    @foreach($service->services as $subService)
                                                        <li class="menu-item">
                                                            <a class="menu-link"
                                                               href="{{ route('services.show', ['service' => $subService->id]) }}">
                                                                <div>{{ $subService->name }}</div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('blogs.index') }}">
                                <div>@lang('Blog')</div>
                            </a>
                        </li>
                     
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('downloads.index') }}">
                                <div>@lang('Download center')</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('about') }}">
                                <div>@lang('About us')</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('contact.index') }}">
                                <div>@lang('Contact Us')</div>
                            </a>
                        </li>
                    </ul>
                </nav>
                {{-- #primary-menu end --}}

                <form class="top-search-form" action="{{ route('search') }}" method="get">
                    <input type="text" name="search" class="form-control" value="" placeholder="عن ماذا تبحث.؟"
                           autocomplete="off">
                </form>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
