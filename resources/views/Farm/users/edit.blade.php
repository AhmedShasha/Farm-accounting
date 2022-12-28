@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-first">
                                <h3>تعديل مستخدم</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 d-flex justify-content-end">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a>Farm</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">تعديل مستخدم</li>
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
                                        <h4 class="card-title">تعديل مستخدم</h4>
                                    </div>
                                    <div class="card-content">
                                        @include('includes.errors')

                                        <div class="card-body">
                                            <form class="form" method="POST" action="{{ route('updateUser',$user->id) }}">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('post') }}

                                                <div class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="name">الاسم
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="name" class="form-control" value="{{$user->name}}"
                                                                required placeholder="الاسم" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email">الايميل
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="email" id="email" class="form-control" value="{{$user->email}}"
                                                                required placeholder="الايميل" name="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-12 m-auto">
                                                        <label for="role">الوظيفه
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-check col-2 m-2">
                                                            <input class="form-check-input" type="radio" name="role" {{$user->role == 'admin'? 'checked':''}}
                                                                id="role" value="admin">
                                                            <label class="form-check-label" for="role">
                                                                Admin
                                                            </label>
                                                        </div>
                                                        <div class="form-check col-2 m-2">
                                                            <input class="form-check-input" type="radio" name="role" {{$user->role == 'user'? 'checked':''}}
                                                                id="role" value="user">
                                                            <label class="form-check-label" for="role">
                                                                User
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">تعديل</button>
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
