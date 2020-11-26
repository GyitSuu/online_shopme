@extends('backend/backend_template')
@section('content')

    <section>
        <div class="container-fluid">
          <!-- Page Header-->
          	<header> 
	            <h1 class="h3 display">Tables 
	            <button  class="btn btn-primary float-right" data-toggle="modal"  id="createItem">
	       		 	<i class="fa fa-plus"></i> Add Item</button></h1>
						</header>
          	<div class="row">
	            <div class="col-lg-12">
	              <div class="card">
	               <!--  <div class="card-header">
	                  <h4>Basic Table</h4>
	                </div> -->
	                <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4 mt-3">
	       				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      			</div>
	                <div class="card-body">
	                  <div class="table-responsive">
	                    <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
	                      <thead class="thead-light">
	                        <tr>
	                          <th>No</th>
	                          <th>Item Name</th>
	                          <th>Item Image</th>
	                          <th>Action</th>
	                        </tr>
	                      </thead>
	                      <tbody id="tableBody">
							</tbody>
	                    </table>
	                  </div>
	                </div>
	              </div>
	            </div>
            
          </div>
        </div>
      </section>


     <!-- Add New Item -->
	<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form id="itemForm" name="itemForm" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="modelHeading"></h5>
						
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="col-6 offset-3 my-2">
								<div class="form-group">
									<label for="type">Item Name</label>
									<input type="text" class="form-control @error('item') is-invalid @enderror" id="item_name" name="item_name" autofocus required>
										<p class="error-message-item_name p-2 text-md-left text-danger"></p>
								</div>
								<div class="form-group">
									<label for="type">Item Price</label>
									<input type="text" class="form-control @error('item') is-invalid @enderror" id="item_price" name="item_price" autofocus required>
										<p class="error-message-item_price p-2 text-md-left text-danger"></p>
								</div>
								<div class="form-group">
									<input type="radio" name="discount_radio" id="discount_radio" >
									<label for="discount_radio">Discount Item?</label>
										
								</div>
								<div class="form-group d-none" id="discount_price_field">
									<label for="type">Discount Price</label>
									<input type="text" class="form-control @error('item') is-invalid @enderror" id="discount_price" name="discount_price">
										<p class="error-message-discount_price p-2 text-md-left text-danger"></p>
								</div>
								<div class="form-group">
									<label for="type">Category </label>
									<select name="category" class="form-control selectcategory" id="category">
										<option>Choose Category</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									</select>
										<p class="error-message-item_category p-2 text-md-left text-danger"></p>
								</div>
								<div class="form-group">
								<div class="sc" >

									<nav>
										<div class="nav nav-tabs" id="nav-tab" role="tablist">
											<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">sizes</a>
											<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">colors</a>
											
										</div>
									</nav>
									<div class="tab-content" id="nav-tabContent">
										<div class="tab-pane fade show active ss" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"></div>
										<div class="tab-pane fade cc" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div>

									</div>	
										
								</div>
								
								</div>
								<div class="form-group my-4">
									<label for="type">Item Image</label>
									<input type="file" class="form-control @error('item') is-invalid @enderror" id="item_image" name="item_image[]" multiple>
										<p class="error-message-item_image p-2 text-md-left text-danger"></p>
								</div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" id="description"></textarea>
										<p class="error-message-item_image p-2 text-md-left text-danger"></p>
								</div>
								
								 
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary save" name="button" id="saveBtn"><i class="fas fa-save"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Eidt Item -->
	<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	      <div class="modal-content">
	        <form id="editItemForm" name="editItemForm" method="POST" enctype="multipart/form-data">
	          <input type="hidden" name="edit_item_id" id="edit_item_id">
	          <div class="modal-header">
	            <h5 class="modal-title" id="edit_modelHeading"></h5>
	            
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            <div class="container-fluid">
	              <div class="col-12 my-2">
	                <div class="form-group row">
	                  
	                  <label for="edit_name" class="col-md-4 col-form-label text-md-right">Item Name</label>
	                  <div class="col-md-6">
	                    <input type="text" class="form-control @error('edit_item_name') is-invalid @enderror" id="edit_item_name" name="edit_item_name" autofocus required>
	                      <p class="error-message-edit-item_name p-2 text-md-left text-danger"></p>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="edit_phone_no" class="col-md-4 col-form-label text-md-right">Item Price</label>
	                  <div class="col-md-4">
	                    <input type="number" class="form-control @error('edit_item_price') is-invalid @enderror" id="edit_item_price" name="edit_item_price" autofocus required>
	                      <p class="error-message-edit-phone_no p-2 text-md-left text-danger"></p>
	                  </div>
	                  <div class="col-md-4"><input type="text" name="edit_discount" placeholder="discount_price" class="form-control edit_discount" value=""></div>
	                </div>
	                
	                <div class="form-group row">
	                  <label for="edit_item_image" class="col-md-4 col-form-label text-md-right">{{ __('new item pictures') }}</label>

	                  <div class="col-md-6">
	                      

	                      <input type="file" class="form-control @error('item') is-invalid @enderror" id="edititem_image" name="edititem_image[]" multiple>
	                     
	                      <p class="edit-error-message-image p-2 text-md-left text-danger"></p>
	                  </div>
	                </div>

	                 <div class="form-group row">
	                  <label for="edit_item_image" class="col-md-4 col-form-label text-md-right">{{ __('old_images') }}</label>
	                  <div class="col-md-6">
	                  		<input type="hidden" name="item_old_image" id="item_old_image" value="">

	                  		<div class="row item_old_image my-2 mx-3">
	                      	
	                      </div>
	                  </div>
	              	</div>


	                <div class="form-group row">
	                  <label for="edit_category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

	                  <div class="col-md-6">
	                     <select name="category" class="form-control selectcategory" id="edit_category">
										<option>Choose Category</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									</select>
								
	                  </div>
	                </div>

	                <div class="form-group row">
	                	<div class="edit_sc" style="margin-left: 200px">
	                		
	                		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	                			<li class="nav-item" role="presentation">
	                				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">szes</a>
	                			</li>
	                			<li class="nav-item" role="presentation">
	                				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">colors</a>
	                			</li>
	                			
	                		</ul>
	                		<div class="tab-content" id="pills-tabContent">
	                			<div class="tab-pane fade show active edit_ss" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
	                			<div class="tab-pane fade edit_cc" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
	                		</div>

	                	</div>
	                </div>

	               </div>
				</div>
			</div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	            <button type="submit" class="btn btn-primary save" name="button" id="editSaveBtn"><i class="fas fa-save"></i></button>
	          </div>
	        </form>
	      </div>
	    </div>
 	 </div>

@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(".sc").hide();
		$(".edit_sc").hide();
		$(".sizebycat").hide();
		$(".colorbycat").hide();
		getItem()
		var myStopTimer = setInterval(Timer,3000);
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});
		function Timer(){
			$(".alertMessage").addClass('d-none');
		}
		$("#discount_radio").click(function (argument) {
			$("#discount_price_field").removeClass('d-none')
		})
		$("#category").change(function (argument) {
			var category_id = $(this).val();
			console.log(category_id);
			$(".sc").show();
			 getSizeByCategoryId(category_id);
			 getcolorByCategoryId(category_id);
		})

		$("#edit_category").change(function (argument) {
			var category_id = $(this).val();
			console.log(category_id);
			$(".edit_sc").show();
			 getSizeByCategoryId(category_id);
			 getcolorByCategoryId(category_id);
		})

	
		function getSizeByCategoryId(category_id){
			console.log(category_id)
	      var url="{{route('admin.get_size_by_id',':id')}}";
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
	              html+=`
	              <div class="row">
	              <div class="col-md-4 col-lg-3 col-sm-4">
	              	<input type="checkbox" class="form-check-input" id="exampleCheck1" value="${v.s_id}" name="size_id[]" multiple>
					<label class="form-check-label" for="exampleCheck1">${v.size}</label>
					</div>
					</div>
	              `;
	            });
	           // console.log(html);
	           // $(".size_field").removeClass('d-none')
	            $('.ss').html(html);
	            $('.edit_ss').html(html);
	           	

	          },
	          error: function(error){
	            console.log(error)
	          }
	      });  
    }
    function getcolorByCategoryId(category_id){
			console.log(category_id)
	      var url="{{route('admin.get_color_by_id',':id')}}";
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
	              html+=`
	              <div class="row">
	              <div class="col-md-4 col-lg-3 col-sm-4">
	              	<input type="checkbox" class="form-check-input edit_color_id" id="exampleCheck1" value="${v.c_id}" name="color_id[]" multiple>
					<label class="form-check-label" for="exampleCheck1">${v.color}</label>
					</div>
					</div>
	              `;
	            });
	           // console.log(html);
	           // $(".size_field").removeClass('d-none')
	            $('.cc').html(html);
	            $('.edit_cc').html(html);
	            
	          },
	          error: function(error){
	            console.log(error)
	          }
	      });  
    }
		function getItem(){
			var url = "{{route('admin.get_item')}}";
			$.ajax({
				type : 'get',
				url : url,
				processData : false,
				contentData: false,
				success:(data) => {
					var j =1;
					var html = html;
					$.each(data,function(i,v){
						var item_images = JSON.parse(v.item_image);

						html += `<tr>
									<td>${j++}</td>
									<td>${v.item_name}</td>
									<td><img src="{{asset('${item_images[0]}')}}" style="height:100px; width:100px"></td>
									<td>
										<button class="btn btn-primary btn-sm d-inline-block editItem" data-id="${v.id}"><i class="fa fa-edit text-white"></i></button>
										<button class="btn btn-danger btn-sm d-inline-block deleteItem" data-id="${v.id}"><i class="fa fa-trash text-white"></i></button>
									</td>
										</tr>	`;
					})
					$('#tableBody').html(html);
				},
				error: function(error){
					console.log(error);
				}
			});
		}

		


		$('#createItem').click(function (){
			clearInterval(myStopTimer)
			$('#saveBtn').text("Save");
			$('#saveBtn').val('create-type');
			$('#item_id').val('');
			$('#itemForm').trigger("reset");
			$('#modelHeading').html("Create New Item");
			$('#itemModal').modal('show')
		});

		$('#itemForm').submit(function (e){
			e.preventDefault();
			var formData = new FormData(this);
			for (var pair of formData.entries())
	          {
	           console.log(pair[0]+ ', '+ pair[1]); 
	          }
			$.ajax({
				data: formData,
				url: "{{route('admin.item.store')}}",
				type: "POST",
				dataType : "json",
				cache:false,
				processData: false,
				contentType:false,
				success : function (data) {
					$('#itemForm').trigger("reset");
					$('#itemModal').modal('hide');
					$('.alertMessage').removeClass('d-none');
					$('.alertMessage').text(data.success);
					getItem()
					setInterval(Timer,3000);	
				},
				error : function (error) {
					$('#saveBtn').html('Save Change');
					var errors = error.responseJSON.errors;
					if(errors){
						var item_name = errors.item_name;
						var item_price = errors.item_price;
						var item_image = errors.item_image;
						var brand = errors.brand;
						var category = errors.category;
						$('.error-message-item_name').text(item_name)
						$('.error-message-item_price').text(item_price)
						$('.error-message-item_image').text(item_image)
						$('.error-message-brand').text(brand)
						$('.error-message-category').text(category)
						
					}
					$('#saveBtn').html('Save Changes');
				}
			})
		});

	$('tbody').on('click', '.editItem', function () {

      $('.alertMessage').addClass('d-none');
      var item_id = $(this).data('id');
      var url="{{route('admin.item.edit',':id')}}";
      url=url.replace(':id',item_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (response) {
          	//dd(response);
          	console.log(response);
            var data = response.item;
            var itemsize=response.item_size;
            var itemcolor=response.item_color;
            var img=JSON.parse(data.item_image);
            //console.log(typeof(img));
            //var brands = response.brands
            var html='';
            $.each(img,function(i,v){
            	//console.log(v);
            	html+=`
            	 <div class="col-md-3 col-lg-3 clo-sm-2">
            	 <img src="{{asset('${v}')}}" class="img-fluid" width="30px" height="30px">
            	 </div>`;

           // $('.item_old_image').attr('src',`{{asset('${data.item_image}')}}`);
            })
            $(".item_old_image").html(html);

            //console.log(brands);
              $('#edit_modelHeading').html("Edit Existing Item");
              $('#editSaveBtn').text("Update");
              $('#editItemModal').modal('show');
            	$(".edit_sc").show();
            	getSizeByCategoryId(data.category_id);
            	getcolorByCategoryId(data.category_id);
              $('#edit_item_id').val(data.id);
              $('#edit_item_name').val(data.item_name);
              $('#edit_item_price').val(data.item_price);
              $('.edit_discount').val(data.discount_price);
              console.log(data.item_image)
              $('#item_old_image').val(data.item_image);
              
              $("#edit_brand").val(data.brand_id);
              $("#edit_category").val(data.category_id);
              //$(".edit_color_id").val(itemsize.id);

          },
          error: function (error) {
          }
        })
   })

	$('#editItemForm').submit(function (e) {
		//alert("okk");
	        e.preventDefault();
	        /*$(this).html('Sending..'); */
	        var formData = new FormData(this)
	        var id=$('input[name="edit_item_id"]').val();
	        console.log(id);
	        for (var pair of formData.entries())
	          {
	           console.log(pair[0]+ ', '+ pair[1]); 
	          }
	        formData.append('_method', 'PUT');
	        console.log(name);
	        var url="{{ route('admin.item.update',':id') }}";
	        url=url.replace(':id',id);
	        $.ajax({
	          data: formData,
	          url: url,
	          type: "POST",
	          dataType: 'json',
	          cache:false,
	          contentType: false,
	          processData: false,
	          success: function (data) {
	              $('#editItemForm').trigger("reset");
	              $('#editItemModal').modal('hide');
	              console.log(data)
	              $('.alertMessage').removeClass('d-none');
	              $('.alertMessage').text(data.success);
	              getItem()
	              setInterval(Timer, 3000);
	          },
	          error: function (error) {
	            $('#saveBtn').html('Save Changes');
	            var errors=error.responseJSON.errors;
	              if(errors){
	                  var name=errors.name;
	                  var email=errors.email;
	                  var password=errors.password;
	                  var phone_no=errors.phone_no;
	                  var address=errors.address;
	                  $('.error-message-name').text(name)
	                  $('.error-message-email').text(email)
	                  $('.error-message-password').text(password)
	                  $('.error-message-phone_no').text(phone_no)
	                  $('.error-message-address').text(address)
	              }
	            $('#saveBtn').html('Save Changes');
	          }
      })
    })

  	  $('body').on('click', '.deleteItem', function () {
        clearInterval()
        var item_id = $(this).data("id");
        var status = confirm("Are You sure want to delete this item!");
        if (status) {
          var url="{{route('admin.item.destroy',':id')}}";
          url=url.replace(':id',item_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                $('.alertMessage').text(data.success);
                getItem()
                setInterval(Timer, 3000);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    }); 

	
	})
</script>
@endsection