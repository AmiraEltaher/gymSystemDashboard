@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            اضافه منتج جديد</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{ route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="form-group ">
                <label for=""> اضافه صوره </label>
                <input type="file" name="productImage" class="form-control" spellcheck="false" id="" style="text-align: center">
                @error('productImage')
                {{$message}}
                @enderror
            </div>

            <div class="form-group ">
                <label for="exampleInputPassword1">اضافه الاسم</label>
                <input type="text" name="productName" class="form-control" spellcheck="false" id="" style="text-align: center" value="{{old('namePlayer')}}">
                @error('productName')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">اضافه السعر</label>
                <input type="text" name="productCost" class="form-control" id="" style="text-align: center" value="{{old('agePlayer')}}">
                @error('productCost')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">اضافه الخصم %</label>
                <input type="text" name="productDiscount" class="form-control" id="" style="text-align: center" value="{{old('agePlayer')}}">
                @error('productDiscount')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">اضافه وصف النتج</label>
                <input type="text" name="productDescription" class="form-control" id="" style="text-align: center" value="{{old('phonePlayer')}}">
                @error('phonePlayer')
                {{$message}}
                @enderror
            </div>



        </div>
        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه منتج
                جديد</button>
        </div>
    </form>








</div>






@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
