<div class="container">
	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<th>NAME</th>
						<th>UNIT PRICE</th>
						<th>QUANTITY</th>
						<th>TOTAL</th>
						<th>REMOVE</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem['name'] }}</td>
                            <td>{{ $cartItem['price'] }}</td>
                            <td>
                                <livewire:cart-update-form :cartItem="$cartItem" :key="$cartItem['id']"/>
                            </td>
                            <td>{{ Cart::get($cartItem['id'])->getPriceSum() }}</td>
                            <td><a href="{{ url('remove/'. $cartItem['id']) }}">Remove</a></td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
    </div>
    <hr>
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-lg-8 col-md-5 col-12">
					<div class="left">
						Item Count: {{ \Cart::getContent()->count() }}
					</div>
				</div>
				<div class="col-lg-4 col-md-7 col-12">
					<div class="right">
						Total: {{ \Cart::getTotal() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

