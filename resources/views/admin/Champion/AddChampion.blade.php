@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
        اضافه بطولة جديدة</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{ route('champions.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group ">
                <label for="exampleInputPassword1">   اسم البطولة</label>
                <input type="text" name="championName" class="form-control" spellcheck="false" id="" style="text-align: center" value="{{old('championName')}}">
                @error('championName')
                {{$message}}
                @enderror
            </div>
        </div>


        </div>
        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه بطولة
                جديده</button>
        </div>
    </form>








</div>






@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
