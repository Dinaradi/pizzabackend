@extends('layouts.site')
@section('content')
    <div class="row">
        @include('layouts.message')
        <div class="col-12 text-center">
            <h1>@lang('words.editProducts')</h1>
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
                        <tbody>
                            <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}"
                                method="post" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="custom-file mb-3">
                                    <input type="file" class="mb-3 custom-file-input" name="image" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                    <img alt="image" src="{{ asset('/storage/'. $product->image )}}" width="30" >
                                    @lang('words.choosefile')
                                    </label>
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="name">@lang('words.name')</label>
                                    <input class="form-control" value="{{ old('name', $product->name) }}" type="text"
                                        placeholder="Name" id="name" name="name">
                                    @error('name')
                                    @lang('words.pleaseEnterName')
                                    @enderror
                                </div>

                                @for ($i = 0; $i <= 1; $i++ )
                                <div class="mb-3">
                                    <label class="form-label" for="types">@lang('words.types')</label>
                                    <input class="form-control" value="{{ old('sizes', $product->types) }}" type="number"
                                        placeholder="types" id="types" name="types">
                                    @error('types')
                                    @lang('words.pleaseEnterTypes')
                                    @enderror
                                </div>
                                @endfor

                                @for ($i = 0; $i <= 2; $i++ )
                                <div class="mb-3">
                                    <label class="form-label" for="sizes">@lang('words.sizes')</label>
                                    <input class="form-control" value="{{ old('sizes', $product->sizes) }}" type="number"
                                        placeholder="sizes" id="sizes" name="sizes">
                                    @error('sizes')
                                    @lang('words.pleaseEnterSizes')
                                    @enderror
                                </div>
                                @endfor

                                <div class="mb-3">
                                    <label class="form-label" for="rating">@lang('words.rating')</label>
                                    <input class="form-control" value="{{ old('rating', $product->rating) }}" type="text"
                                        placeholder="rating" id="rating" name="rating">
                                    @error('rating')
                                    @lang('words.pleaseEnterRating')
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="price">@lang('words.price')</label>
                                    <input class="form-control" value="{{ old('price', $product->price) }}" type="text" id="price"
                                        placeholder="Adress" name="price">
                                    @error('price')
                                    @lang('words.pleaseEnterPrice')
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
