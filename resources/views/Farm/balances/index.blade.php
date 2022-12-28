@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>رأس مال أول المدة</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">رأس مال أول المدة</li>
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
                                    <span class="col-md-6">رأس مال أول المدة</span>
                                    <div class="col-md-6 text-start">
                                        <a href="{{ route('createBalance') }}" class="btn btn-sm btn-success">
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
                                            <th class="text-center">كمية اول المدة بالكيلو</th>
                                            <th class="text-center">سعر الكيلو أول المدة</th>
                                            <th class="text-center">قيمة أول المدة</th>

                                            <th class="text-center">كمية المشتراه خلال الفترة</th>
                                            <th class="text-center">السعر</th>
                                            <th class="text-center">قيمة المشتراه خلال الفترة</th>

                                            <th class="text-center">كمية أخر المدة بالكيلو</th>
                                            <th class="text-center">سعر الكيلو أخر المدة</th>
                                            <th class="text-center">قيمة أخر المدة</th>

                                            <th class="text-center">كمية المنصرف خلال الفترة</th>
                                            <th class="text-center">السعر</th>
                                            <th class="text-center">قيمة المنصرف خلال الفترة</th>

                                            <th class="text-center">الاكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['balances'] as $index => $value)
                                            @if ($value->amountPurchases_DuringPeriod != '')
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $value->category }}</td>
                                                    <td class="text-center">{{ $value->quantity_FirstPeriod }}</td>
                                                    <td class="text-center">{{ $value->price_FirstPeriod }}</td>
                                                    <td class="text-center">{{ $value->amount_FirstPeriod }}</td>

                                                    <td class="text-center">{{ $value->quantityPurchases_DuringPeriod }}
                                                    </td>
                                                    <td class="text-center">{{ $value->pricePurchases_DuringPeriod }}</td>
                                                    <td class="text-center">{{ $value->amountPurchases_DuringPeriod }}</td>

                                                    <td class="text-center">{{ $value->quantity_LastPeriod }}</td>
                                                    <td class="text-center">{{ $value->price_LastPeriod }}</td>
                                                    <td class="text-center">{{ $value->amount_LastPeriod }}</td>

                                                    <td class="text-center">{{ $value->quantityOutcoming_DuringPeriod }}
                                                    </td>
                                                    <td class="text-center">{{ $value->priceOutcoming_DuringPeriod }}</td>
                                                    <td class="text-center">{{ $value->amountOutcoming_DuringPeriod }}</td>


                                                    <td class="text-center"style="width:fit-content;">
                                                        <a class="btn btn-primary btn-sm m-1"
                                                            href="{{ route('editBalance', $value->id) }}"><i
                                                                class="fas fa-edit "></i></a>
                                                        <form action="{{ route('deleteBalance', $value->id) }}"
                                                            method="POST" class="m-1" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm delete"
                                                                onclick="return confirm('تأكيد الحذف ؟!')"><i
                                                                    class="fa fa-trash "></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
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
