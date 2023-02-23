<div>
    @if (isset($imageUrl))
        <section id="page-title" class="page-title-parallax page-title-dark include-header"
                 style="padding: 250px 0; background-image:url('{{ asset($imageUrl) }}');
                         background-size:cover; background-position: center center;"
                 data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">
            @else
                <section id="page-title" class="page-title-mini">
                    @endif
                    <div class="container clearfix">
                        <h1> {{ $title }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item">
                                    <a href="{{ filter_var($breadcrumb['route'], FILTER_VALIDATE_URL) ? $breadcrumb['route'] : route($breadcrumb['route']) }}">
                                        @lang($breadcrumb['text'])
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </section>
</div>