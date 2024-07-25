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
    @include('client.navbar')
    <div class="red"></div>
    <div class="as container mt-4">
        <h6>// All Package</h6>
        <h2 class="text-center mt-3">Your all package tracking package</h2>
        <div class="logbor mt-5 mb-5">
            <div class="row">
                <div class="col-md-2">Parcel#</div>
                <div class="col-md-2">Sender</div>
                <div class="col-md-2">Receiver</div>
                <div class="col-md-2">Payment Method</div>
                <div class="col-md-1">Amount</div>
                <div class="col-md-1">Status</div>
                <div class="col-md-2">Order Created</div>
            </div>
            <hr class="line" />
            @foreach ($parcels as $parcel)
                <div class="row d-flex align-items-center">
                    <div class="col-md-2"><a href="{{ route('ctracked', ['parcel' => '']) }}/{{ $parcel->parcel_id }}">{{ $parcel->parcel_id }}</a></div>
                    <div class="col-md-2">{{ $parcel->sender }}</div>
                    <div class="col-md-2">{{ $parcel->user->fname }} {{ $parcel->user->lname }}</div>
                    <div class="col-md-2">{{ $parcel->payment_method }}</div>
                    <div class="col-md-1">{{ $parcel->amount }}</div>
                    <div class="col-md-1">{{ $parcel->status }}</div>
                    <div class="col-md-2">{{ $parcel->created_at->format('m/d/Y H:i') }}</div>
                </div>
                <hr />
            @endforeach

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
