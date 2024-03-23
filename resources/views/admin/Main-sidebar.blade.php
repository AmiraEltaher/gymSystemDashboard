@extends('admin.Head')

<nav class="navbar-default navbar-side " role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav " id="main-menu">
            <li class="text-center user-image-back">
                <img src="{{asset('assets/img/photo.jpg')}}" clagym.ss="img-responsive" style="width: 100% ; margin-top:50px" />
            </li>

            <li>
                <a href="{{ url('/') }}" style="font-weight: bold;font-size: 2rem"> الصفحه الرئيسيه
                    <i class="fa fa-desktop "></i> </a>
            </li>
            <li>
                <a href="#" style="font-weight: bold;font-size: 2rem">اللاعبين<i class="fa fa-edit"></i><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ url('players/create') }}">اضافه لاعب جديد</a>
                    </li>

                    <li>
                        <a href="{{ url('players') }}">عرض جدول اللاعبين</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#" style="font-weight: bold;font-size: 2rem">المدربين<i class="fa fa-edit "></i><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ url('Addcoach') }}">اضافه مدرب جديد</a>
                    </li>

                    <li>
                        <a href="{{ url('Viewcoach') }}">عرض كافه المدربين</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#" style="font-weight: bold;font-size: 2rem">QRباركود <i class="fa fa-edit "></i> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ url('qr') }}">Qr الحصول علي </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#" style="font-weight: bold;font-size: 2rem">الوظائف التدريبيه<i class="fa fa-edit "></i>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ url('Addcoach') }}">اضافه بيانات الوظيفه</a>
                    </li>

                    <li>
                        <a href="{{ url('Viewcoach') }}">عرض كافه المدربين</a>
                    </li>

                </ul>
            </li>

        </ul>

    </div>

</nav>
