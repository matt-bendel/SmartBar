@include('header')
    <div>
        <div class="row" style="width: 80%; margin-left: 10%; margin-right: 10%;">
            <div class="col-md-8">
                <div style="margin-top: 100px;">
                    <p style="color: white; font-size: 18px; font-family: 'Courier New';">What drink would you like?</p>
                    <p style="font-size: 40px; font-weight: bold; color: white">Whether you want a delicious cocktail or
                        just a shot, Smart Bar Does it all!</p>
                    <div style="text-align: center">
                        <div class="btn" style="align-self: center; width: 300px;">
                            <a href="{{url('/order/drinks/1')}}" style="font-size: 30px;">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="text-align: center">
                <img style="height: 500px; width: 350px; margin-top: 25px; margin-left: 50px;" src="{{ url('/images/cocktail.png') }}">
            </div>
        </div>
    </div>
@include('center')
@include('footer')



