@extends('layouts.Head')
@include('layouts.Main-header')
@include('layouts.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            اضافه لاعب جديد</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{route('players.update', ['player' => $player->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="form-group ">
                <label for=""> اضافه صوره </label>
                <input type="file" name="photoPlayer" class="form-control" spellcheck="false" id="" style="text-align: center">
                @error('photoPlayer')
                {{$message}}
                @enderror
            </div>

            <div class="form-group ">
                <label for="exampleInputPassword1">اضافه الاسم</label>
                <input type="text" name="namePlayer" class="form-control" spellcheck="false" id="" style="text-align: center" value="{{$player->namePlayer}}">
                @error('namePlayer')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">اضافه السن</label>
                <input type="number" name="agePlayer" class="form-control" id="" style="text-align: center" value="{{$player->agePlayer}}">
                @error('agePlayer')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">اضافه العنوان</label>
                <input type="text" name="addresPlayer" class="form-control" id="" style="text-align: center" value="{{$player->addresPlayer}}">
                @error('addresPlayer')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">اضافه رقم الهاتف</label>
                <input type="text" name="phonePlayer" class="form-control" id="" style="text-align: center" value="{{$player->phonePlayer}}">
                @error('phonePlayer')
                {{$message}}
                @enderror
            </div>

            <div class="form-group ">
                <label for="exampleInputPassword1">الباركود الخاص بك</label>
                <button type="submit" class="btn  form-control" style="border: solid 1.5px black ">اظهار
                    الباركود الخاص بهذا اللاعب</button>
            </div>

        </div>
        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">
                تعديل</button>
        </div>
    </form>








</div>






@include('layouts.Footerscripts')

{{-- @include('layouts.Footer') --}}