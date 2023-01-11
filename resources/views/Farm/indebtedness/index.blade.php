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

                    {{-- Create New One --}}
                    <section id="Add Category">
                        <div class="row match-height">
                            <div class="col-12 m-auto">
                                <div class="card">
                                    <div class="card-header col-12 m-auto row">
                                        <h4 class="card-title col-6">إضافه مديونية</h4>
                                        <div class="col-6 text-start">
                                            <a href="{{route('inventory')}}" class="btn btn-success">عرض الجرد</a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        @include('includes.errors')

                                        <div class="card-body">
                                            <form class="form" method="POST" action="{{ route('storeIndebtedness') }}">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('post') }}

                                                <div class="row">

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="category">الصنف
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="category" id="category" class="choices form-select"
                                                            dir="ltr">
                                                            <option value="">اختار</option>
                                                            @foreach ($data['categories'] as $cat)
                                                                <option value="{{ $cat->id }}"
                                                                    {{ old($cat->id) == $cat->id ? 'selected' : '' }}>
                                                                    {{ $cat->category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 col-12">
                                                        <label for="amount">قيمة المديونية
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" step="0.001" id="amount" class="form-control" required
                                                            placeholder="قيمة المديونية" name="amount">
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">إضافه</button>
                                                        <a href="{{ url()->previous() }}"
                                                            class="btn btn-light-secondary me-1 mb-1">عودة</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- View List of Categories --}}
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <span class="col-md-6">كل المديونيات</span>

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
                                            <th class="text-center">#</th>
                                            <th class="text-center">الصنف</th>
                                            <th class="text-center">قيمة المدوينية</th>
                                            <th class="text-center">الاكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['indebtedness'] as $index => $value)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $value->category->category }}</td>

                                                <td class="text-center">{{ number_format($value->amount , 2) }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('editIndebtedness', $value->id) }}"><i
                                                            class="fas fa-edit mr-1"></i></a>
                                                    <form action="{{ route('deleteIndebtedness', $value->id) }}" method="POST"
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
