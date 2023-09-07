@extends('layouts.backend.app')

@section('title', 'Slider List')

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
                            <h3 class="float-left">Slider List ({{ $sliders->count() }})</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img width="100" src="{{ file_exists($slider->image) ? url($slider->image) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td>
                                            <a href="{{ route('admin.edit.slider',$slider->id ) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
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

