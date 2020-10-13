@extends('layouts.app')
@section('page')
    <main class="main">
        <div class="container-fluid">
            <div class="row  px-2 px-md-5 py-4">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="font-weight-bold">احجز زيارة الان</h2>
                        </div>
                        <div class="col-md-12">
                            <form method="post" action="" class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input required   id="name" type="text" name="name" class="form-control">
                                        <label for="name">الاسم كامل</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input required   id="phone" type="text" name="phone" class="form-control">
                                        <label for="phone">رقم الهاتف</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select required name="state" class="mdb-select md-form">
                                        <option value="" disabled selected>اختر المنطقة</option>
                                        @foreach(config('extra.states') as $st)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input required   id="address" type="text" name="address" class="form-control">
                                        <label for="address">العنوان</label>
                                    </div>
                                </div>
                                <hr class="orange w-75">
                                <div class="col-md-12">
                                    <h5>اختر اليوم و الوقت المفضلين للزيارة</h5>
                                </div>
                                <div class="col-md-6">
                                    <select required name="day" class="mdb-select md-form">
                                        <option value="" disabled selected>اختر اليوم المفضل</option>
                                        @foreach(config('extra.days') as $st)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select required name="time" class="mdb-select md-form">
                                        <option value="" disabled selected>اختر الساعة المفضلة</option>
                                        @foreach(config('extra.hours') as $st)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr class="orange w-75">
                                <div class="col-md-12">
                                    <h5>اختر الباقة</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach(\App\Models\Bundle::all() as $bundle)
                                            <label
                                                class="d-flex flex-column bundle btn btn-outline-deep-orange form-check-label">
                                                <input required   value="{{ $bundle->id }}" name="bundle_id"
                                                       class="bundle-radio form-check-input" type="radio"
                                                       autocomplete="off">
                                                <span class="mdi mdi-car-wash  mdi-24px"></span>
                                                <span>{{ $bundle->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <hr class="orange w-75">
                                <div class="col-md-12">
                                    <h5>اختر نوع السيارة</h5>
                                </div>
                                <div class="bundle-listen">
                                    <div class="col-md-12">
                                        <div id="car_type_group" class="btn-group" data-toggle="buttons">
                                            <h6 class="text-muted px-5 py-2">الرجاء اختيار باقة اولا</h6>
                                        </div>
                                    </div>
                                </div>
                                <hr class="orange w-75">
                                <div class="col-md-12">
                                    <h5 class="w-100 d-flex justify-content-between">
                                        <span>التكلفة</span>
                                        <span id="price-sp"></span>
                                    </h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" style="font-size: 14px;font-weight: 400" class="w-100 btn btn-sm btn-deep-orange btn-rounded">اكمل الطلب</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="pt-4">
                        <img style="width: 100%" class="img-fluid" src="{{ asset('img/1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push("js")
    <script>
        function printPrice(price){
            $(".price-in").removeClass('d-none');
            $("#price-sp").text("₪"+price);
        }
        $(document).ready(function () {
            $('.mdb-select').materialSelect();

            $(".bundle-radio").on("change",function (){
                let id = $(this).val();
                $("#car_type_group").empty();
                $.ajax({
                    url:"{{ route('bundle.getPrices') }}/"+id,
                    success:function (res) {
                        if (res.length) {
                            res.forEach(el=>{
                                let ele = `<label class="d-flex flex-column bundle btn btn-outline-deep-orange form-check-label">
                                            <input required   onclick="printPrice(${el.price})" data-price="${el.price}" value="${el.id}" name="car_type_id" class="car-radio form-check-input" type="radio"
                                                   autocomplete="off">
                                            <span class="mdi mdi-car-multiple  mdi-24px"></span>
                                            <span>${el.name} ${el.price}₪</span>
                                        </label>`;
                                $("#car_type_group").append(ele);
                            })
                            $('html, body').animate({
                                scrollTop: $("#car_type_group").offset().top
                            }, 800);
                            $(".bundle-listen").removeClass('d-none');
                        }
                    }
                });
            })
        });
    </script>
@endpush
