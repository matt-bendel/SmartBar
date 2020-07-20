@include('header')
<div>
    <div style="width: 80%; margin-left: 10%; margin-right: 10%;">
        <p style="color: white; font-size: 70px; font-weight: bold;">Create Your Perfect Drink</p>
        <div class="row">
            <div class="col-md-6">
                <div style="color: white">
                    <h2>Images</h2>
                    <p style="font-size: 20px;">This will be added manually later</p>
                </div>
                <form method="POST" action="{{url('/drinks/add')}}">
                    @csrf
                    <div style="color: white">
                        <h2>Name</h2>
                        <p>
                            <label style="color: white" for="name">Drink Name:</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="name" value="" placeholder="Drink Name Here" />
                        </p>
                    </div>
                    <div style="color: white">
                        <h2>Liquors</h2>
                        <p style="font-size: 20px;">Add up to three liquors (for options not used select 'none')</p>
                        <p>
                            <label style="color: white" for="liquor1">First Liquor:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="liquor1">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage != 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label style="color: white" for="liq1_amount">Number of shots (4 max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="4"  min="0"name="liq1_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="liquor2">Second Liquor:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="liquor2">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage != 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label style="color: white" for="liq2_amount">Number of shots (4 max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="4" min="0" name="liq2_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="liquor3">Third Liquor:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="liquor3">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage != 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label style="color: white" for="liq3_amount">Number of shots (4 max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="4" min="0" name="liq3_amount" value="0" />
                        </p>
                    </div>
                    <div style="color: white">
                        <h2>Mixers</h2>
                        <p style="font-size: 20px;">Add up to five mixers (for options not used select 'none')</p>
                        <p>
                            <label style="color: white" for="mixer1">First Mixer:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="mixer1">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage == 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <label style="color: white" for="mix1_amount">Amount (300ml max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="300" min="0" name="mix1_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="mixer2">Second Mixer:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="mixer2">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage == 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <label style="color: white" for="mix2_amount">Amount (300ml max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" max="300" min="0" type="text" name="mix2_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="mixer3">Third Mixer:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="mixer3">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage == 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <label style="color: white" for="mix3_amount">Amount (300ml max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="300" min="0" name="mix3_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="mixer4">Fourth Mixer (300ml max):</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="mixer4">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage == 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <label style="color: white" for="mix4_amount">Amount (300ml max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="300" min="0" name="mix4_amount" value="0" />
                        </p>
                        <p>
                            <label style="color: white" for="mixer5">Fifth Mixer:</label>
                            <select style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" name="mixer5">
                                <option value="0">None</option>
                                @foreach($ingredients as $ingredient)
                                    @if($ingredient->liquor_percentage == 0.00)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <label style="color: white" for="mix5_amount">Amount (300ml max):</label>
                            <input style="margin-left: 20px; width: 250px; border-radius: 8px;" type="text" max="300" min="0" name="mix5_amount" value="0" />
                        </p>
                    </div>
                    <div style="text-align: center">
                        <input style="opacity: 0.9" type="submit" name="submit" value="+ Add Drink" class="btn" />
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img style="height: 500px; width: 500px; border-radius: 30px; transform: rotate(5deg); margin-top: 25px;" src="{{url('/images/drinks/baco.jpg')}}" />
                <img style="height: 500px; width: 500px; border-radius: 30px; transform: rotate(-5deg); margin-top: 25px;" src="{{url('/images/drinks/moscow-mule.jpg')}}" />
            </div>
        </div>
    </div>
</div>
@include('center')
@include('footer')


