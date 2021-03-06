@extends('frontend.product_template')
@section('slider')
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/shopping_outfits.jpg); height:420px">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							2020 Outfits
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							New Collection 2020
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="{{route('product')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/shopping_bags.jpg); height:420px">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
							2020 Bags
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							New Collection 2020
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/shopping_footwears.jpg); height:420px">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
							2020 Footwear
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
							New Collection 2020
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
@endsection
@section('banner')
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				@foreach($filter_categories as $filter_category)
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						@if($filter_category->category_name == "Outfits" || $filter_category->category_name == "Clothes")
							<img src="{{asset('frontend_template/images/banner-05.jpg')}}" alt="IMG-BENNER" style="height: 350px">

						@elseif($filter_category->category_name == "Footwear")
							<img src="{{asset('frontend_template/images/banner-03.jpg')}}" alt="IMG-BENNER" style="height: 350px">

						@elseif($filter_category->category_name == "Bags")
							<img src="{{asset('frontend_template/images/banner-10.jpg')}}" alt="IMG-BENNER" style="height: 350px">

						@endif

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="javascript:void(0)" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4 filter-category" data-id="{{$filter_category->id}}">
								{{$filter_category->category_name}}
							</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<section class="bgwhite p-t-45 p-b-58 search_category d-none">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center search_title">
					Your Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Tab panes -->
				<div class="tab-content">

					<div class="tab-pane fade show active" role="tabpanel">
						<div class="row" id="search_category">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('product')
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Our Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#all" role="tab">All</a>
						</li>
					@foreach($categories as $category)
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#{{$category->id}}" role="tab">{{$category->category_name}}</a>
						</li>
					@endforeach
					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- - -->
					@foreach($categories as $category)
					<div class="tab-pane fade show" id="{{$category->id}}" role="tabpanel">
						<div class="row">
							@foreach($items as $item)
								@if($category->id == $item->category_id)
									<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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

													<div class="w-size1 trans-0-4">
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
								@endif
							@endforeach
						</div>
					</div>
					@endforeach

					<div class="tab-pane fade show active" id="all" role="tabpanel">
						<div class="row">
							@foreach($items as $item)
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('banner_video')
	<section class="parallax0 parallax100" style="background-image: url(http://127.0.0.1:8000/frontend_template/images/bg-video-01.jpg);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					The Beauty
				</span>

				<h3 class="l-text1 fs-35-sm">
					Lookbook
				</h3>

				{{-- <span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span> --}}
			</div>
		</div>
	</section>
@endsection
@section('blog')
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Our Blog
				</h3>
			</div>

			<div class="row">
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{{asset('frontend_template/images/blog-01.jpg')}}" alt="IMG-BLOG" style="height: 320px">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									Black Friday Guide: Best Sales & Discount Codes
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

							<p class="s-text8 p-t-16">
								Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{{asset('frontend_template/images/blog-02.jpg')}}" alt="IMG-BLOG" style="height: 320px">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									The White Sneakers Nearly Every Fashion Girls Own
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

							<p class="s-text8 p-t-16">
								Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{{asset('frontend_template/images/blog-03.jpg')}}" alt="IMG-BLOG" style="height: 320px">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									New York SS 2018 Street Style: Annina Mislin
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

							<p class="s-text8 p-t-16">
								Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('instagram')
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ follow us on Instagram
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="{{asset('frontend_template/images/gallery-03.jpg')}}" alt="IMG-INSTAGRAM" style="height: 400px">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="{{asset('frontend_template/images/gallery-07.jpg')}}" alt="IMG-INSTAGRAM" style="height: 400px">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="{{asset('frontend_template/images/gallery-09.jpg')}}" alt="IMG-INSTAGRAM" style="height: 400px">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="{{asset('frontend_template/images/gallery-13.jpg')}}" alt="IMG-INSTAGRAM" style="height: 400px">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
		</div>
	</section>
@endsection
@section('shipping')
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
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
			  console.log(category_id)
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
		            console.log(data)
		            $.each(data,function(i,v){
		            	var image = JSON.parse(v.item_image)
		            	var id = JSON.parse(v.i_id)
		            	var url="{{route('product_detail',':id')}}";
	      				url=url.replace(':id',id);
		              html+=`<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
		            $(".search_title").text(data[0].category_name)
		            $(".search_category").removeClass('d-none')
		            $('#search_category').html(html);
		          },
		          error: function(error){
		            console.log(error)
		          }
		      });  
	    	}
		})
	</script>
@endsection