@extends('layouts.Head')
@include('layouts.Main-header')
@include('layouts.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض جدول اللاعبين</h2>
    </div>
    <hr style="width: 50%;border: solid 3px blue" />
</div>

<div class="col-md-8">
    <table class="table" border="1.5">
        <thead style="background-color: black; color: white">
            <tr>
                <th scope="col">رقم اللاعب</th>
                <th scope="col">صوره اللاعب</th>
                <th scope="col">اسم اللاعب</th>
                <th scope="col">رقم هاتف اللاعب</th>
                <th scope="col">عرض اللاعب</th>
                <th scope="col">تعديل اللاعب</th>
                <th scope="col">حذف اللاعب</th>
                <th scope="col">اشتراك اللاعب</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr style="text-align: center">
                <th scope="row">{{ $player->id}}</th>
                <td><img src="{{ asset('assets/img/'.$player->photoPlayer )}}" width="70" height="70"></td>
                <td>{{ $player->namePlayer}}</td>
                <td>{{ $player->phonePlayer}}</td>
                <td><a href="{{route('showPlayer',['id'=>$player->id])}}"><i class="fa-solid fa-house" style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                <td><a href="{{route('editPlayer',['id'=>$player->id])}}"><i class="fa-solid fa-pen-to-square" style="font-size: 2.5rem;color: blue"></i></a></td>
                <td><a href="{{route('deletePlayer',['id'=>$player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>

                <td>Otto</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layouts.Footerscripts')

{{-- @include('layouts.Footer') --}}