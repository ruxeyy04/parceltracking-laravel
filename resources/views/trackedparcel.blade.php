<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>PTracker</title>
</head>

<body>
    @include('navbar')
    <div class="red"></div>
    <div class="content container mt-4">
        <h6>// Track // Tracking Package</h6>
        <div class="trackedh mt-3">
            <div class="row d-flex align-items-center">
                <div class="col-md-3">
                    <h6>Sender: {{ $parcel->sender }}</h6>
                </div>
                <div class="col-md-3">
                    <h6>Receiver: {{ $parcel->user->fname }} {{ $parcel->user->lname }}</h6>
                </div>
                <div class="col-md-3">
                    <h6>{{ $parcel->contact_num }}</h6>
                </div>
                <div class="col-md-3">
                    <h6>{{ $parcel->address }}</h6>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-3">
                    <h6>Amount: {{ $parcel->amount }}</h6>
                </div>
                <div class="col-md-6">
                    <h6>Payment Method: {{ $parcel->payment_method }}</h6>
                </div>
            </div>
        </div>
        <div class="logbor mt-3 mb-5">

            <div class="row">
                <div class="col-md-6">
                    <h6>Tracking Number</h6>
                </div>
                <div class="col-md-6 text-right">
                    <h6>{{ $parcel->parcel_id }}</h6>
                </div>
            </div>
            <hr class="line" />

            <!-- diari next track -->
            @foreach ($parcel->parcelTrackDescription as $description)
                <div class="row text-center">
                    <div class="col-md-1">⚫</div>
                    <div class="col">{{ $description->created_at->format('m/d/Y H:i') }}</div>
                    <div class="col">{{ $description->trackingdetail->details}}</div>
                </div>
            @endforeach
            <hr>

        </div>
    </div>
    <div class="red mt-5"></div>
    <footer></footer>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
</body>

</html>
