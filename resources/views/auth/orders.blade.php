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
                                <th scope="col">التكلفة</th>
                                <th scope="col">اجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $or)
                                <tr>
                                    <td>{{ $or->id }}</td>
                                    <td>{{ $or->name }}</td>
                                    <td>{{ $or->bundle()->first()->name }}</td>
                                    <td>{{ $or->car()->first()->name }}</td>
                                    <td>{{ $or->state }}</td>
                                    <td>{{ $or->phone }}</td>
                                    <td>{{ $or->total }}</td>
                                    <td>
                                        <button data-obj="{{ $or->array() }}"
                                                class="modelOpen my-0 mx-0 btn btn-sm btn-purple"><span
                                                class="mdi mdi-eye"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="my-0 mb-0" >اسم العميل:<span id="o_name"></span></p>
                    <p class="my-0 mb-0" >رقم الهاتف:<span id="o_phone"></span></p>
                    <p class="my-0 mb-0" >المنطقة:<span id="o_state"></span></p>
                    <p class="my-0 mb-0" >العنوان:<span id="o_address"></span></p>
                    <p class="my-0 mb-0" >الباقة المطلوبة:<span id="o_bundle"></span></p>
                    <p class="my-0 mb-0" >نوع السيارة:<span id="o_car"></span></p>
                    <p class="my-0 mb-0" >اليوم المفضل للزيارة:<span id="o_day"></span></p>
                    <p class="my-0 mb-0" >السعاة المفضلة للزيارة:<span id="o_time"></span></p>
                    <p class="my-0 mb-0" >البريد الالكترونى:<span id="o_email"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">حسننا</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push("js")
    <script>
        $(document).ready(function () {
            $(".modelOpen").click(function (){
                let data = $(this).data("obj");
                $("#orderTitle").text(`طلب رقم #${data.id}`)
                $("#o_name").text(data.name);
                $("#o_phone").text(data.phone);
                $("#o_email").text(data.email);
                $("#o_day").text(data.day);
                $("#o_time").text(data.time);
                $("#o_car").text(data.car);
                $("#o_bundle").text(data.bundle);
                $("#o_address").text(data.address);
                $("#o_state").text(data.state);
                $("#orderModal").modal("show");
            })
        });
    </script>
@endpush
