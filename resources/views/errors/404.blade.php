@extends('front-end.layouts.app',['title' => '404'])
@section('content')

    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row align-items-center col-mb-80">

                <div class="col-lg-6">
                    <div class="error404 center">404</div>
                </div>

                <div class="col-lg-6">

                    <div class="heading-block text-center text-lg-start border-bottom-0">
                        <h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
                        <span>Try searching for the best match or browse the links below:</span>
                    </div>

                    <form action="{{ route('home') }}" method="get" class="mb-5">
                        <div class="input-group input-group-lg">
                            <button class="btn btn-success" type="submit">@lang('Home')</button>
                        </div>
                    </form>
@endsection
