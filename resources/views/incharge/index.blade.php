<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <title>PTracker</title>
</head>

<body>
    @include('incharge.navbar')
    <div class="red"></div>
    <div class="content container mt-4">
        <h6>// Track</h6>
        <h2 class="text-center mt-3">Access Million+ package in whole world</h2>
        <h5 class="text-center">Track your package for free.</h5>
        <div class="d-flex justify-content-center mt-3">
            <form class="form-inline" id="trackingForm" action="{{ route('itracked', ['parcel' => '']) }}" method="GET">
                <input class="trackipt form-control" type="search" id="trackingInput" name="parcel" placeholder="Enter tracking number" aria-label="Search" />
                <button class="trackbtn btn" type="submit">Track</button>
            </form>
            
            <script>
                $(document).ready(function () {
                    $('#trackingForm').submit(function (e) {
                        e.preventDefault();
                        var trackingNumber = $('#trackingInput').val();
                        window.location.href = "{{ route('itracked', ['parcel' => '']) }}/" + trackingNumber;
                    });
                });
            </script>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <img src="../image/q1.png" alt="" />
                <h5>Package</h5>
            </div>
            <div class="col text-center">
                <img src="../image/q2.png" alt="" />
                <h5>Deliver</h5>
            </div>
            <div class="col text-center">
                <img src="../image/q3.png" alt="" />
                <h5>Received</h5>
            </div>
        </div>
        <div class="abt mt-5 pr-5 pl-5">
            <p class="text-justify">
                PTracker is the Worldwide market leader in payments & remittance,
                documents & mail, parcels & boxes, and cargo & logistics. With a
                growing network of over 6,400 locations, partners, and agents in over
                30 countries, LBC is committed to moving lives, businesses, and
                communities and delivering smiles around the world. <br />
                Founded in 1945 as a brokerage and air cargo agent, LBC pioneered
                time-sensitive cargo delivery and 24-hour door-to-door delivery in the
                Philippines. Today, it is the most trusted courier, cargo & logistics,
                and remittance service provider of the Global Filipino.
            </p>
        </div>
    </div>
    <div class="red mt-5"></div>
    <footer></footer>
    <!-- Modal Login-->
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
</body>

</html>
