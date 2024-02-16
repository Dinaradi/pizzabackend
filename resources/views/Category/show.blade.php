@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.showCategory')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-warning btn-sm" href="{{ route('categories.index') }}">
                @lang('words.back')
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">@lang('words.name')</th>
                                    <th class="text-center">@lang(('words.property'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $categories->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.name')</th>
                                            <td>{{ $categories->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.createdAT')</th>
                                            <td>{{ $categories->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.updatedAT')</th>
                                            <td>{{ $categories->updated_at }}</td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


