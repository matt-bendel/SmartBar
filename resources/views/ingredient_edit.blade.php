@include('header')
<div>
    <div style="width: 80%; margin-left: 10%; margin-right: 10%;">
        @if($ingredient->liquor_percentage != 0.00)
            <h2 style="margin-top: 20px;">Sensor: {{$ingredient->position}}</h2>
        @else
            <h2 style="margin-top: 20px;">Pump: {{$ingredient->position}}</h2>
        @endif
        <form action="{{url('/ingredients/' . $ingredient->id)}}" method="POST">
            @csrf
            @method('PUT')
            <p>
                <label style="color: white" for="name">Name:</label>
                <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="name" value="{{$ingredient->name}}" />
            </p>
            <p>
                <label style="color: white" for="amount">Amount:</label>
                <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="amount" value="{{$ingredient->amount}}" />
            </p>
            <p>
                <label style="color: white" for="liquor_percent">Liquor Percentage:</label>
                <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="percent" value="{{$ingredient->liquor_percentage}}" />
            </p>
            <input type="submit" class="btn" value="Save Changes" name="submit" style="opacity: 1;"/>
        </form>
    </div>
</div>
@include('center')
@include('footer')


