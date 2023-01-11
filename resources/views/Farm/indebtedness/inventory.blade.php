@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6 order-md-1 order-first">
                                <h3>جرد أخر السنة</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">جرد أخر السنة</li>
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
                                    <span class="col-md-6">كل الجرد</span>

                                    <div class="col-md-6 text-start">
                                        {{-- <a href="{{ route('createUser') }}" class="btn btn-sm btn-success">
                                            إضافة
                                            <i class="bi fa-solid fa-plus"></i>
                                        </a> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                {{-- Table Of Data --}}

                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">قيمة المدوينيات</th>
                                            <th class="text-center">قيمة اخر المدة</th>
                                            <th class="text-center">قيمة المبيعات خلال السنة</th>
                                            <th class="text-center">صافي الربح</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                {{ $data['sumOfIndebtedness'] }}</td>
                                            <td class="text-center">
                                                {{ $data['sumOfLastPeriod'] }}</td>
                                            <td class="text-center">{{ $data['sumOfSales'] }}
                                            </td>
                                            <td class="text-center">
                                                {{ $data['allProfit'] }}
                                            </td>
                                        </tr>

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
