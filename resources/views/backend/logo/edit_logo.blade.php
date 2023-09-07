@extends('layouts.backend.app')

@section('title', 'Edit Logo & Favicon')

@push('css')

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Edit Logo & Favicon</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.logo') }}"><i class="fa fa-list-alt"></i> Logo & Favicon List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.logo', $logo->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" class="form-control dropify" data-default-file="{{ file_exists($logo->logo) ? url($logo->logo) : '' }}" data-max-file-size="5M" id="logo" accept="image/*">
                                            <span style="color:red">{{ $errors->has('logo') ? $errors->first('logo') : '' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="favicon">Favicon</label>
                                            <input type="file" name="favicon" class="form-control dropify" data-default-file="{{ file_exists($logo->favicon) ? url($logo->favicon) : '' }}" data-max-file-size="5M" id="favicon" accept="image/*">
                                            <span style="color:red">{{ $errors->has('favicon') ? $errors->first('favicon') : '' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10">
                                        <button type="submit"  class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@push('js')

@endpush

