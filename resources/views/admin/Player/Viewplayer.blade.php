@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center" style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض جدول اللاعبين</h2>
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
                <th scope="col">عرض اللاعب</th>
                <th scope="col">تعديل اللاعب</th>
                <th scope="col">حذف اللاعب</th>

                <th scope="col">اشتراك اللاعب</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr style="text-align: center">
                <th scope="row">{{ $player->id}}</th>
                <td><img src="{{ asset('assets/img/'.$player->photoPlayer )}}" width="70" height="70"></td>
                <td>{{ $player->namePlayer}}</td>
                <td>{{ $player->phonePlayer}}</td>
                <td><a href="{{route('players.show', ['player' => $player->id])}}"><i class="fa-solid fa-house" style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                <td><a href="{{route('players.edit', ['player' => $player->id])}}"><i class="fa-solid fa-pen-to-square" style="font-size: 2.5rem;color: blue"></i></a></td>

                {{-- The delete action should not be linked directly via an anchor tag like the show and edit actions because clicking on a link will usually trigger a GET request,
                    which is not suitable for a delete operation as it could lead to accidental deletion if a search engine follows the link.
                    Instead, you should use a form with the POST method or a form with the DELETE method (via a hidden input or a method spoofing technique) to trigger the delete action.
                    <td><a href="{{route('players.destroy', ['player' => $player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>
                --}}

                <td>
                    <form action="{{ route('players.destroy', ['player' => $player->id]) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="confirmDelete(event, {{ $player->id }})" ><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></button>
                    </form>
                </td>

                <td>Otto</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- <script>
    function confirmDelete() {
        return confirm("هل تريد مسح هذا اللاعب؟!");
    }
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + playerId).submit();
                // Handle delete action here, e.g., submit form or make AJAX request
                // For example:
                // document.getElementById('deleteForm').submit();
                // or
                // deleteRecord();
                Swal.fire(
                    'Deleted!',
                    'Your record has been deleted.',
                    'success'
                )
            }
        });
    }
</script>
