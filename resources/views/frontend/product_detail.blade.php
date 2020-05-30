@extends('frontend.product_template')
@section('content')
	
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		<a href="{{route('product')}}" class="s-text16">
			{{$item->category->category_name}}
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{{$item->item_name}}
		</span>
	</div>
	
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					
					<div class="slick3">
						
						 @foreach(json_decode($item->item_image) as $photo)
						<div class="item-slick3" data-thumb="{{asset($photo)}}">
							<div class="wrap-pic-w">
								<img src="{{asset($photo)}}" alt="IMG-PRODUCT">
							</div>
						</div>
						@endforeach

						
					</div>
					
				</div>

			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{$item->item_name}}
				</h4>

				<span class="m-text17">
					{{$item->item_price}} Kyats
				</span>

				<p class="s-text8 p-t-10">
					{{$item->description}} 
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2 size" name="size">
								
								@foreach($item->sizes as $size)
								<option value="$size->pivot->size_id">{{$size->size}}</option>

								@endforeach
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								@foreach($item->colors as $color)
								<option value="$color->pivot->color_id">{{$color->color}}</option>

								@endforeach
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product qty" type="number" name="num-product" value="1" >

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								@php 
								$item_images =json_decode($item->item_image);
								@endphp
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocart" data-id="{{$item->id}}" data-name="{{$item->item_name}}" data-photo="{{$item_images[0]}}" data-price="{{$item->item_price}}">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					{{-- <span class="s-text8 m-r-35">SKU: MUG-01</span> --}}
					<input type="hidden" name="category_id" class="category_id" value="{{$item->category_id}}">
					<span class="s-text8">Categories: {{$item->category->category_name}} </span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{$item->description}} 
						</p>
					</div>
				</div>

				{{-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div> --}}
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="row related_products">
				</div>
			</div>

		</div>
	</section>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function (argument) {

			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});

			var category_id = $('.category_id').val()
			getItemsByCategory(category_id)
			function getItemsByCategory(category_id){
		      var url="{{route('get_item_by_category',':id')}}";
		      url=url.replace(':id',category_id);
		        $.ajax({
		          type:'post',
		          url: url,
		          processData: false,
		          contentType: false,
		          success: (data) => {
		            var j=1;
		            var html='';
		            $.each(data,function(i,v){
		            	console.log(data.empty)
		            	if(data.empty == "null") {
		            		$(".emptyProductModal").modal('show')
		            		getItemsByCategory(0)
		            	}else{

		            	var image = JSON.parse(v.item_image)
		            	var id = JSON.parse(v.i_id)
		            	var url="{{route('product_detail',':id')}}";
	      				url=url.replace(':id',id);
		              html+=`<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="{{asset('${image[0]}')}}" alt="IMG-PRODUCT" style="width:300px; height:350px">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											<a href="${url}" class="text-white">Show Detail</a>
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									${v.item_name}
								</a>

								<span class="block2-price m-text6 p-r-5">
									${v.item_price} Kyats
								</span>
							</div>
						</div>
					</div>`;
		            	}
		            });
		            $('.related_products').html(html);
		          },
		          error: function(error){
		            console.log(error)
		          }
		      });  
	    	}
		})
	</script>
@endsection