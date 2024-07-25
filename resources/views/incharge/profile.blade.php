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
    @include('incharge.navbar')
    <div class="red"></div>
    <div class="content container mt-4">
        <h6>// Profile</h6>
        <h2 class="mt-3">User Details<span class="badge badge-pill badge-primary" data-toggle="modal"
                data-target="#editprof">Edit</span></h2>
        <div class="row mt-5 d-flex align-items-center">
            <div class="col-md-4 text-center">
                <img src="../image/prof.png" id="profimg" alt="" />
            </div>
            <div class="col-md-4 text-center">
                <h5>First Name:</h5>
                <h6>{{ $userinfo->fname }}</h6>
            </div>
            <div class="col-md-4 text-center">
                <h5>Last Name:</h5>
                <h6>{{ $userinfo->lname }}</h6>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <h5>Gender:</h5>
                <h6>{{ $userinfo->gender }}</h6>
            </div>
            <div class="col-md-4 text-center">
                <h5>Email:</h5>
                <h6>{{ $userinfo->email }}</h6>
            </div>
            <div class="col-md-4 text-center">

                <h5>Username:</h5>
                <h6>{{ $userinfo->username }}</h6>
            </div>
        </div>



    </div>
    <div class="red mt-5"></div>
    <footer></footer>
    <!-- Modal editprof-->
    <div class="modal fade" id="editprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateprofile">
                    <div class="modal-body">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">First name</label>
                                <input class="form-control" name="fname" placeholder="Enter fname"
                                    value="{{ $userinfo->fname }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input class="form-control" name="lname" placeholder="Enter lname"
                                    value="{{ $userinfo->lname }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input class="form-control" name="username" placeholder="Enter username"
                                    value="{{ $userinfo->username }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                    <option value="Male" @if ($userinfo->gender == 'Male') selected @endif>Male
                                    </option>
                                    <option value="Female" @if ($userinfo->gender == 'Female') selected @endif>Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emaill">Email address</label>
                                <input type="email" class="form-control" id="emaill" placeholder="Enter email" name="email"
                                    value="{{ $userinfo->email }}" />
                            </div>
                            <div class="form-group">
                                <label for="passss">New Password</label>
                                <input type="password" class="form-control" id="passss" placeholder="New Password"
                                    name="newpass" />
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
</body>

</html>
