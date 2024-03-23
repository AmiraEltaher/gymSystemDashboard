@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            اضافه لاعب جديد</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{ route('winners.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <label for="">  اسم اللاعب </label>
            <select class="form-control" name="player_id" id="">

                <option value=" ">Select Player</option>
                @foreach($players as $player)
                <option value="{{ $player->id }}"> {{$player->namePlayer }}</option>
                @endforeach

            </select>
            <label for="">  اسم البطولة </label>
            <select class="form-control" name="championship_id" id="">
                <option value=" ">Select Champion</option>
                @foreach($champions as $Champion)
                <option value="{{ $Champion->id }}"> {{$Champion->championName }}</option>
                @endforeach

            </select>


        </div>





        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه
                </button>
        </div>
    </form>








</div>






@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
