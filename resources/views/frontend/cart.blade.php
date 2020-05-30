@extends('frontend.product_template')
@section('content')
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/heading-pages-01.jpg); height: 300px">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart table">
						<thead>
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-3">Size</th>

							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
					</thead>
					<tbody class="tbody">
						
					</tbody>

						
					</table>
				</div>
			</div>

			{{-- <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div>
			</div> --}}

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm carttotal">
						
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are shipping methods available in Mandalay Region. Please double check your address, or contact us if you need any help.
						</p>

						<span class="s-text19">
							Calculate Shipping
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2 township" name="township" >
								<option>Select a Township...</option>
								@foreach($townships as $row)
								<option value="{{$row->id}}">{{$row->township}}</option>
								@endforeach
							</select>
						</div>
						<h5 class="text-success delifee m-2"></h5>

						
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20 address" name="address" placeholder="Address"></textarea>

						<div class="bo4 of-hidden w-size21 m-t-8 m-b-12 m-b-22 my-4">
							<input type="date" name="" placeholder="date" class="form-control orderdate s-text7">
						</div>

						{{-- <div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div> --}}
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm alltotal">
						

					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 checkout">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
		<div class="modal fade authModal" id="emptyProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Unaviable Right Now</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        If you have account, please Login Here <a href="{{route('login')}}">Login</a> <br>

		        If you haven't account, please Register Here <a href="{{route('register')}}">Register</a> <br>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:  #111111; border-color: #111111">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</section>
	@endsection
	@section('script')

	<script type="text/javascript">
		$(document).ready(function(){

			$(".checkout").click(function(){
				var authCheck = {{ Auth::check() }}
				console.log(authCheck)
				if (authCheck) {
					var yes=confirm("Are you sure to order");
					if(yes){
					var orderdate=$(".orderdate").val();
					var total=parseInt($(".alltotal").html());

					var itemString = localStorage.getItem('items');
					var itemArray = JSON.parse(itemString);

					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

					$.post("/order",{address:address,orderdate:orderdate,total:total,itemArray:itemArray},function(res){
						console.log(res.success);
						if(res){
							alert(res.success)
							localStorage.clear();
							window.location = "{{route('product')}}";
						}
					})

					}
				}
				else{
					$(".authModal").modal('show')
					
				}
				
			})
		})
	</script>
	@endsection