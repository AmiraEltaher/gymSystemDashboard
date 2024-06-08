@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                <p class="mg-b-0">Sales monitoring dashboard template.</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">Customer Ratings</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">Online Sales</label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">Offline Sales</label>
                <h5>783,675</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    {{-- @include('layouts.insights') --}}

    <!-- row -->
    @extends('admin.Head')
    {{-- @include('admin.Main-header')
    @include('admin.Main-sidebar') --}}

    {{-- content --}}

    <div class="col-md-8" style="margin-top: 100px">
        <div class="col-md-12">
            <h2 class="text-center"
                style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
                تعديل مدرب </h2>
            <hr style="width: 50%;border: solid 3px blue" />
        </div>


        <form method="POST" action="{{ route('coaches.update', ['coach' => $coach->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-6">
                <div class="form-group">
                    <label for=""> اضافه صوره </label>
                    <input type="file" name="photoCoach" class="form-control" id="" style="text-align: center">
                    @error('photoCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">اضافه الاسم</label>
                    <input type="text" name="nameCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->nameCoach }}">
                    @error('nameCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">اضافه السن</label>
                    <input type="number" name="ageCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->ageCoach }}">
                    @error('ageCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">اضافه العنوان</label>
                    <input type="text" name="addresCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->addresCoach }}">
                    @error('addresCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">اضافه رقم الهاتف</label>
                    <input type="text" name="phoneCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->phoneCoach }}">
                    @error('phoneCoach')
                        {{ $message }}
                    @enderror
                </div>


            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1"> مواعيد العمل</label>
                    <select id="inputState" name="timeCoach" class="form-control" style="text-align: center">

                        <option value="صباحي" {{ $coach->timeCoach == 'صباحي' ? 'selected' : '' }}>صباحي</option>
                        <option value="مسائي" {{ $coach->timeCoach == 'مسائي' ? 'selected' : '' }}>مسائي</option>
                    </select>
                    @error('timeCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> الوظيفه التدريبيه</label>
                    <input type="text" name="shipCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->shipCoach }}">
                    @error('shipCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> الراتب الشهري</label>
                    <input type="number" name="salaryCoach" class="form-control" id="" style="text-align: center"
                        value="{{ $coach->salaryCoach }}">
                    @error('salaryCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> الاجازات الرسميه للمدرب</label>
                    <select id="inputState" name="freeCoach" class="form-control" style="text-align: center">
                        <option {{ $coach->freeCoach == 'السبت' ? 'selected' : '' }}>السبت</option>
                        <option {{ $coach->freeCoach == 'الاحد' ? 'selected' : '' }}>الاحد</option>
                        <option {{ $coach->freeCoach == 'الاثنين' ? 'selected' : '' }}>الاثنين</option>
                        <option {{ $coach->freeCoach == 'الثلاثاء' ? 'selected' : '' }}>الثلاثاء</option>
                        <option {{ $coach->freeCoach == 'الاربعاء' ? 'selected' : '' }}>الاربعاء</option>
                        <option {{ $coach->freeCoach == 'الخميس' ? 'selected' : '' }}>الخميس</option>
                        <option {{ $coach->freeCoach == 'الجمعه' ? 'selected' : '' }}>الجمعه</option>
                    </select>
                    @error('freeCoach')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">الباركود الخاص بك</label>
                    <button type="submit" class="btn  form-control" style="border: solid 1.5px black "
                        name="QRCodeCoach">اظهار الباركود
                        الخاص بهذا المدرب</button>
                </div>

            </div>
            <div class="col-md-12">

                <button type="submit" name="addCoach" class="btn btn-primary form-control" style="margin: auto"> تعديل
                </button>
            </div>
        </form>






<<<<<<< HEAD
    </div>
=======
</div>
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea





<<<<<<< HEAD

    @include('admin.Footerscripts')

    {{-- @include('layouts.Footer') --}}

    <!-- row closed -->

    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection

@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
=======
@include('admin.Footer')


@include('admin.Footerscripts')
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
