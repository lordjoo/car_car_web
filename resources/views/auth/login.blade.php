@extends("layouts.app")
@section("page")
    <div class="login-page d-flex align-items-center grey lighten-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold black-text">
                            <h2 class="mt-2">تسجيل الدخول</h2>
                        </div>
                        @if($errors->any())
                        <div class="card-body">
                            <h6 class="alert alert-danger text-center">
                                @foreach($errors->all() as $er )
                                    {{ $er }} <br>
                                @endforeach
                            </h6>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" autocomplete="off" action="/login">
                                        @csrf
                                        <div class="md-form">
                                            <label style="right: 0;left: initial " class="text-left" for="email">البريد الالكتروني</label>
                                            <input required name="email" class="form-control" id="email" type="text">
                                        </div>
                                        <div class="md-form">
                                            <label style="right: 0;left: initial " class="text-left" for="pass">كلمة السر</label>
                                            <input required name="password" class="form-control" id="pass" type="password">
                                        </div>
                                        <button class="btn btn-sm btn-primary w-100">تسجيل الدخول</button>                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .login-page {
            height: 100vh;
        }
    </style>
@endpush
