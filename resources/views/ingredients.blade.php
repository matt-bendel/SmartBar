@include('header')
<div>
    <div style="width: 80%; margin-left: 10%; margin-right: 10%;">
        <p style="color: white; font-size: 70px; font-weight: bold;">Configure Liquors and Mixers</p>
        <h2 style="margin-top: 20px;">Liquors</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Alcohol Percent</th>
                    <th>Amount</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
            @foreach($ingredients as $key => $value)
                @if($value->type === 'liquor')
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->liquor_percentage}}%</td>
                        <td>{{$value->amount}} (shots)</td>
                        <td>Sensor: {{$value->position}}</td>
                        <td>
                            <div class="btn" style="width: 100px;">
                                <a href="{{ url('/ingredients/' . $value->id) }}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('center')
<div>
    <div style="width: 80%; margin-left: 10%; margin-right: 10%;">
        <h2 style="margin-top: 20px;">Mixers</h2>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Position</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ingredients as $key => $value)
                @if($value->type === 'mixer')
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->amount}} (ml)</td>
                        <td>Pump: {{$value->position}}</td>
                        <td>
                            <div class="btn" style="width: 100px;">
                                <a href="{{ url('/ingredients/' . $value->id) }}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div style="height: 80px;"></div>
@include('footer')


