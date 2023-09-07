@extends('layouts.backend.app')

@section('title', 'Min and Max Amount')

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
                            <h3 class="float-left">Min and Max Amount</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Min Amount</th>
                                    <th>Max Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($min_maxes as $key => $min_max)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $min_max->min_amount }}</td>
                                        <td>{{ $min_max->max_amount }}</td>

                                        <td>
                                            <a href="{{ route('admin.edit.min_max',$min_max->id ) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>

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

