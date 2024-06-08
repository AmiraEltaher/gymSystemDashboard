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
    @include('layouts.insights')

    <!-- row -->
    @extends('admin.Head')
    {{-- @include('admin.Main-header')
    @include('admin.Main-sidebar') --}}

    {{-- content --}}

    <div class="col-md-8" style="margin-top: 100px">
        <div>
            <h2 class="text-center"
                style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
                عرض جدول اللاعبين</h2>
        </div>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <div class="col-md-8">
        <table class="table" border="1.5">
            <thead style="background-color: rgb(255, 255, 255); color: white; text-align: center">
                <tr>
                    <th scope="col">اسم اللاعب</th>
                    <th scope="col">عمر اللاعب</th>
                    <th scope="col">اسم البطولة</th>

                    <th scope="col">عرض </th>
                    <th scope="col">تعديل </th>
                    <th scope="col">حذف </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr style="text-align: center">

                        <td> {{ $player->namePlayer }}</td>
                        <td> {{ $player->agePlayer }}</td>
                        <td>
                            @foreach ($player->champions as $champion)
                                {{ $champion->championName }}
                                @if (!$loop->last)
                                    -
                                @endif
                                {{-- trim --}}
                            @endforeach
                        </td>
                        <td><a href="{{ route('winners.show', $player->id) }}"><i class="fa-solid fa-house"
                                    style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                        <td><a href="{{ route('winners.edit', $player->id) }}"><i class="fa-solid fa-pen-to-square"
                                    style="font-size: 2.5rem;color: blue"></i></a></td>

                        {{-- The delete action should not be linked directly via an anchor tag like the show and edit actions because clicking on a link will usually trigger a GET request,
                        which is not suitable for a delete operation as it could lead to accidental deletion if a search engine follows the link.
                        Instead, you should use a form with the POST method or a form with the DELETE method (via a hidden input or a method spoofing technique) to trigger the delete action.
                        <td><a href="{{route('players.destroy', ['player' => $player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>
                    --}}

                        <td>
                            <form action="{{ route('winners.destroy', ['winner' => $player->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash"
                                        style="font-size: 2.5rem;color: red"></i></button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
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
=======
@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center"
            style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض جدول المنتجات</h2>
    </div>
    <hr style="width: 50%;border: solid 3px blue" />
</div>

<div class="col-md-8">
    <table class="table" border="1.5">
        <thead style="background-color: black; color: white; text-align: center">
            <tr>
                <th scope="col">اسم اللاعب</th>
                <th scope="col">عمر اللاعب</th>
                <th scope="col">اسم البطولة</th>

                <th scope="col">عرض </th>
                <th scope="col">تعديل </th>
                <th scope="col">حذف </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
                <tr style="text-align: center">

                    <td> {{ $player->namePlayer }}</td>
                    <td> {{ $player->agePlayer }}</td>
                    <td>
                        @foreach ($player->champions as $champion)
                            {{ $champion->championName }} -
                            {{-- trim --}}
                        @endforeach
                    </td>
                    <td><a href="{{ route('winners.show', $player->id) }}"><i class="fa-solid fa-house"
                                style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                    <td><a href="{{ route('winners.edit', $player->id) }}"><i class="fa-solid fa-pen-to-square"
                                style="font-size: 2.5rem;color: blue"></i></a></td>

                    {{-- The delete action should not be linked directly via an anchor tag like the show and edit actions because clicking on a link will usually trigger a GET request,
                    which is not suitable for a delete operation as it could lead to accidental deletion if a search engine follows the link.
                    Instead, you should use a form with the POST method or a form with the DELETE method (via a hidden input or a method spoofing technique) to trigger the delete action.
                    <td><a href="{{route('players.destroy', ['player' => $player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>
                --}}

                    <td>
                        <form action="{{ route('winners.destroy', ['winner' => $player->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash"
                                    style="font-size: 2.5rem;color: red"></i></button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
