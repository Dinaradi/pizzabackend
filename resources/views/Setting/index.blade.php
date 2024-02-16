@extends('layouts.site')
@section('content')
    <div class="row justify-content-end">
        @include('layouts.message')
        <div class="col-12 text-center">
            <h1>Settings Table</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success btn-sm" href="{{ route ('settings.create')}}">Create</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    {{-- <th>category_id</th> --}}
                                    <th>Title</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    {{-- <td>{{ $setting->category_id }}</td> --}}
                                    <td>{{ $setting->title }}</td>
                                    <td>{{ $setting->comment }}</td>
                                    <td>
                                        <img alt="image" src="{{ asset('/storage/'. $setting->image )}}" width="100">
                                    </td>
                                    <td>
                                        <a href="{{ route('settings.show', $setting->id) }}"
                                            class="btn btn-sm"><button class="btn btn-primary btn-sm">Show</button></a>
                                        <a href="{{ route('settings.edit', $setting->id) }}"
                                            class="btn btn-sm"><button class="btn btn-warning btn-sm">Edit</button></a>
                                        {{-- <a href="{{ route('setting.destroy', $setting->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                        <a class="btn btn-sm">
                                            <form action="{{ route('settings.destroy', $setting->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete?')">Delete</button>
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
