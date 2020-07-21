<?php
$first = true;
?>
@include('header')
<div style="width: 80%; margin-left: 10%; margin-right: 80%; margin-top: 50px;">
    <p style="font-size: 70px; text-align: left; color: white; font-weight: bold">Place Your Order</p>
@foreach($drinks as $drink)
    <div class="row" style="margin-top: 25px;">
        <div class="col-md-4">
            <img style="height: 250px; width: 250px;" src="{{url($drink->image)}}" />
        </div>
        <div class="col-md-4" style="color: white">
            <h3 style="font-weight: bold">{{$drink->name}} <a href="{{url('/order/delete/' . $drink->id)}}" style="color: white">(remove)</a></h3>
            <p style="font-size: 20px; margin: 0; font-weight: bold;">Liquors</p>
            @foreach($ingredients[$drink->name] as $ingredient)
                @if($ingredient->liquor_percentage != 0.00)
                    <p style="margin: 0"><span style="font-weight: bold;">{{$ingredient->name}}</span>: {{$ingredient->num_servings}} shots</p>
                    <p style="margin: 0; margin-bottom: 5px; margin-left: 5px;">Amount Left: {{$ingredient->amount}}</p>
                @endif
            @endforeach
            @foreach($ingredients[$drink->name] as $ingredient)
                @if($ingredient->liquor_percentage == 0.00)
                    <?php
                    if ($first) {
                        $first = false;
                        ?>
                        <p style="font-size: 20px; margin: 0; font-weight: bold;">Mixers</p>
                    <?php
                    }
                    ?>
                    <p style="margin: 0;"><span style="font-weight: bold;">{{$ingredient->name}}</span>: {{$ingredient->num_servings}}ml</p>
                    <p style="margin: 0; margin-bottom: 5px; margin-left: 5px;">Amount Left: {{$ingredient->amount}}</p>
                @endif
            @endforeach
            <?php
            $first = true;
            ?>
        </div>
        @if($ingredients['in_stock'])
            {{$ingredients['in_stock']}}
            <div class="col-md-4">
                <div class="btn" style="margin-top: 75px;">
                    <a href="{{url('/order/create/' . $drink->id)}}">Order</a>
                </div>
            </div>
        @else
            <p style="color: white; font-size: 18px;">Out of Stock</p>
            <div class="col-md-4">
                <div class="btn" style="margin-top: 75px;">
                    <a>Order</a>
                </div>
            </div>
        @endif
    </div>
@endforeach
    <div style="align-self: center; margin-top: 25px;">
        {{$drinks->links()}}
    </div>
    <div style="text-align: center">
        <div class="btn" style="opacity: 1; margin-top: 20px; width: 250px; align-self: center">
            <a href="{{url('/drinks/add')}}">
                + Add New Drink
            </a>
        </div>
    </div>
</div>
@include('center')
@include('footer')
