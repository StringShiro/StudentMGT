<div>
    <h1>DashBoard</h1>
    <hr>
    <a href="/dashboard/register">
        <button type="button" class="btn btn-success">ADD</button>
    </a>
    <form wire:submit.prevent="updateForm">
        @foreach($allData as $ad)
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
                        <!-- Button trigger modal -->
                        <button type="button" wire:click="editForm({{$ad->studentid}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" wire:model="studentname" class="form-control" placeholder="Student name" aria-label="studentname"><br>
                                        <input type="text" wire:model="studentnumber" class="form-control" placeholder="Student number" aria-label="studentnumber"><br>
                                        <input type="text" wire:model="studentaddress" class="form-control" placeholder="Student address" aria-label="studentaddress"><br>
                                        <input type="text" wire:model="studentemail" class="form-control" placeholder="Student email" aria-label="studentemail"><br>
                                        <input type="text" wire:model="studentphone" class="form-control" placeholder="Student phone" aria-label="studentphone"><br>
                                        <input type="text" wire:model="studentmajor" class="form-control" placeholder="Student major" aria-label="studentmajor"><br>
                                        <input type="file" wire:model="studentavatar" accept="image/*" class="form-control" placeholder="Student avatar" aria-label="studentavatar">
                                    </div>
                                    <div class="modal-footer">
                                        @if($editform)
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close()">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        @else
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close()">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    <a href="javascript::void(0)" wire:click="deleteForm({{$ad->studentid}})">
                        <button type="button" class="btn btn-danger">DELETE</button>
                    </a>
                </td>
            </tr>
        </table>
        @endforeach
    </form>
</div>
