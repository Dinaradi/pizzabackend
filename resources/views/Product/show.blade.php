@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.showProduct')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-warning btn-sm" href="{{ route('products.index') }}">
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
                                    <th class="text-center">@lang('words.property')</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $products->id }}</td>
                                        </tr>
                                    </tr>

                                    <tr>
                                        <th>@lang('words.image')</th>
                                        <td>
                                            <img alt="image" src="{{ asset('/storage/'. $products->image )}}" width="150">
                                        </td>
                                      </tr>
                                        <tr>
                                            <th>@lang('words.name')</th>
                                            <td>{{ $products->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.types')</th>
                                            <td>{{ $products->types }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.sizes')</th>
                                            <td>{{ $products->sizes }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.price')</th>
                                            <td>{{ $products->price }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.rating')</th>
                                            <td>{{ $products->rating }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.createdAT')</th>
                                            <td>{{ $products->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('words.updatedAT')</th>
                                            <td>{{ $products->updated_at }}</td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


