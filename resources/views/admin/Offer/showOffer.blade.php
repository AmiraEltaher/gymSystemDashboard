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
                <th scope="col"> اسم العرض</th>
                <th scope="col">السعر  </th>
                <th scope="col">المدة </th>
                <th scope="col">تاريخ البدء  </th>
                <th scope="col">تاريخ الانتهاء </th>
                <th scope="col"> المميزات </th>
            </tr>
        </thead>
        <tbody>

            <tr style="text-align: center">
                <td>{{ $offer->offerName}}</td>
                <td>{{ $offer->offerCost}}</td>
                <td>{{ $offer->offerDuration}}</td>
                <td>{{ $offer->offerStart}}</td>
                <td>{{ $offer->offerEnd}}</td>
                <td>{{ $offer->offerFeatures}}</td>



            </tr>

        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
