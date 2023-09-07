@extends('layouts.backend.app')

@section('title', 'Edit Shipping Charges')

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
                            <h3 class="float-left">Edit Shipping</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.shipping.charges') }}"><i class="fa fa-list-alt"></i> Shipping List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.shipping.charges', $shipping_charges->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="shipping_charges">Amount</label>
                                        <input type="number" name="shipping_charges" id="shipping_charges" value="{{ $shipping_charges->shipping_charges }}" class="form-control" placeholder="Amount">
                                        <span style="color:red">{{ $errors->has('shipping_charges') ? $errors->first('shipping_charges') : '' }}</span>

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

