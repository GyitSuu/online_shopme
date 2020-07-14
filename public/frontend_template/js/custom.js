$(document).ready(function(){
	showmyitem();
	$(".addtocart").click(function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var photo_raw = $(".slick-active").children().attr('src');
		var photo = photo_raw.replace(" http://127.0.0.1:8000/","");
		var qty=$('.qty').val();
		var size=$('.size').val();

		if (!size) {
			var size = null;
			console.log(size)
		}

		console.log(id+name+price+photo+qty+size);
		var item = {
					id:id,
					name:name,
					price:price,
					photo:photo,
					qty:qty,
					size:size
				};
		var itemString = localStorage.getItem("items");
		var itemArray
		if(itemString == null){
				itemArray = Array();
			}else{
				itemArray = JSON.parse(itemString);
			}
			var status=false;
			//var exit=false;
			$.each(itemArray,function(i,v){
				// alert(i);
					if (id==v.id && size==v.size && photo == v.photo) {
						status=true;
						v.qty++;
					}
			})

			if (!status) {
				itemArray.push(item);
			}

		var itemData = JSON.stringify(itemArray);
		localStorage.setItem("items",itemData);
		count();
	})

	$(".cartdrop").click(function(){
		var itemString = localStorage.getItem("items");
		if(itemString){
			var itemArray = JSON.parse(itemString);
		}
		// console.log(itemArray);
		var html =''; var html1=""; var total=0;
		var bookingcart = 0;

		$.each(itemArray,function(i,v){
			var id = v.id;
			var name = v.name;
			var photo = v.photo;
			var price =v.price;
			var qty =v.qty;

			var subtotal=qty*price;
			total+=subtotal;
			var photo_link = "http://localhost:8000/" + photo
			html+=`<div class="header-cart-item-img">
					<img src="${photo_link}">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							${name}
						</a>

						<span class="header-cart-item-info">
							${qty} x ${price}
						</span>

					</div>`

		})
		$(".cartli").html(html);
		$(".carttotal").html(total);
	})
	
	function showmyitem(){
		var itemString = localStorage.getItem("items");
		if(itemString){
			var itemArray = JSON.parse(itemString);
		}
		// console.log(itemArray);
		var html =''; var j=1; var total=0;
		var bookingcart = 0;

		$.each(itemArray,function(i,v){
			var id = v.id;
			console.log(id);
			var name = v.name;
			var size=v.size
			var photo = v.photo;
			var price =v.price;
			var qty =v.qty;
			var qty =v.qty;

			var subtotal=qty*price;
			total+=subtotal;
			 

			html+=`
			<tr class="table-row carttr" >
			<td class="column-1">
				<div class="cart-img-product b-rad-4 o-f-hidden" data-id="${i}">
					<img src="${photo}" alt="IMG-PRODUCT">
				</div>
			</td>
			<td class="column-2 product-name">${name}</td>
			<td class="column-3">${price}</td>

			<td class="column-5">
				<div class="flex-w bo5 of-hidden w-size17">
					<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 btndecrease" data-id="${i}" data-size="${size}">
						<i class="fs-12 fa fa-minus" aria-hidden="true"  ></i>
					</button>

					<input class="size8 m-text18 t-center num-product quantity" type="number" name="num-product1" value="${qty}">

					<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 btnincrease" data-id="${i}" data-size="${size}">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>
			</td>
			<td class="column-6">${subtotal}</td>
			</tr>`
		})
			//console.log(total);
		$(".tbody").html(html);
		$(".carttotal").html(total);
		
	}
	count();
	function count() {
        var total = 0;
        var itemString = localStorage.getItem("items");
		if(itemString){
		var itemArray = JSON.parse(itemString);
          $.each(itemArray, function(i,v){
          	//console.log(v.qty);
          	total+=parseInt(v.qty);
          });
        }
        //console.log(total);
         $('.count').html(total);
    }

   $('tbody').on('click','.btnincrease',function () {
		var id = $(this).data('id');
		var size=$(this).data('size');
		console.log(id);
		var itemString = localStorage.getItem('items');
		if(itemString){
			var itemArray = JSON.parse(itemString);
			
			$.each(itemArray,function (i,v) {
				if (i== id  && size==v.size) {
					v.qty++;
				}
			})
			cart = JSON.stringify(itemArray);
			localStorage.setItem('items',cart);
			showmyitem();
			count();
		}
		
	})
    $(".tbody").on('click','.btndecrease',function(){
    	var id = $(this).data('id');
		var size=$(this).data('size');
		console.log(id);
		var itemString = localStorage.getItem('items');
		if(itemString){
			var itemArray = JSON.parse(itemString);
			
			$.each(itemArray,function (i,v) {
				if (i == id  && size==v.size) {
					//alert("ok");
					v.qty--;
					if(v.qty==0){
						//alert("ok");
						itemArray.splice(id,1);
					}
				}
			})
			cart = JSON.stringify(itemArray);
			localStorage.setItem('items',cart);
			showmyitem();
			count()
		}
	})
   	$(".tbody").on('click','.cart-img-product',function(){
   		alert('hi')
    	var id = $(this).data('id');
		console.log(id);
		var itemString = localStorage.getItem('items');
		if(itemString){
			var itemArray = JSON.parse(itemString);
			
			$.each(itemArray,function (i,v) {
				if (i == id) {
					itemArray.splice(id,1);
				}
			})
			cart = JSON.stringify(itemArray);
			localStorage.setItem('items',cart);
			showmyitem();
			count()
		}
	})
})