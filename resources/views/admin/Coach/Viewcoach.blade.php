@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')


<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px ;border-radius: 15px">
            عرض كافه المدربين</h2>
    </div>
    <hr style="width: 50%;border: solid 3px blue" />
</div>

<div class="col-md-8">
    <table class="table" border="1.5">
        <thead style="background-color: black; color: white">
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
                <td><img src="{{ asset('assets/img/'.$coach->photoCoach )}}" width=70 height=70></td>
                <td>{{ $coach->nameCoach }}</td>
                <td>{{ $coach->phoneCoach}}</td>
                <td>{{ $coach->shipCoach }}</td>
                <td>{{ $coach->timeCoach }}</td>
                <td><a href="{{route('showCoach', ['id' => $coach->id])}}"><i class="fa-solid fa-house" style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                <td><a href="{{ route('editCoach', ['id' => $coach->id])}}"><i class="fa-solid fa-pen-to-square" style="font-size: 2.5rem;color: blue"></i></a></td>
                <td><a href="{{ route('deleteCoach', ['id' => $coach->id]) }}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


{{-- @include('layouts.Footer') --}}
@include('admin.Footerscripts')
