<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <title>PTracker</title>
</head>

<body>
    @include('admin.navbar')
    <div class="red"></div>
    <div class="content container mt-4">
        <h6>// Parcel List</h6>
        <div class="col-sm-12 d-flex justify-content-center align-items-center m-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addparceldata">Add Parcel</button>
        </div>
        <table id="dataParcel" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Parcel#</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Order Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcels as $parcel)
                    <tr>
                        <td><a
                                href="{{ route('admintracked', ['parcel' => '']) }}/{{ $parcel->parcel_id }}">{{ $parcel->parcel_id }}</a>
                        </td>
                        <td>{{ $parcel->sender }}</td>
                        <td>{{ $parcel->user->fname }} {{ $parcel->user->lname }}</td>
                        <td>{{ $parcel->payment_method }}</td>
                        <td>{{ $parcel->amount }}</td>
                        <td>{{ $parcel->status }}</td>
                        <td>{{ $parcel->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#editparceldata{{ $parcel->parcel_id }}">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteParcelData{{ $parcel->parcel_id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="red mt-5"></div>
    <!-- Modal add parcel data-->
    <div class="modal fade" id="addparceldata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Parcel Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addparcelData">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sender</label>
                                <input class="form-control" name="sender" placeholder="Enter sender" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Receiver</label>
                                <select name="userid" id="" class="form-control">
                                    @foreach ($user as $users)
                                        <option value="{{ $users->userid }}">{{ $users->fname }} {{ $users->lname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Payment Method</label>
                                <select name="paymentmethod" id="" class="form-control">
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="GCash">GCash</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Amount</label>
                                <input class="form-control" name="amount" placeholder="Enter amount" />
                            </div>
                            <div class="form-group">
                                <label for="emaill">Status</label>
                                <select name="status" class="form-control">
                                    <option value="Pending">Pending</option>
                                    <option value="To Ship">Shipped</option>
                                    <option value="To Received">To Received</option>
                                    <option value="Complete">Completed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="passss">Description</label>
                                <select name="tracking_info_id" class="form-control">
                                    @foreach ($trackingdetails as $i)
                                        <option value="{{ $i->tracking_info_id }}">{{ $i->details }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input class="form-control" name="contact_num" placeholder="Enter phone number" />
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input class="form-control" name="address" placeholder="Enter Address" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">Add Parcel Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($parcels as $parcel)
        <!-- Modal edit parcel data-->
        <div class="modal fade" id="editparceldata{{ $parcel->parcel_id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Parcel Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="editparcelData">
                        @csrf
                        <input type="hidden" name="parcel_id" value="{{ $parcel->parcel_id }}">
                        <div class="modal-body">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sender</label>
                                    <input class="form-control" name="sender" placeholder="Enter sender"
                                        value="{{ $parcel->sender }}" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Receiver</label>
                                    <select name="userid" id="" class="form-control">
                                        @foreach ($user as $users)
                                            <option value="{{ $users->userid }}"
                                                @if ($parcel->user->userid == $users->userid) selected @endif>{{ $users->fname }}
                                                {{ $users->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment Method</label>
                                    <select name="paymentmethod" id="" class="form-control">
                                        <option value="Cash on Delivery"
                                            @if ($parcel->payment_method == 'Cash on Delivery') selected @endif>Cash on Delivery</option>
                                        <option value="Credit Card" @if ($parcel->payment_method == 'Credit Card') selected @endif>
                                            Credit Card</option>
                                        <option value="GCash" @if ($parcel->payment_method == 'GCash') selected @endif>GCash
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Amount</label>
                                    <input class="form-control" name="amount" placeholder="Enter amount"
                                        value="{{ $parcel->amount }}" />
                                </div>
                                <div class="form-group">
                                    <label for="emaill">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" @if ($parcel->status == 'Pending') selected @endif>
                                            Pending</option>
                                        <option value="To Ship" @if ($parcel->status == 'To Ship') selected @endif>
                                            Shipped</option>
                                        <option value="To Received" @if ($parcel->status == 'To Received') selected @endif>
                                            To Received</option>
                                        <option value="Complete" @if ($parcel->status == 'Complete') selected @endif>
                                            Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="passss">Description</label>
                                    @foreach ($trackingdetails as $i)
                                        <div class="form-check">
                                            <input type="checkbox" name="tracking_info_ids[]"
                                                value="{{ $i->tracking_info_id }}" class="form-check-input"
                                                id="tracking_info_{{ $i->tracking_info_id }}"
                                                @foreach ($parcel->parcelTrackDescription as $description)
                                                        @if ($description->trackingdetail->details == $i->details)
                                                            checked
                                                        @endif @endforeach>
                                            <label class="form-check-label"
                                                for="tracking_info_{{ $i->tracking_info_id }}">
                                                {{ $i->details }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>



                                <div class="form-group">
                                    <label for="">Contact Number</label>
                                    <input class="form-control" name="contact_num" placeholder="Enter phone number"
                                        value="{{ $parcel->contact_num }}" />
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input class="form-control" name="address" placeholder="Enter Address"
                                        value="{{ $parcel->address }}" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-warning">Update Parcel Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($parcels as $parcel)
        <!-- Modal delete parcel data-->
        <div class="modal fade" id="deleteParcelData{{ $parcel->parcel_id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteParcelDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteParcelDataLabel">Delete Parcel Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="deleteParcelForm">
                        @csrf
                        <input type="hidden" name="parcel_id" value="{{ $parcel->parcel_id }}">
                        <div class="modal-body">
                            <p>Are you sure you want to delete this parcel id {{ $parcel->parcel_id }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-danger">Delete Parcel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal logout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <small>
                        Are you sure you want to logout?
                    </small>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        No
                    </button>
                    <button type="button" class="btn btn-danger" id="logout-btn">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#dataParcel');

        $('#addparcelData').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('addparcelData') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then((result) => {
                            // You can redirect or perform other actions after success
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
        $('.deleteParcelForm').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('deleteParcel') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else if (res.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: res.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
        $('.editparcelData').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('editParcel') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then((result) => {
                            // You can redirect or perform other actions after success
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        });
                    } else if (response.status === 'info') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
