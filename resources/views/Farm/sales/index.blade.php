@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>كل المبيعات</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">كل المبيعات</li>
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
                                    <span class="col-md-6">كل المبيعات</span>
                                    <div class="col-md-6 text-start">
                                        <a href="{{ route('createSales') }}" class="btn btn-sm btn-success">
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
                                            <th class="text-center">التاريخ</th>
                                            <th class="text-center">الصنف</th>
                                            <th class="text-center">العدد</th>
                                            <th class="text-center">الكمية بالكيلو</th>
                                            <th class="text-center">السعر للكيلو</th>
                                            <th class="text-center">إجمالى السعر</th>

                                            <th class="text-center">الاكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['allSales'] as $index => $value)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $value->periodDate }}</td>
                                                <td class="text-center">{{ $value->category->category }}</td>
                                                <td class="text-center">{{ $value->count }}</td>
                                                <td class="text-center">{{ $value->quantity }}</td>
                                                <td class="text-center">{{ $value->unitPrice }}</td>
                                                <td class="text-center">{{ $value->totalPrice }}</td>
                                                <td class="text-center"style="width:fit-content;">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('editSales', $value->id) }}"><i
                                                            class="fas fa-edit mr-1"></i></a>
                                                    <form action="{{ route('deleteSales', $value->id) }}" method="POST"
                                                        class="" style="display:inline-block;">
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
