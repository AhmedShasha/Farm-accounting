<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="">
                <div class="logo row">
                    <a href="" class="col-md-2 m-auto"><img src="{{ asset('dist/assets/images/logo/logo.png') }}" alt="Logo" srcset="">
                    </a>
                    <h4 class="col-md-10 mt-3">المزرعة</h4>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item  active">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fa-solid fa-house-chimney m-1"></i>
                        <span>لوحة التحكم</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{ route('allCategories') }}" class='sidebar-link'>
                        <i class="bi fa-solid fa-layer-group m-1"></i>
                        <span>الاصناف</span>
                    </a>
                    <!--  <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="">
                                كل الاصناف</a>
                        </li>
                    </ul>  -->
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fa-solid fa-dollar-sign m-1"></i>
                        <span>رأس المال</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{route('allFirstPeriod')}}">
                                رأس مال أول المدة</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('allLastPeriod')}}">
                                رأس مال أخر المدة</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('createFirst_LastPeriod')}}">
                                إدخال جديد</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fa-solid fa-wallet m-1"></i>
                        <span>الخزينة</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{route('allStocks')}}">
                                كل الخزينة</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('createStock')}}">
                                إضافة للخزينة</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fa-solid fa-cart-plus m-1"></i>
                        <span>المبيعات</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{route('allSales')}}">
                                كل المبيعات</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('createSales')}}">
                                إضافة مبيعات جديدة</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fa-solid fa-square-plus m-1"></i>
                        <span>أرصدة المخزون</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{route('allBalances')}}">
                                كل أرصدةالمخزون</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('createBalance')}}">
                                إضافة رصيد جديد</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('allIndebtedness')}}" class='sidebar-link'>
                        <i class="bi fas fa-hand-holding-usd m-1"></i>
                        <span>جرد أخر السنة</span>
                    </a>
                </li>

                <hr>

                @if (Auth::user()->role == 'admin')
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi fas fa-users m-1"></i>
                            <span>المستخدمين</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="{{ route('allUsers') }}">
                                    كل المستخدمين</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('createUser') }}">
                                    تسجيل مستخدم جديد</a>
                            </li>

                        </ul>
                    </li>
                @endif

                <li class="sidebar-item ">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="dropdown-item sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class=" bi fas fa-sign-out-alt"></i>
                            <span>تسجيل خروج</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

    </div>
</div>
