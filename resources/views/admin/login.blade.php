<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>The Shoe Company - Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
</head>

<body>
    @if(session()->has('error') && !empty(session('error')))
    <script>
        // JavaScript for displaying the alert
        window.onload = function() {
            alert("{{ session('error') }}");
        };
    </script>
    @endif

    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/login') }}">
                                    @csrf
                                    <!-- Display validation errors -->
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                    </div>
                                    <div class="float-left">
                                        <a href="forgotpassword.php" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <a href="resetpassword.php" class="text-small">
                                            Reset Password?
                                        </a>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
</body>

</html>