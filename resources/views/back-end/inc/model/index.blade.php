@extends('back-end.layouts.app')

@section('title', __(getUpperPluralModelName($modelName)." Control"))

@include('back-end.inc.plugins.datatable')

@section('content')
    <div class="card">
        @include('back-end.inc.card-header-add-new')
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th style="width: 10px"></th>
                        @foreach (config("ryada.models.{$modelName}.fields", []) as $field)
                            <th>@lang($field)</th>
                        @endforeach
                        <th>@lang('Actions')</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection