<div>
    <form wire:submit.prevent="edit">
        @if(session()->has('success'))
            <div style="color: green">{{session('success')}}</div>
        @endif
        Name: <br>
        <input type="text" wire:model="studentname"><br>
        Student number:<br>
        <input type="text" wire:model="studentnumber"><br>
        Address:<br>
        <input type="text" wire:model="studentaddress"><br>
        Email: <br>
        <input type="text" wire:model="studentemail"><br>
        Phone number:<br>
        <input type="text" wire:model="studentphone"><br>
        Major: <br>
        <input type="text" wire:model="studentmajor">
            <select>
                <option value="5">id 5: Công nghệ thông tin</option>
                <option value="6">id 6: Kỹ thuật ô tô</option>
                <option value="7">id 7: Y học</option>
                <option value="8">id 8: Quản lý nhà hàng</option>
                <option value="9">id 9: Tài chính - kinh tế</option>
            </select>
        <br>
        File upload: <br>
        <input type="file" accept="image/*" wire:model="studentavatar"><br>
        <hr>
        @if($isUpdate == false)
            <button wire:click="storeUser()" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">CREATE</button>
        @else
            <button wire:click="updateProfile()" type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">UPDATE</button>
        @endif
        <a href="/dashboard">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">BACK</button></a>

    </form>
</div>
