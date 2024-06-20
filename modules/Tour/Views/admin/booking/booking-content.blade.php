<div class="panel">
    <div class="panel-title"><strong>Booking Content</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">Tour</label>
                <div class="">
                    <select name="tour_id" class="form-control">
                        <option value="">{{__("Select a tour")}}</option>
                        @foreach($tours as $tour)
                            <option value="{{$tour->id}}"
                                @if($tour->id == old('tour_id', $row->tour_id)) selected @endif
                                >{{$tour->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Select Dates</label>
                <div class="input-group">
                    <input type="date" name="date" class="form-control" value="{{old('date', $row->date)}}" />
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Adult
                            <span style="color:gray">($1,000 per person)</span>
                        </label>
                        <input type="number" name="adults" class="form-control" value="{{old('adults', $row->adults)}}" onchange="calculateTotal()" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Child
                            <span style="color:gray">($300 per person)</span>
                        </label>
                        <input type="number" name="children" class="form-control" value="{{old('children', $row->children)}}" onchange="calculateTotal()" />
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">Extra Prices</label>
                    <div style="border: 1px solid #ddd;padding: 10px; margin-bottom: 15px;">
                        <div>
                            <input type="hidden" name="clean" value="0">
                            <input type="checkbox" id="clean" name="clean" value="1" onchange="calculateTotal()" @if(old('clean', $row->clean)) checked @endif>
                            <label for="clean">Clean</label>
                            <span style="float:right">$100</span>
                        </div>
                        <div>
                            <input type="hidden" name="breakfast" value="0">
                            <input type="checkbox" id="breakfast" name="breakfast" value="1" onchange="calculateTotal()" @if(old('breakfast', $row->breakfast)) checked @endif>
                            <label for="breakfast">Breakfast</label>
                            <span style="float:right">$500</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">Service Fees</label>
                    <input type="number" name="fees" class="form-control" value="100" placeholder="100" disabled/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">Total Price</label>
                    <input type="number" name="total_price_display" class="form-control" disabled/>
                    <input type="hidden" name="total_price" id="total_price_hidden"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateTotal() {
        const adultPrice = 1000;
        const childPrice = 300;
        const cleanPrice = 100;
        const breakfastPrice = 500;
        const serviceFees = 100;

        const adults = document.querySelector('input[name="adults"]').value || 0;
        const children = document.querySelector('input[name="children"]').value || 0;
        const isCleanChecked = document.querySelector('#clean').checked;
        const isBreakfastChecked = document.querySelector('#breakfast').checked;

        let totalPrice = (adults * adultPrice) + (children * childPrice) + serviceFees;

        if (isCleanChecked) {
            totalPrice += cleanPrice;
        }
        if (isBreakfastChecked) {
            totalPrice += breakfastPrice;
        }

        document.querySelector('input[name="total_price_display"]').value = totalPrice;
        document.getElementById('total_price_hidden').value = totalPrice;
    }

    // Add event listeners to trigger calculateTotal when values change
    document.querySelector('input[name="adults"]').addEventListener('input', calculateTotal);
    document.querySelector('input[name="children"]').addEventListener('input', calculateTotal);
    document.querySelector('#clean').addEventListener('change', calculateTotal);
    document.querySelector('#breakfast').addEventListener('change', calculateTotal);
</script>
