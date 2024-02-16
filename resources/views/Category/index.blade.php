@extends('layouts.site')
@section('content')
    <div class="row justify-content-end">
        @include('layouts.message')
        <div class="col-12 text-center">
            <h1>@lang('words.categoryTable')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}">@lang('words.create')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>@lang('words.name')</th>
                                    <th>@lang('words.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $category->id) }}"
                                                class="btn btn-sm"><button class="btn btn-primary btn-sm">@lang('words.show')</button></a>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm"><button class="btn btn-warning btn-sm">@lang('words.edit')</button></a>
                                            <a class="btn btn-sm">
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Delete?')">@lang('words.delete')</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
