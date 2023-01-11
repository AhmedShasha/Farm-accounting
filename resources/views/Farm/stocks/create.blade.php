@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>إضافه للخزينة</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">إضافه للخزينة</li>
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
                                    <div class="card-header">
                                        <h4 class="card-title">إضافه للخزينة</h4>
                                    </div>
                                    <div class="card-content">
                                        @include('includes.errors')

                                        <div class="card-body">
                                            <form class="form" method="POST" action="{{ route('storeStock') }}">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('post') }}

                                                <div class="row">

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="date">التاريخ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="date" id="date" class="form-control"
                                                            step="0.001" value="{{ old('date') }}" required
                                                            placeholder="التاريخ" name="date">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="supplyDestination">جهة التوريد
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" id="supplyDestination" class="form-control"
                                                            step="0.001" value="{{ old('supplyDestination') }}" required
                                                            placeholder="جهة التوريد" name="supplyDestination">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="category">الصنف
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="category" id="category" class="choices form-select"
                                                            dir="ltr">
                                                            <option value="">اختار</option>
                                                            @foreach ($data['allCat'] as $cat)
                                                                <option value="{{ $cat->id }}"
                                                                    {{ old($cat->id) == $cat->id ? 'selected' : '' }}>
                                                                    {{ $cat->category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="inComingQuantity">كمية الوارد بالكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="inComingQuantity" class="form-control"
                                                            step="0.001" value="{{ old('inComingQuantity') }}" required
                                                            placeholder="كمية الوارد بالكيلو" name="inComingQuantity">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="inComingUnitPrice">سعر الوارد للكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="inComingUnitPrice" class="form-control"
                                                            step="0.001" value="{{ old('inComingUnitPrice') }}" required
                                                            placeholder="سعر الوارد للكيلو" name="inComingUnitPrice">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="outComingQuantity">كمية المنصرف بالكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="outComingQuantity" class="form-control"
                                                            step="0.001" value="{{ old('outComingQuantity') }}" required
                                                            placeholder="كمية المنصرف بالكيلو" name="outComingQuantity">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="outComingUnitPrice">سعر المنصرف للكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="outComingUnitPrice" class="form-control"
                                                            step="0.001" value="{{ old('outComingUnitPrice') }}" required
                                                            placeholder="سعر المنصرف للكيلو" name="outComingUnitPrice">
                                                    </div>

                                                    {{-- <div class="form-group col-md-3 col-6">
                                                        <label for="unitOfMeasure">الوحدة
                                                            <span class="text-danger">*</span>
                                                        </label>

                                                        <select name="unitOfMeasure" id="unitOfMeasure"
                                                            class="choices form-select" dir="ltr">
                                                            <option value="">اختار</option>
                                                            <option
                                                                value="جم"{{ old($cat->unitOfMeasure) == 'جم' ? 'selected' : '' }}>
                                                                جرام</option>
                                                            <option
                                                                value="كجم"{{ old($cat->unitOfMeasure) == 'كجم' ? 'selected' : '' }}>
                                                                كيلو جرام</option>
                                                            <option
                                                                value="طن"{{ old($cat->unitOfMeasure) == 'طن' ? 'selected' : '' }}>
                                                                طن</option>
                                                        </select>
                                                    </div> --}}

                                                    <div class="form-group col-md-12 col-12">
                                                        <label for="note">البيان
                                                            {{-- <span class="text-danger">*</span> --}}
                                                        </label>
                                                        <textarea id="note" class="form-control" rows="4" placeholder="البيان" name="note">{{ old('note') }}</textarea>
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
