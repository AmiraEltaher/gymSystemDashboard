@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض اللاعب</h2>
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
                <th scope="col">سن اللاعب</th>
                <th scope="col">عنوان اللاعب</th>
                <th scope="col">اشتراك اللاعب</th>
            </tr>
        </thead>
        <tbody>

            <tr style="text-align: center">
                <th scope="row">{{ $player->id}}</th>
                <td><img src="{{ asset('assets/img/'.$player->photoPlayer )}}" width="70" height="70"></td>
                <td>{{ $player->namePlayer}}</td>
                <td>{{ $player->phonePlayer}}</td>
                <td>{{ $player->agePlayer}}</i></a></td>
                <td>{{ $player->addresPlayer}}</td>


                <td>Otto</td>
            </tr>

        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
