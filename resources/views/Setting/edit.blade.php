@extends('layouts.site')
@section('content')
    <div class="row">
        @include('layouts.message')
        <div class="col-12 text-center">
            <h1>Edit Settings</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-warning btn-sm" href="{{ route('settings.index') }}">
                Back
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <table class="table table-striped text-center" id="table-1">
                        </table> --}}
                        {{-- <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Property</th>
                                </tr>
                            </thead> --}}
                        <tbody>
                            <form enctype="multipart/form-data" action="{{ route('settings.update', $setting->id) }}"
                                method="post" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input class="form-control" value="{{ old('title', $setting->title) }}" type="text"
                                        placeholder="title" id="title" name="title">
                                    @error('title')
                                        PLease enter title
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="comment">comment</label>
                                    <input class="form-control" value="{{ old('comment', $setting->comment) }}" type="text" id="comment"
                                        placeholder="Adress" name="comment">
                                    @error('comment')
                                        PLease enter comment
                                    @enderror
                                </div>

                                <div class="custom-file mb-3">
                                    <input type="file" class="mb-3 custom-file-input" name="image" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                    <img alt="image" src="{{ asset('/storage/'. $setting->image )}}" width="45">
                                        Choose file
                                    </label>
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
