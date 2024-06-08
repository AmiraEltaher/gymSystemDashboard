
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
                تعديل العرض</h2>
            <hr style="width: 50%;border: solid 3px blue" />
        </div>

        <form method="POST" action="{{ route('offers.update', ['offer' => $offer->id]) }}">
            @csrf
            @method('PUT')
            <div class="col-md-6">

                <div class="form-group ">
                    <label for="exampleInputPassword1"> اسم العرض</label>
                    <input type="text" name="offerName" class="form-control" spellcheck="false" id=""
                        style="text-align: center" value="{{ $offer->offerName }}">
                    @error('offerName')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> السعر</label>
                    <input type="number" name="offerCost" class="form-control" id="" style="text-align: center"
                        value="{{ $offer->offerCost }}">
                    @error('offerCost')
                        {{ $message }}
                    @enderror
                </div>


            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1"> المدة</label>
                    <input type="text" name="offerDuration" class="form-control" id=""
                        style="text-align: center" value="{{ $offer->offerDuration }}">
                    @error('offerDuration')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> تاريخ البدء</label>
                    <input type="date" name="offerStart" class="form-control" id="" style="text-align: center"
                        value="{{ $offer->offerStart }}" readonly>
                    @error('offerStart')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> تاريخ الانتهاء</label>
                    <input type="date" name="offerEnd" class="form-control" id="" style="text-align: center"
                        value="{{ $offer->offerEnd }}" readonly>
                    @error('offerEnd')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> المميزات </label>
                    <textarea id="offerFeatures" name="offerFeatures" rows="4" cols="50">
                    {{ $offer->offerFeatures }}
                  </textarea>
                    @error('offerFeatures')
                        {{ $message }}
                    @enderror
                </div>


            </div>
            <div class="col-md-12">
                <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">
                    تعديل</button>
            </div>
        </form>

@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
        تعديل العرض</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{route('offers.update', ['offer' => $offer->id])}}" >
        @csrf
        @method('PUT')
        <div class="col-md-6">

            <div class="form-group ">
                <label for="exampleInputPassword1">  اسم العرض</label>
                <input type="text" name="offerName" class="form-control" spellcheck="false" id="" style="text-align: center" value="{{ $offer->offerName}}" >
                @error('offerName')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> السعر</label>
                <input type="number" name="offerCost" class="form-control" id="" style="text-align: center" value="{{ $offer->offerCost}}" >
                @error('offerCost')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1"> المدة</label>
                <input type="text" name="offerDuration" class="form-control" id="" style="text-align: center" value="{{ $offer->offerDuration}}">
                @error('offerDuration')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> تاريخ البدء</label>
                <input type="date" name="offerStart" class="form-control" id="" style="text-align: center" value="{{ $offer->offerStart }}" readonly   >
                @error('offerStart')
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> تاريخ الانتهاء</label>
                <input type="date" name="offerEnd" class="form-control" id="" style="text-align: center" value="{{ $offer->offerEnd }}" readonly>
                @error('offerEnd')
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> المميزات </label>
                <textarea id="offerFeatures" name="offerFeatures" rows="4" cols="50">
                    {{ $offer->offerFeatures }}
                  </textarea>
                @error('offerFeatures')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">
                تعديل</button>
        </div>
    </form>








    </div>

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
@endsection
