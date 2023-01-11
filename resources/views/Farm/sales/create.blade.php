@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>إضافة مبيعات</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">إضافة مبيعات</li>
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
                                        <h4 class="card-title">إضافة مبيعات</h4>
                                    </div>
                                    <div class="card-content">
                                        @include('includes.errors')

                                        <div class="card-body">
                                            <form class="form" method="POST" action="{{ route('storeSales') }}">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('post') }}

                                                <div class="row">

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="periodDate">التاريخ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="date" id="periodDate" class="form-control"
                                                            value="{{ old('periodDate') }}" required
                                                            placeholder="dd-mm-yyyy" name="periodDate">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="count">العدد
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="count" class="form-control"
                                                            step="1.0" value="{{ old('count') }}" required
                                                            placeholder="العدد" name="count">
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
                                                                    {{ old('category') == $cat->id ? 'selected' : '' }}>
                                                                    {{ $cat->category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="quantity">الكمية بالكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="quantity" class="form-control"
                                                            step="0.001" value="{{ old('quantity') }}" required
                                                            placeholder="الكمية بالكيلو" name="quantity">
                                                    </div>

                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="unitPrice">السعر للكيلو
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" id="unitPrice" class="form-control"
                                                            step="0.001" value="{{ old('unitPrice') }}" required
                                                            placeholder="السعر للكيلو" name="unitPrice">
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">إضافة</button>
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
