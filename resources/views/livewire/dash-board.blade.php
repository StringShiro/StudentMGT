<div>
    DashBoard
    <hr>
    <table>
        <tr>
            Sr NO.
        </tr>
        <tr>
            @foreach($allData as $ad)
                <td>{{$ad->$studentname}}</td>
                <td>{{$ad->$studentnumber}}</td>
                <td>{{$ad->$studentphone}}</td>
            @endforeach
        </tr>
    <table>
</div>
