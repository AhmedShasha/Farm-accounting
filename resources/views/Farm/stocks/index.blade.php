@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>كل الخزينة</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">كل الخزينة</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    {{-- View List of Categories --}}
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <span class="col-md-6">كل الخزينة</span>
                                    <div class="col-md-6 text-start">
                                        <a href="{{ route('createStock') }}" class="btn btn-sm btn-success">
                                            إضافة
                                            <i class="bi fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Table Of Data --}}
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الصنف</th>
                                            <th class="text-center">جهة التوريد</th>
                                            {{-- <th class="text-center">الوحدة</th> --}}
                                            <th class="text-center">الكمية الوارد بالكيلو</th>
                                            <th class="text-center">سعر الوارد للكيلو</th>
                                            <th class="text-center">اجمالي الوارد</th>
                                            <th class="text-center">الكمية المنصرف بالكيلو</th>
                                            <th class="text-center">سعر المنصرف للكيلو</th>
                                            <th class="text-center">اجمالي المنصرف</th>
                                            <th class="text-center">المتبقي</th>
                                            <th class="text-center">البيان</th>
                                            <th class="text-center">التاريخ</th>
                                            <th class="text-center">الاكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['stocks'] as $index => $value)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $value->category->category }}</td>
                                                <td class="text-center">{{ $value->supplyDestination }}</td>
                                                {{-- <td class="text-center">{{ $value->unitOfMeasure }}</td> --}}
                                                <td class="text-center">{{ $value->inComingQuantity }}</td>
                                                <td class="text-center">{{ $value->inComingUnitPrice }}</td>
                                                <td class="text-center">{{ $value->inComingTotal }}</td>
                                                <td class="text-center">{{ $value->outComingQuantity }}</td>
                                                <td class="text-center">{{ $value->outComingUnitPrice }}</td>
                                                <td class="text-center">{{ $value->outComingTotal }}</td>
                                                <td class="text-center">{{ $value->residual }}</td>
                                                <td class="text-center">{{ $value->note }}</td>
                                                <td class="text-center">{{ $value->date }}</td>
                                                <td class="text-center"style="width:fit-content;">
                                                    <a class="btn btn-primary btn-sm m-1"
                                                        href="{{ route('editStock', $value->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form action="{{ route('deleteStock', $value->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                                            onclick="return confirm('تأكيد الحذف ؟!')"><i
                                                                class="fa fa-trash mr-1"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js') }} "></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
