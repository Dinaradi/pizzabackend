@extends('layouts.site')
@section('content')
            <div class="col-12 text-center">
                @include('layouts.message')
                <h1>Create Settings</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{route('settings.index')}}">
                   Back
                </a>
            </div>
            <div class="col-12">
                <form enctype="multipart/form-data" action="{{route('settings.store')}}" method="post" autocomplete="off">
                    @csrf


                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input  class="form-control @error('title')
                        is-invalid
                        @enderror" type="text" id="title" name="title" placeholder="Title"
                            >
                            @error('title')
                            PLease enter title
                        @enderror
                    </div>


                    <div class="custom-file mb-3">
                        <input type="file" class="mb-3 custom-file-input @error('image') is-invalid @enderror" name="image" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('image')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="comment">comment</label>
                        <input  class="form-control @error('comment')
                        is-invalid
                        @enderror" type="comment" id="comment" name="comment" placeholder="comment"
                            >
                            @error('comment')
                            PLease enter comment
                        @enderror
                    </div>
                    <div class="mb-3 text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
