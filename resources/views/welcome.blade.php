@extends('layouts.app')
@push('css')
    <style>
        [type="radio"]:checked + label::before, [type="radio"].with-gap:checked + label::before {
            background-color: rgb(255, 138, 6) !important;
        }
        [type="radio"]:checked + label::after, [type="radio"].with-gap:checked + label::before, [type="radio"].with-gap:checked + label::after {
            border-color: rgb(255, 138, 6) !important;
        }
    </style>
@endpush
@section('page')

    <div class="banner z-depth-1">
    <div class="container my-5">


        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-2">

                <div class="col-md-6 d-flex align-items-center">
                    <div class="smooth-scroll">

                        <h3 class="font-weight-bold mb-4">الشركة الفلسطينية للعناية بالسيارات</h3>

                        <p> الشركة الفلسطينية للعناية بالسيارات هي شركة فلسطينية تم انشائها عام 2020 بتمويل من السيد محمد فايز .. وهنا باقي النص راح يكون بناء على الي تم تعبئته .. بلا بلا بلا.</p>

                        <a href="#services" type="button" class="btn btn-orange btn-rounded mx-0">المزيد</a>

                    </div>
                </div>

                <div class="col-md-6 mb-4">

                    <div class="view pr-4">
                        <img src="img/header1.png" class="img-fluid" alt="smaple image">
                    </div>

                </div>

            </div>

        </section>
        <!--Section: Content-->
    </div>

</div>

<div id="services" class="container my-5">

    <!-- Section -->
    <section>

        <h3 class="font-weight-bold text-center dark-grey-text pb-2">خدماتنا</h3>
        <hr class="w-header my-4">
        <p class="lead text-center text-muted pt-2 mb-5">نقدمها لكم بكل حب واتقان.</p>

        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card text-center orange darken-3 text-white">
                    <div class="card-body">
                        <p class="mt-4 pt-2"><i class="mdi mdi-car-wash fa-4x"></i></p>
                        <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">غسيل السيارات</a></h5>
                        <p class="mb-4">He polite be object change. Consider no overcame yourself sociable children.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="mt-4 pt-2"><i class="mdi mdi-car-cog fa-4x grey-text"></i></p>
                        <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#">اصلاح البناشر</a></h5>
                        <p class="text-muted mb-4">He polite be object change. Consider no overcame yourself sociable children.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Section -->

</div>

<div class="blue-grey darken-4 my-5">


    <!--Section: Content-->
    <section class="p-5 white-text py-3">

        <h3 class="text-center font-weight-bold mb-4">احصائياتنا</h3>

        <div class="row d-flex justify-content-center">

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
                    <i class="fas fa-file-alt "></i>
                    <span class="d-inline-block count-up" data-from="0" data-to="100" data-time="2000">100</span>
                </h4>
                <p class="font-weight-normal text-muted">Unique Page</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
                    <i class="fas fa-layer-group"></i>
                    <span class="d-inline-block count1" data-from="0" data-to="250" data-time="2000">250</span>
                </h4>
                <p class="font-weight-normal text-muted">Block Variety</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
                    <i class="fas fa-pencil-ruler"></i>
                    <span class="d-inline-block count2" data-from="0" data-to="330" data-time="2000">330</span>
                </h4>
                <p class="font-weight-normal text-muted">Reusable Component</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
                    <i class="fab fa-react"></i>
                    <span class="d-inline-block count3" data-from="0" data-to="430" data-time="2000">430</span>
                </h4>
                <p class="font-weight-normal text-muted">Crafted Element</p>
            </div>

        </div>

    </section>
    <!--Section: Content-->


</div>

<div class="container my-5">


    <!--Section: Content-->
    <section class="text-center dark-grey-text">

        <!-- Section heading -->
        <h3 class="font-weight-bold pb-2 mb-4">الباقات</h3>
        <!-- Section description -->
        <!-- Grid row -->
        <div class="row justify-content-center">

            @foreach(\App\Models\Bundle::all() as $bundle)
            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-4">
                <!-- Card -->
                <div class="card">
                    <!-- Content -->
                    <div class="card-body">
                        <!-- Offer -->
                        <div class="d-flex justify-content-center">
                            <div class="card-circle d-flex justify-content-center align-items-center">
                                <i style="font-size: 72px" class="mdi mdi-car-wash orange-text"></i>
                            </div>
                        </div>
                        <!--Price -->
                        <h2 class="font-weight-bold mb-1 mt-2">
                            {{ $bundle->name }}
                        </h2>
                        <p class="grey-text mt-0">
                            {{ $bundle->desc }}
                        </p>
                        <hr class="orange w-50">
                        <form action="{{ route('reserve') }}">
                            <div class="cars-select">
                                <p class="grey-text mt-0">
                                    اختر نوع السيارة
                                </p>
                                @foreach($bundle->prices()->get() as $p)
                                    <div class="custom-control custom-radio">
                                        <input data-bundle="bundle-price-text-{{$bundle->id}}" data-price="{{$p->price}}" value="{{ $p->id }}" type="radio" class="custom-control-input car-select" id="carSelect{{$p->id}}" name="bundle_price">
                                        <label class="custom-control-label" for="carSelect{{$p->id}}">{{$p->car()->first()->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn darken-3 btn-orange btn-rounded d-flex justify-content-center mx-auto flex-row-reverse">
                                <span>اطلب الان</span>
                                <span style="direction: rtl" id="bundle-price-text-{{$bundle->id}}" class="ml-2"></span>
                            </button>
                        </form>
                    </div>
                    <!-- Content -->
                </div>
                <!-- Card -->
            </div>
            <!-- Grid column -->
            @endforeach
        </div>
        <!-- Grid row -->

    </section>
    <!--Section: Content-->


</div>

<div class="mt-5 elegant-color z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 py-3 text-center white-text  rounded">

        <h5 class="">Made with <i class="fas fa-heart red-text mx-1"></i> by Lordjoo</h5>

    </section>
    <!--Section: Content-->


</div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("input[type=radio]").on("change",function (){
                $("#"+$(this).data('bundle')).text("(₪"+$(this).data("price")+")")
            })
        })
    </script>
@endpush
