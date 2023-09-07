@extends('layouts.backend.app')

@section('title', 'Reservation List')

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
                            <h3 class="float-left">Reservation List ({{ $reservations->count() }})</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Number of Guest</th>
                                    <th>is Seen</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reservations as $key => $reservation)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->email }}</td>
                                        <td>{{ $reservation->number }}</td>
                                        <td>{{ $reservation->numberOfGuest }}</td>
                                        <td>
                                            @if($reservation->is_seen == 0)
                                                <p class="badge badge-danger">Unseen</p>
                                            @elseif($reservation->is_seen == 1)
                                                <p class="badge badge-success">Seen</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($reservation->status == 'Pending')
                                                <p class="badge badge-info">{{ $reservation->status }}</p>
                                            @elseif($reservation->status == 'Confirm')
                                                <p class="badge badge-success">{{ $reservation->status }}</p>
                                            @elseif($reservation->status == 'Canceled')
                                                <p class="badge badge-danger">{{ $reservation->status }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary btn-sm details" data-id="{{ $reservation->id }}" data-toggle="modal" data-target="#details">
                                                <i class="fa fa-eye" aria-hidden="true"></i>

                                            </button>
                                            <button class="btn btn-info btn-sm checkStatus" data-id="{{ $reservation->id }}" data-toggle="modal" data-target="#checkStatus">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
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

    <!-- Modal check details-->
    <div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservation Details</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>--}}
                    <a href="{{ route('admin.view.reservation') }}">&times;</a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Full Name</label>
                            <input type="text" id="name" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Email</label>
                            <input type="text" id="email" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Phone Number</label>
                            <input type="text" id="number" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Number Of Guest</label>
                            <input type="text" id="numberOfGuest" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Date</label>
                            <input type="text" id="date" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Time</label>
                            <input type="text" id="time" value="" class="form-control" disabled>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Message</label>
                            <textarea name="" id="message" class="form-control" cols="20" rows="5" disabled=""></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal check status-->
    <div class="modal fade" id="checkStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.status.reservation') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Reservation Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="Pending">Pending</option>
                                <option value="Confirm">Confirm</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" id="reserID" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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

        $(".details").on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('admin.details.reservation') }}",
                type: "GET",
                data: {id : id, },
                success: function (data) {
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#number').val(data.number);
                    $('#numberOfGuest').val(data.numberOfGuest);
                    $('#date').val(data.date);
                    $('#time').val(data.time);
                    $('#message').val(data.message);
                }
            })
        });

        $(document).on('click', '.checkStatus', function () {
            var id = $(this).data("id");
            $('#reserID').val(id);

        });

    </script>
@endpush

