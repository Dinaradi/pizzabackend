@extends('layouts.site')
@section('content')
    <div class="row">
        @include('layouts.message')
        <div class="col-12 text-center">
            <h1>@lang('words.editCategory')</h1>
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
                        <tbody>
                            <form enctype="multipart/form-data" action="{{ route('categories.update', $category->id) }}"
                                method="post" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label" for="name">@lang('words.name')</label>
                                    <input class="form-control" value="{{ old('name', $category->name) }}" type="text"
                                        placeholder="Name" id="name" name="name">
                                    @error('name')
                                    @lang('words.pleaseEnterName')
                                    @enderror
                                </div>

                                <div class="mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">@lang('words.submit')</button>
                                </div>
                            </form>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
