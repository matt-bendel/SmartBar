@include('header')
<div style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <p style="font-size: 70px; text-align: left; color: white; font-weight: bold">Thank you for you order!</p>
    <p style="font-size: 25px; color: white">Please allow SmartBar a few moments to process and fulfill your order.</p>
{{--    <div style="height: 150px; width: 150px; margin-left: 55%">--}}
{{--        <div class="loader"></div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-md-6">
            <p style="color: white; font-size: 40px; font-weight: bold">
                We hope you enjoy your order! Have a great day and come back soon.
            </p>
        </div>
        <div class="col-md-6">
            <img src="{{url('/images/having-fun.svg')}}" />
        </div>
    </div>
    <div style="text-align: center; margin-top: 25px;">
        <p style="color: white; font-size: 20px;">When your drink is complete, hit the button below.</p>
        <div class="btn">
            <?php $first = true; ?>
            @foreach($order as $o)
                <?php if ($first) {
                    ?>
                    <a href="{{url('/orders/' . $o->id . '/delete')}}">Complete Order</a>
                <?php
                }
                ?>
            @endforeach
        </div>
    </div>
</div>
@include('center')
@include('footer')
