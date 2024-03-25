@include('dashboard.common.frontHeader')
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" action="/submit" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="email"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <input type="submit" name="submitForm" value="Login"
                                    class="btn btn-primary btn-user btn-block" />
                                <hr>
                                @csrf

                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                            </form>
                            {{-- <hr> --}}
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="/register">Create an Account!</a>
                            </div>
                            <ul class="nav flex-column"">
                                @foreach ($errors->all() as $item)
                                    <li class="nav-item text-danger">{{ $item }}</li>
                                @endforeach
                            </ul>
                            @if (session()->has('response'))
                                @if (session('response')['status'] === 200)
                                    <p class="text-success"> {{ session('response')['message'] }}</p>
                                @else
                                    <p class="text-danger"> {{ session('response')['message'] }}</p> 
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@include('dashboard.common.frontFooter')
