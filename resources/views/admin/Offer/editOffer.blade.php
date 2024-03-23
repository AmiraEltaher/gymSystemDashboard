@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
        تعديل العرض</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{route('offers.update', ['offer' => $offer->id])}}" >
        @csrf
        @method('PUT')
        <div class="col-md-6">

            <div class="form-group ">
                <label for="exampleInputPassword1">  اسم العرض</label>
                <input type="text" name="offerName" class="form-control" spellcheck="false" id="" style="text-align: center" value="{{ $offer->offerName}}" >
                @error('offerName')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> السعر</label>
                <input type="number" name="offerCost" class="form-control" id="" style="text-align: center" value="{{ $offer->offerCost}}" >
                @error('offerCost')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1"> المدة</label>
                <input type="text" name="offerDuration" class="form-control" id="" style="text-align: center" value="{{ $offer->offerDuration}}">
                @error('offerDuration')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> تاريخ البدء</label>
                <input type="date" name="offerStart" class="form-control" id="" style="text-align: center" value="{{ $offer->offerStart }}" readonly   >
                @error('offerStart')
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> تاريخ الانتهاء</label>
                <input type="date" name="offerEnd" class="form-control" id="" style="text-align: center" value="{{ $offer->offerEnd }}" readonly>
                @error('offerEnd')
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> المميزات </label>
                <textarea id="offerFeatures" name="offerFeatures" rows="4" cols="50">
                    {{ $offer->offerFeatures }}
                  </textarea>
                @error('offerFeatures')
                {{$message}}
                @enderror
            </div>


        </div>
        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">
                تعديل</button>
        </div>
    </form>








</div>






@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
