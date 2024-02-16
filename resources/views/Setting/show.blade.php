@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Show Settings</h1>
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
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Property</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $settings->id }}</td>
                                        </tr>
                                    </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $settings->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td>
                                                <img alt="image" src="{{ asset('/storage/'. $settings->image )}}" width="150">
                                            </td>
                                          </tr>
                                        <tr>
                                            <th>Comment</th>
                                            <td>{{ $settings->comment }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created AT</th>
                                            <td>{{ $settings->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated AT</th>
                                            <td>{{ $settings->updated_at }}</td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


