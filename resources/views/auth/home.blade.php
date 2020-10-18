@extends('layouts.dash')
@push("title")
    نظرة عامة
@endpush
@push('css')

    <style>
        .footer-hover {
            background-color: rgba(0, 0, 0, 0.1);
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out
        }

        .footer-hover:hover {
            background-color: rgba(0, 0, 0, 0.2)
        }

        .text-black-40 {
            color: rgba(0, 0, 0, 0.4)
        }
    </style>
@endpush
@section('page')
    <main class="main">

        <div class="container mt-4 pt-0">

            <!-- Section: Block Content -->
            <section>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h2>نظرة عامة</h2>
                    </div>
                </div>
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-3 mb-4">

                        <!-- Card -->
                        <div class="card primary-color white-text">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="h2-responsive font-weight-bold mt-n2 mb-0">
                                        {{ \App\Models\Request::count() }}
                                    </p>
                                    <p class="mb-0">طلب</p>
                                </div>
                                <div>
                                    <i class="mdi mdi-clipboard-list-outline mdi-48px white-text"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">

                        <!-- Card -->
                        <div class="card secondary-color white-text">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="h2-responsive font-weight-bold mt-n2 mb-0">
                                        {{ \App\Models\Bundle::count() }}
                                    </p>
                                    <p class="mb-0">باقة</p>
                                </div>
                                <div>
                                    <i class="mdi mdi-package-variant-closed mdi-48px white-text"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: Block Content -->
            <hr>
            <!-- Section: Block Content -->
            <section class="mt-3 ">
                <div class="row">
                    <div class="col-md-12">
                        <h2>احدث الطلبات</h2>
                    </div>
                </div>
                <div class="row card">
                    <div class="col-12">
                        <div class="card-list">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">اسم العميل</th>
                                    <th scope="col">الباقة</th>
                                    <th scope="col">نوع السيارة</th>
                                    <th scope="col">المنطقة</th>
                                    <th scope="col">رقم الهاتف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\Request::limit(10)->get() as $or)
                                    <tr>
                                        <td>{{ $or->id }}</td>
                                        <td>{{ $or->name }}</td>
                                        <td>{{ $or->bundle()->first()->name }}</td>
                                        <td>{{ $or->car()->first()->name }}</td>
                                        <td>{{ $or->state }}</td>
                                        <td>{{ $or->total }}</td>
                                        <td>{{ $or->phone }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Section: Block Content -->


        </div>
    </main>
@endsection
