@extends('frontend.product_template')
@section('content')
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							@foreach($categories as $category)
							<li class="p-t-4">
								<a href="javascript:void(0)" class="s-text13 active1 filter-category" data-id="{{$category->id}}">
									{{$category->category_name}}
								</a>
							</li>
							@endforeach
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						{{-- <div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div> --}}

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" id="search-product" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4 search">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 float-right">
								<select class="selection-2 sorting_items" name="sorting">
									<option>Default Sorting</option>
									<option value="latest">Latest</option>
									<option value="lowToHigh">Price: low to high</option>
									<option value="highToLow">Price: high to low</option>
								</select>
							</div>

							{{-- <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<<option>Default Sorting</option>
									<option>Latest</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>

								</select>
							</div> --}}
						</div> 

						{{-- <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span> --}}
					</div>
					<!-- Filter Product -->

					<!-- Product -->
					<div class="row mt-3 search_category" id="search_category">
						@foreach($items as $item)
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										@php 
											$item_images = json_decode($item->item_image);
										@endphp
										<img src="{{asset($item_images[0])}}" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													<a href="{{route('product_detail',$item->id)}}" class="text-white">Show Detail</a>
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="{{route('product_detail',$item->id)}}" class="block2-name dis-block s-text3 p-b-5">
											{{$item->item_name}}
										</a>

										<span class="block2-price m-text6 p-r-5">
											{{$item->item_price}}
											
										</span>
									</div>
								</div>
							</div>
						@endforeach
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade emptyProductModal" id="emptyProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Unaviable Right Now</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        There is no product right now.
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
		$(document).ready(function (argument) {
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('.filter-category').click(function (argument) {
				var category_id = $(this).data('id')
				getItemsByCategory(category_id)
			})

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
		              html+=`<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="{{asset('${image[0]}')}}" alt="IMG-PRODUCT">

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
										<a href="{{route('product_detail',$item->id)}}" class="block2-name dis-block s-text3 p-b-5">
											${v.item_name}
										</a>

										<span class="block2-price m-text6 p-r-5">
											${v.item_price}
											
										</span>
									</div>
								</div>
							</div>`;
		            	}
		            });
		            $('#search_category').html(html);
		          },
		          error: function(error){
		            console.log(error)
		          }
		      });  
	    	}

	    	$('.sorting_items').change(function (argument) {
				var sort_type = $(this).val()
				console.log(sort_type)
				getItemsBySorting(sort_type)
			})

			function getItemsBySorting(sort_type){
		      var url="{{route('get_item_by_sorting',':id')}}";
		      url=url.replace(':id',sort_type);
		        $.ajax({
		          type:'post',
		          url: url,
		          processData: false,
		          contentType: false,
		          success: (data) => {
		            var j=1;
		            var html='';
		            $.each(data,function(i,v){
		            	
		            	var image = JSON.parse(v.item_image)
		            	var id = JSON.parse(v.i_id)
		            	var url="{{route('product_detail',':id')}}";
	      				url=url.replace(':id',id);
		              html+=`<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="{{asset('${image[0]}')}}" alt="IMG-PRODUCT">

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
										<a href="{{route('product_detail',$item->id)}}" class="block2-name dis-block s-text3 p-b-5">
											${v.item_name}
										</a>

										<span class="block2-price m-text6 p-r-5">
											${v.item_price}
											
										</span>
									</div>
								</div>
							</div>`;
		            });
		            $('#search_category').html(html);
		          },
		          error: function(error){
		            console.log(error)
		          }
		      });  
	    	}

	    	$('.search').click(function (argument) {
				var keyword = $('#search-product').val()
				getItemsBySorting(keyword)
			})
			$('#search-product').keypress(function(event){
		        var keycode = (event.keyCode ? event.keyCode : event.which);
		        if(keycode == '13'){
					var keyword = $('#search-product').val()
					getItemsBySorting(keyword)
			        }
			    })
		})
	</script>
@endsection