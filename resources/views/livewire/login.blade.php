<div>
    <form wire:submit.prevent="loginUser">
        @if(session()->has('success'))
            <div style="color: green">{{session('success')}}</div>
        @endif
        Email: <br>
        <input type="text" wire:model="email"><br>
        @error('email')
            <span style="color: red">{{$message}}</span><br>
        @enderror
        Password: <br>
        <input type="text" wire:model="password"><br>
        @error('password')
            <span style="color: red">{{$message}}</span>
        @enderror
        <hr>
        <button type="submit">Login</button>
    </form>
</div>
