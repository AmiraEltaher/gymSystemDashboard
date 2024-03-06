@extends('layouts.Head')
@include('layouts.Main-header')
@include('layouts.Main-sidebar')


{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            اضافه مدرب جديد</h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>


    <form method="POST" action="{{ route('storecoach') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for=""> اضافه صوره </label>
                <input type="file" name="photoCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('photoCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">اضافه الاسم</label>
                <input type="text" name="nameCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('nameCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">اضافه السن</label>
                <input type="number" name="ageCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('ageCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">اضافه العنوان</label>
                <input type="text" name="addresCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('addresCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">اضافه رقم الهاتف</label>
                <input type="text" name="phoneCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('phoneCoach')
            {{$message}}
            @enderror

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1"> مواعيد العمل</label>
                <select id="inputState" name="timeCoach" class="form-control" style="text-align: center">
                    <option>صباحي</option>
                    <option>مسائي</option>
                </select>
            </div>
            @error('timeCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1"> الوظيفه التدريبيه</label>
                <input type="text" name="shipCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('shipCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1"> الراتب الشهري</label>
                <input type="number" name="salaryCoach" class="form-control" id="" style="text-align: center">
            </div>
            @error('salaryCoach')
            {{$message}}
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1"> الاجازات الرسميه للمدرب</label>
                <select id="inputState" name="freeCoach" class="form-control" style="text-align: center">
                    <option>السبت</option>
                    <option>الاحد</option>
                    <option>الاثنين</option>
                    <option>الثلاثاء</option>
                    <option>الاربعاء</option>
                    <option>الخميس</option>
                    <option>الجمعه</option>
                </select>

            </div>
            @error('freeCoach')
            {{$message}}
            @enderror

            <div class="form-group">
                <label for="exampleInputPassword1">الباركود الخاص بك</label>
                <button type="submit" class="btn  form-control" style="border: solid 1.5px black " name="QRCodeCoach">اظهار الباركود
                    الخاص بهذا المدرب</button>
            </div>

        </div>
        <div class="col-md-12">

            <button type="submit" name="addCoach" class="btn btn-primary form-control" style="margin: auto">اضافه مدرب
                جديد</button>
        </div>
    </form>






</div>





@include('layouts.Footer')


@include('layouts.Footerscripts')