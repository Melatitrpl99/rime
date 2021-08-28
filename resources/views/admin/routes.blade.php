@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Route Explorer</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Methods</th>
                                    @if (config('infyom.routes_explorer.collections.api_calls_count'))
                                        <th>Count</th>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($routes as $route)
                                        <tr>
                                            <td>{!! $route['name'] !!}</td>
                                            <td>{!! $route['url'] !!}</td>
                                            <td>{!! $route['methods'] !!}</td>
                                            @if (config('infyom.routes_explorer.collections.api_calls_count'))
                                                <td>{!! $route['count'] !!}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.plugins.datatable', ['useButtons' => false])