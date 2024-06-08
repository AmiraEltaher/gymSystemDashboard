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
                تعديل لاعب </h2>
            <hr style="width: 50%;border: solid 3px blue" />
        </div>

        <form method="POST" action="{{ route('winners.update', $player->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-6">
                <table class="table" border="1.5">
                    <thead style="background-color: black; color: white">
                        <tr>
                            <th scope="col">اسم اللاعب</th>
                            <th scope="col">اسم البطولة</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center">
                            <td>{{ $player->namePlayer }}</td>

                            <td>
                                </select>
                                <select class="form-control" name="championship_id[]" id="" multiple="multiple">
                                    <option value=" ">Select Champion</option>
                                    @foreach ($champions as $champion)
                                        <option value="{{ $champion->id }}"
                                            {{ $player->champions->contains($champion->id) ? 'selected' : '' }}>
                                            {{ $champion->championName }}
                                        </option>
                                    @endforeach

                                </select>
                            </td>
                        </tr>

                    </tbody>


                </table>


            </div>





            <div class="col-md-12">
                <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه
                </button>
            </div>
        </form>
        =======
        @extends('admin.Head')
        @include('admin.Main-header')
        @include('admin.Main-sidebar')

        {{-- content --}}

        <div class="col-md-8" style="margin-top: 100px">
            <div class="col-md-12">
                <h2 class="text-center"
                    style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
                    تعديل لاعب </h2>
                <hr style="width: 50%;border: solid 3px blue" />
            </div>

            <form method="POST" action="{{ route('winners.update', $player->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <table class="table" border="1.5">
                        <thead style="background-color: black; color: white">
                            <tr>
                                <th scope="col">اسم اللاعب</th>
                                <th scope="col">اسم البطولة</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align: center">
                                <td>{{ $player->namePlayer }}</td>

                                <td>
                                    </select>
                                    <select class="form-control" name="championship_id" id="">
                                        <option value=" ">Select Champion</option>
                                        @foreach ($champions as $champion)
                                            <option value="{{ $champion->id }}"> {{ $champion->championName }}</option>
                                        @endforeach

                                    </select>
                                </td>
                            </tr>

                        </tbody>


                    </table>


                </div>





                <div class="col-md-12">
                    <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه
                    </button>
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

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
