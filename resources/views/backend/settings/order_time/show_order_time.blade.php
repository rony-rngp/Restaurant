@extends('layouts.backend.app')

@section('title', 'Order Times')

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
                            <h3 class="float-left">Order Times ({{ $order_times->count() }})</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" data-toggle="modal" href="javascript:void(0)" data-target="#checkStatus"><i class="fa fa-plus-square"></i> Add Time</a></p>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order_times as $key => $order_time)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order_time->name }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="70" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $order_time->id }}"  {{ $order_time->status == 1 ? 'checked' : '' }}  >
                                        </td>
                                        <td>
                                            <!--Delete Data-->
                                            <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $order_time->id }})">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $order_time->id }}" action="{{ route('admin.destroy.order.time', $order_time->id) }}" method="post" style="display: none">
                                                @csrf
                                                @method('post')
                                            </form>
                                            <!--End Delete Data-->
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


    <!-- Modal check status-->
    <div class="modal fade" id="checkStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.order.time') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="name">Time</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="12:00">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }

            $.ajax({
                url: "{{ route('admin.status.order.time') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush

