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
                اضافه اشتراك جديد</h2>
            <hr style="width: 50%;border: solid 3px blue" />
        </div>

        <form method="POST" action="{{ route('sub.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="col-md-12" style="border-radius: 15px;padding: 15px;">



                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> اسم اللاعب</label>
                        <select id="inputState" name="player_id" class="form-control" style="text-align: center">
                            @foreach ($player as $item)
                                <option value="{{ $item->id }}">{{ $item->player_name }}</option>
                            @endforeach

                        </select>
                        @error('player_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> نوع الاشتراك</label>
                        <select name="subtype" class="form-control" id="subtype" onchange="toggleOffers(this.value)">
                            <option value="شهري">شهري</option>
                            <option value="سنوي">سنوي</option>
                            <option value="عرض">العروضات</option>
                        </select>

                        @error('subtype')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6" id="offer_dev">
                        <label for="exampleInputPassword1"> العروضات</label>
                        <select id="inputState" name="offers_id" class="form-control" style="text-align: center">

                            @foreach ($offers as $item)
                                <option></option>
                                <option value="{{ $item->id }}">{{ $item->offer_name }}</option>
                            @endforeach
                        </select>


                        @error('offers_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> مبلغ الاشتراك </label>
                        <input type="number" name="basic_amount" id="basic_amount" class="form-control" id="">
                        @error('basic_amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> المبلغ المدفوع </label>
                        <input type="number" name="basic_paid" id="basic_paid" class="form-control" id="">
                        @error('basic_paid')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> المبلغ الباقي </label>
                        <input type="text" name="basic_rest" id="basic_rest" class="form-control" id=""
                            readonly>
                        @error('basic_rest')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> بدايه الاشتراك </label>
                        {{-- value="{{ $item->offer_start }}" --}}
                        <input type="date" name="start_subscription" id="start_subscription" class="form-control"
                            min="<?php echo date('Y-m-d'); ?>" onchange="calculateEndDate()">

                        @error('start_subscription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1"> نهايه الاشتراك </label>
                        {{-- value="{{  $item->offer_end }}" --}}
                        <input type="date" name="end_subscription" id="end_subscription" class="form-control"
                            min="<?php echo date('Y-m-d'); ?>" readonly>
                        @error('end_subscription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group col-md-12">
                        <button type="submit" name="add_player" class="btn bg-primary text-white form-control"
                            style="margin: auto;border-radius: 13px;height: 3.4rem;">
                            اضافه اشتراك جديد

                        </button>
                    </div>

                </div>

            </div>
    </div>

    </form>








    </div>







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



    <script>
        function toggleOffers(value) {
            // Add logic for handling "العروضات" option if needed
        }

        function calculateEndDate() {
            const startDateInput = document.getElementById('start_subscription');
            const endDateInput = document.getElementById('end_subscription');
            const subtype = document.getElementById('subtype').value;

            if (startDateInput.value) {
                const startDate = new Date(startDateInput.value);
                let endDate;

                if (subtype === 'شهري') {
                    endDate = new Date(startDate.setMonth(startDate.getMonth() + 1));
                } else if (subtype === 'سنوي') {
                    endDate = new Date(startDate.setFullYear(startDate.getFullYear() + 1));
                } else {
                    // Handle other cases if needed
                    return;
                }

                endDateInput.value = endDate.toISOString().split('T')[0];
            }
        }
    </script>

    <script>
        toggleOffers('شهري');

        function toggleOffers(type) {
            if (type == 'شهرس') {
                $('#offer_dev').attr('hidden', true);
            } else if (type == 'سنوي') {
                $('#offer_dev').attr('hidden', true);
            } else if (type == 'عرض') {
                $('#offer_dev').removeAttr('hidden');
            } else {
                $('#offer_dev').attr('hidden', true);
                console.log('please choose any type');
            }
        }
    </script>




    <script>
        // الحساب الآلي للمبلغ المتبقي
        function calculateRest() {
            var basicAmount = parseFloat(document.getElementById('basic_amount').value);
            var basicPaid = parseFloat(document.getElementById('basic_paid').value);

            // التحقق من أن القيم مدخلة بشكل صحيح
            if (!isNaN(basicAmount) && !isNaN(basicPaid)) {
                var rest = basicAmount - basicPaid;
                // تحديث قيمة المبلغ المتبقي
                document.getElementById('basic_rest').value = rest.toFixed(2);
            }
        }

        // استدعاء الدالة calculateRest() عندما يتم تغيير أي من الحقول
        document.getElementById('basic_amount').addEventListener('input', calculateRest);
        document.getElementById('basic_paid').addEventListener('input', calculateRest);

        // حساب المبلغ المتبقي عند تحميل الصفحة
        window.onload = function() {
            calculateRest();
        };
    </script>
@endsection
