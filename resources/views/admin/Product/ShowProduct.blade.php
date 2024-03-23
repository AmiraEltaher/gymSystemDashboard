@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض المنتج</h2>
    </div>
    <hr style="width: 50%;border: solid 3px blue" />
</div>

<div class="col-md-8">
    <table class="table" border="1.5">
        <thead style="background-color: black; color: white">
            <tr style="text-align: center">
                <th scope="col">اسم المنتج</th>
                <th scope="col">صوره المنتج</th>
                <th scope="col">وصف المنتج</th>
                <th scope="col"> سعر المنتج</th>
                <th scope="col">  الخصم</th>
            </tr>
        </thead>
        <tbody>

            <tr style="text-align: center">
                <td>{{ $product->productName}}</td>
                <td><img src="{{ asset('assets/img/'.$product->productImage )}}" width="70" height="70"></td>
                <td>{{ $product->productDescription}}</td>
                <td>{{ $product->productCost}}</td>
                <td>{{ $product->productImage}}</td>



            </tr>

        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
