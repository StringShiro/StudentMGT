<div>
    <div>
    <form wire:submit.prevent="storeUser">
        @if(session()->has('success'))
            <div style="color: green">{{session('success')}}</div>
        @endif
        Name: <br>
        <input type="text" wire:model="name"><br>
        Email: <br>
        <input type="text" wire:model="email"><br>
        Password: <br>
        <input type="text" wire:model="password"><br>
        <hr>
        <button type="submit">Save</button>
    </form>
</div>

</div>
