@extends('back-end.layouts.app')

@section('title', __(getUpperPluralModelName($modelName)." Control"))

@include('back-end.inc.plugins.datatable')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h6 class="mb-0">@lang(getUpperPluralModelName($modelName)." List")</h6>

            @can('create user')
                <a class="btn btn-outline-primary px-5 radius-30"
                   href="{{ route("admin.".getPluralModelName($modelName).".create") }}">
                    <i class="bx bx-user-plus mr-1"></i>@lang("Add ".getUpperModelName($modelName))
                </a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>@lang('Name')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Roles')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection