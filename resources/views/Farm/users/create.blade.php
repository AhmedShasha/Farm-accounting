@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>تسجيل مستخدم جديد</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">تسجيل مستخدم جديد</li>
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
                                        <h4 class="card-title">إضافه مستخدم</h4>
                                    </div>
                                    <div class="card-content">
                                        @include('includes.errors')

                                        <div class="card-body">
                                            <form class="form" method="POST" action="{{ route('storeUser') }}">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('post') }}

                                                <div class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="name">الاسم
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="name" class="form-control"
                                                                required placeholder="الاسم" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email">الايميل
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="email" id="email" class="form-control"
                                                                required placeholder="الايميل" name="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="password">كلمه السر
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" id="password" class="form-control"
                                                                required placeholder="كلمة السر" name="password">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="password_confirmation">تأكيد كلمه السر
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" id="password_confirmation" required
                                                                class="form-control" placeholder="تأكيد كلمة السر"
                                                                name="password_confirmation">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-12 m-auto">
                                                        <label for="role">الوظيفه
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-check col-2 m-2">
                                                            <input class="form-check-input" type="radio" name="role"
                                                                id="role" value="admin">
                                                            <label class="form-check-label" for="role">
                                                                Admin
                                                            </label>
                                                        </div>
                                                        <div class="form-check col-2 m-2">
                                                            <input class="form-check-input" type="radio" name="role"
                                                                id="role" value="user">
                                                            <label class="form-check-label" for="role">
                                                                User
                                                            </label>
                                                        </div>
                                                        </div>
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
