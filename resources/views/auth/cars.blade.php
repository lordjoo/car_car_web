@extends('layouts.dash')
@push('title')
    انواع السيارات
@endpush
@section('page')
    <div class="container mt-3">'
        <section class="">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-10">
                    <h2>
                        انواع السيارات
                    </h2>
                </div>
                <div class="col-md-2">
                    <button data-toggle="modal" data-target="#addBundle" class="btn btn-sm btn-primary" style="font-size: 14px">
                        <span class="mdi mdi-plus "></span>
                        اضف سيارة
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
                                <th scope="col">السيارة</th>
                                <th scope="col">اجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $b)
                                <tr>
                                    <td>{{ $b->id }}</td>
                                    <td>{{ $b->name }}</td>
                                    <td>
                                        <button
                                            data-id="{{ $b->id }}"
                                            data-name="{{$b->name}}"
                                            type="button" class="addPriceBtn py-1 px-2 rounded-circle btn btn-indigo mr-2 btn-sm m-0">
                                            <span class="mdi mdi-pencil mdi-24px"></span></button>
                                        <a href="{{ route('cars.destroy',$b->id) }}" type="button"
                                           class="confirm-del py-1 px-2 rounded-circle btn btn-danger red darken-3 btn-sm m-0"><span class="mdi mdi-trash-can mdi-24px"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                {!! $cars->links() !!}
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
                <form action="{{ route('cars.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="md-form">
                            <label style="right: 0;left: initial" for="name">نوع السيارة</label>
                            <input required type="text" id="name" name="name" class="form-control">
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
                <form method="post" id="updateForm" action="">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="md-form">
                            <label style="right: 0;left: initial" for="update_name">نوع السيارة</label>
                            <input required type="text" id="update_name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-sm btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(".addPriceBtn").click(function () {
                let name = $(this).data("name");
                let id = $(this).data("id");
                $("#update_name").val(name);
                $("#addPriceModel label").toggleClass("active");
                $("#updateForm").attr("action","{{ route('cars.update') }}/"+id);
                $("#addPriceModel").modal('show');

            })

        })
    </script>
@endpush
