@extends('layouts.backend.app')

@section('title', 'Logo & Favicon List')

@push('css')

@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left"> Logo & Favicon List ({{ $logs->count() }})</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Logo</th>
                                    <th>Favicon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($logs as $key => $logo)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img width="80" src="{{ file_exists($logo->logo) ? url($logo->logo) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td><img width="32" src="{{ file_exists($logo->logo) ? url($logo->favicon) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td>
                                            <a href="{{ route('admin.edit.logo',$logo->id ) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')

@endpush

