@extends('layouts.dash')
@push('title')
    الباقات
@endpush
@section('page')
    <div class="container mt-3">'
        <section class="">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-10">
                    <h2>الباقات</h2>
                </div>
                <div class="col-md-2">
                    <button data-toggle="modal" data-target="#addBundle" class="btn btn-sm btn-primary"
                            style="font-size: 14px">
                        <span class="mdi mdi-plus "></span>
                        اضف باقة
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card-list">
                        <table class="table table-sm btn-table table-hover">
                            <thead style="background: #4c5678" class="white-text">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">الباقة</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الاسعار</th>
                                <th scope="col">اجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bundles as $b)
                                <tr>
                                    <td>{{ $b->id }}</td>
                                    <td>{{ $b->name }}</td>
                                    <td>{{ $b->desc }}</td>
                                    <td>{{ $b->printPrices() }}</td>
                                    <td>
                                        <button
                                            data-id="{{ $b->id }}"
                                            data-name="{{$b->name}}"
                                            data-desc="{{ $b->desc }}"
                                            type="button"
                                            class="addPriceBtn py-1 px-2 rounded-circle btn btn-indigo mr-2 btn-sm m-0">
                                            <span class="mdi mdi-cash mdi-24px"></span></button>
                                        <button onclick="document.getElementById('delete_form_{{$b->id}}').submit()" type="button"
                                                class="py-1 px-2 rounded-circle btn btn-danger red darken-3 btn-sm m-0">
                                            <span class="mdi mdi-trash-can mdi-24px"></span></button>
                                        <form id="delete_form_{{$b->id}}" action="{{ route('bundles.destroy',$b->id) }}" method="post">@csrf @method('delete')</form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                {!! $bundles->links() !!}
            </div>
        </section>
    </div>

    {{--    Models--}}
    <!-- Modal -->
    <div class="modal fade" id="addBundle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">اضف بقاقة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bundles.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="md-form">
                            <label style="right: 0;left: initial" for="name">اسم الباقة</label>
                            <input required type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="md-form">
                            <label style="right: 0;left: initial" for="desc">وصف الباقة</label>
                            <input required type="text" id="desc" name="desc" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-sm btn-success green darken-3">حقظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addPriceModel" tabindex="-1" role="dialog" aria-labelledby="addPriceModel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">أضف اسعار الباقة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addPriceForm" method="post" action="{{ route('bundles.addPrice') }}" class="row align-items-center">
                        @csrf
                        <input type="hidden" id="bundle_id" name="id">
                        <div class="col-md-12">
                            <h6>اضف اسعار الباقة</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <select class="md-form mdb-select" name="car_type" id="car_type_input">
                                    <option selected disabled readonly="">اختر نوع السيارة</option>
                                    @foreach(\App\Models\CarType::all() as $car)
                                        <option value="{{$car->id}}">{{$car->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="md-form m-0">
                                    <input name="price" type="text" class="form-control mb-2 mr-sm-2" id="price_input"
                                           placeholder="السعر">
                                    <label class="sr-only" for="price_input">السعر</label>
                                </div>
                                <button type="submit" class="mt-2 p-1 btn btn-sm btn-primary">
                                    <span style="font-size: 18px" class="mdi mdi-plus p-0"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="prices-list" class="list-group">

                           </ul>
                        </div>
                    </div>
                </div>
                <form id="update_form" action="{{ route('bundles.update') }}" method="post">
                    @csrf @method("patch")
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form"><label for="b_name"></label><input placeholder="اسم الباقة" type="text" name="name" id="b_name" class="form-control"></div>
                                <div class="md-form"><label for="b_desc"></label><input placeholder="وصف الباقة" name="desc" id="b_desc" type="text" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">حسسنا</button>
                        <button type="submit" class="btn btn-sm btn-primary">حفظ التغيرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
        $(document).ready(function () {
            $(".addPriceBtn").click(function () {
                let name = $(this).data("name");
                let id = $(this).data("id");
                let desc = $(this).data("desc");
                $("#bundle-name").text(name);
                let new_action = encodeURI($("#update_form").attr("action")+'/'+id)
                $("#update_form").attr('action',new_action);
                $("#b_name").val(name);
                $("#b_desc").val(desc);
                $("#prices-list").empty();
                $("#bundle_id").val(id);
                $.ajax({
                    url:"{{ route('bundles.getPrices') }}/"+id,
                    success:function (res) {
                        if (res.length){
                            res.forEach(el=>{
                                let ele = `<li  class="list-group-item d-flex justify-content-between align-items-center">
                                    ${el.name} بسعر ${el.price}
                                    <button data-id='${el.id}' style="cursor: pointer" class="deletePrice bg-danger white-text"><span class="mdi mdi-trash-can"></span></button>
                                </li>`;
                                $("#prices-list").append(ele);
                            })
                        }
                    }
                })
                $("#addPriceModel").modal('show');
            })
            $(document).on('click',".deletePrice",function (e) {
                let id = $(this).data('id');
                $.ajax({
                    url: `{{ route('bundles.delPrices') }}/${id}`,
                    success: () => {
                        $(this).parent().slideUp(250).remove()
                    }
                })
            });
        })
    </script>
@endpush
@push('css')
    <style>
        .mdb-select {
            direction: ltr;
            text-align: left
        }

        .select-wrapper input.select-dropdown {
            text-align: center;
        }
    </style>
@endpush
