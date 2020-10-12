@extends('layouts.dash')
@push('title')
    الطلبات
@endpush
@section('page')
    <div class="container mt-3">'
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <h2>الطلبات</h2>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </section>
    </div>

@endsection
