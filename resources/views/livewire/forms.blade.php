<div>
    <form wire:submit.prevent="submit">
        @if(session()->has('success'))
            <div style="color: green">{{session('success')}}</div>
        @endif
        Name: <br>
        <input type="text" wire:model="name"><br>
        @error('name')
            <span style="color: red">{{$message}}</span><br>
        @enderror
        Email: <br>
        <input type="text" wire:model="email"><br>
        @error('email')
            <span style="color: red">{{$message}}</span>
        @enderror
        <hr>
        <button type="submit">Save</button>
    </form>
</div>
