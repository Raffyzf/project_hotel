<!DOCTYPE html>
<html>

<head>
    @include('admin.head')
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Booking</strong></div>
                        <div class="block-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('update_booking', $booking->id) }}" method="Post"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ $booking->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $booking->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">No Telp</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="telepon" class="form-control"
                                            value="{{ $booking->telepon }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Check in</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="startDate" class="form-control"
                                            value="{{ $booking->start_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Check Out</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="endDate" class="form-control"
                                            value="{{ $booking->end_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control mb-3 mb-3">
                                            <option selected value="{{ $booking->status }}">{{ $booking->status }}</option>
                                            <option value="Waiting">Waiting</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" value="" class="btn btn-primary">Update
                                            Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.js')
</body>

</html>
