@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')

{{-- content --}}

<div class="col-md-8" style="margin-top: 100px">
    <div class="col-md-12">
        <h2 class="text-center"
            style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            تعديل لاعب </h2>
        <hr style="width: 50%;border: solid 3px blue" />
    </div>

    <form method="POST" action="{{ route('winners.update', $player->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="col-md-6">
            <table class="table" border="1.5">
                <thead style="background-color: black; color: white">
                    <tr>
                        <th scope="col">اسم اللاعب</th>
                        <th scope="col">اسم البطولة</th>

                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td>{{ $player->namePlayer }}</td>

                        <td>
                            </select>
                            <select class="form-control" name="championship_id" id="">
                                <option value=" ">Select Champion</option>
                                @foreach ($champions as $champion)
                                    <option value="{{ $champion->id }}"> {{ $champion->championName }}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>

                </tbody>


            </table>


        </div>





        <div class="col-md-12">
            <button type="submit" name="add-player" class="btn btn-primary form-control" style="margin: auto">اضافه
            </button>
        </div>
    </form>








</div>






@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
