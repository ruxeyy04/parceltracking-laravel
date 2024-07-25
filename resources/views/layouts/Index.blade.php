<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>@yield('title')</title>
</head>

<body>
    @yield('navbar')
    <div class="red"></div>
    <div class="content container mt-5">
        <h2 class="text-center">Access Million+ package in whole world</h2>
        <h5 class="text-center">Track your package for free.</h5>
        <div class="d-flex justify-content-center mt-3">
            <form class="form-inline" id="trackingForm" action="{{ route('homeparceltracking', ['parcel' => '']) }}" method="GET">
                <input class="trackipt form-control" type="search" id="trackingInput" name="parcel" placeholder="Enter tracking number" aria-label="Search" />
                <button class="trackbtn btn" type="submit">Track</button>
            </form>
            
            <script>
                $(document).ready(function () {
                    $('#trackingForm').submit(function (e) {
                        e.preventDefault();
                        var trackingNumber = $('#trackingInput').val();
                        window.location.href = "{{ route('homeparceltracking', ['parcel' => '']) }}/" + trackingNumber;
                    });
                });
            </script>
            
            
            
            

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <img src="image/q1.png" alt="" />
                <h5>Package</h5>
            </div>
            <div class="col text-center">
                <img src="image/q2.png" alt="" />
                <h5>Deliver</h5>
            </div>
            <div class="col text-center">
                <img src="image/q3.png" alt="" />
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
    <div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="login">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="emailll">Email address/username</label>
                            <input type="text" class="form-control" id="emailll" placeholder="Enter email/username"
                                name="email_username" />
                        </div>
                        <div class="form-group">
                            <label for="passworddd">Password</label>
                            <input type="password" class="form-control" id="passworddd" placeholder="Password"
                                name="password" />
                        </div>
                        <small>
                            Don't have an account?
                            <span></span>
                            <a href="" class="text-success" data-toggle="modal" data-target="#reg">Register
                                here!</a></span>
                        </small>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal reg-->
    <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="registration">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input class="form-control" placeholder="Enter first name" name="fname" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <input class="form-control" placeholder="Enter last name" name="lname" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input class="form-control" placeholder="Enter username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="select">Gender</label>
                            <select class="form-control" id="select" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/reg_login.js') }}"></script>
</body>

</html>
