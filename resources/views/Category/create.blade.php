@extends('layouts.site')
@section('content')

<div class="row">
    @include('layouts.message')
    <div class="col-12 text-center">
        <h1>@lang('words.createCategory')</h1>
    </div>
    <div class="col-12 text-right mb-3">
        <a class="btn btn-warning btn-sm" href="{{route('categories.index')}}">@lang('words.back')</a>
    </div>
    <div class="col-12">
        <div class="card">
            <form class="needs-validation" autocomplete="off" action="{{route('categories.store')}}" method="POST" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">@lang('words.name')</label>
                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" required="" placeholder="@lang('words.productName')">
                        <div class="invalid-feedback">
                           @lang('words.whatsTheProductName')
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">@lang('words.send')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
