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
    @extends('admin.Head')
    {{-- @include('admin.Main-header') --}}
    {{-- @include('admin.Main-sidebar') --}}
    <div class="col-md-8" style="margin-top: 100px">
        <div>
            <h2 class="text-center"
                style="font-weight: bolder;background-color: black;color: white; padding: 10px ;border-radius: 15px">
                عرض كافه المدربين</h2>
        </div>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <div class="col-md-8">
        <table class="table" border="1.5">
            <thead style="background-color: rgb(248, 245, 245); color: white">
                <tr>
                    <th scope="col">رقم المدرب</th>
                    <th scope="col">صوره المدرب</th>
                    <th scope="col">اسم المدرب</th>
                    <th scope="col">رقم هاتف المدرب</th>
                    <th scope="col"> التدريبيه الوظيفه</th>
                    <th scope="col"> الشيفتات</th>
                    <th scope="col">عرض المدرب</th>
                    <th scope="col">تعديل المدرب</th>
                    <th scope="col">حذف المدرب</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coaches as $coach)
                    <tr style="text-align: center">
                        <th scope="row">{{ $coach->id }}</th>
                        <td><img src="{{ asset('assets/img/' . $coach->photoCoach) }}" width=70 height=70></td>
                        <td>{{ $coach->nameCoach }}</td>
                        <td>{{ $coach->phoneCoach }}</td>
                        <td>{{ $coach->shipCoach }}</td>
                        <td>{{ $coach->timeCoach }}</td>
                        <td><a href="{{ route('coaches.show', ['coach' => $coach->id]) }}"><i class="fa-solid fa-house"
                                    style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                        <td><a href="{{ route('coaches.edit', ['coach' => $coach->id]) }}"><i
                                    class="fa-solid fa-pen-to-square" style="font-size: 2.5rem;color: blue"></i></a></td>

                        {{-- The delete action should not be linked directly via an anchor tag like the show and edit actions because clicking on a link will usually trigger a GET request,
                    which is not suitable for a delete operation as it could lead to accidental deletion if a search engine follows the link.
                    Instead, you should use a form with the POST method or a form with the DELETE method (via a hidden input or a method spoofing technique) to trigger the delete action.
                    <td><a href="{{route('players.destroy', ['player' => $player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>
                --}}

                        <td>
                            <form action="{{ route('coaches.destroy', ['coach' => $coach->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirmDelete(event, {{ $coach->id }})"><i
                                        class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    {{-- @include('layouts.Footer') --}}
    @include('admin.Footerscripts')



    {{-- <script>
    function confirmDelete() {
        return confirm("هل تريد مسح هذا اللاعب؟!");
    }
</script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + coachId).submit();
                    // Handle delete action here, e.g., submit form or make AJAX request
                    // For example:
                    // document.getElementById('deleteForm').submit();
                    // or
                    // deleteRecord();
                    Swal.fire(
                        'Deleted!',
                        'Your record has been deleted.',
                        'success'
                    )
                }
            });
        }
    </script>





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
