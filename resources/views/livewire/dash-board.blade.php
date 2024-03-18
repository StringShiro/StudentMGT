<div>
    DashBoard
    <hr>
    <form>
    <button>Create</button>
    <button>Edit</button>
    <button>Delete</button>
    <button>Update</button>
    <hr>
        @foreach($allData as $ad)
        <br>
        <a href="javascript::void(0)" wire:click="addForm({{$ad->studentid}})">Add</a>
        <table>            
            <tr>
                <th>Student ID</th>
                <th>Student name</th>
                <th>Student number</th>
                <th>Student address</th>
                <th>Student email</th>
                <th>Student phone</th>
                <th>Student major</th>
                <th>Student avatar</th>
                <th>Actions<th>
            </tr>
                <tr>
                    <td>{{$ad->studentid}}</td>
                    <td>{{$ad->studentname}}</td>
                    <td>{{$ad->studentnumber}}</td>
                    <td>{{$ad->studentaddress}}</td>
                    <td>{{$ad->studentemail}}</td>
                    <td>{{$ad->studentphone}}</td>
                    <td>{{$ad->studentmajor}}</td>
                    <td>{{$ad->studentavatar}}</td>
                    <td>
                        <a href="" wire:click="editForm({{$ad->studentid}}")>Edit</a>
                        <a href="javascript::void(0)" wire:click="deleteForm({{$ad->studentid}})">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
</div>
