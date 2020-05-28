@extends('backend.backend_template')
@section('content')
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          	<header> 
	            <h1 class="h3 display">Tables 
	            <button  class="btn btn-primary float-right" data-toggle="modal"  id="createNewSize">
	       		 	<i class="fa fa-plus"></i> Add Category</button></h1>
			</header>
			<div class="row">
			  <div class="col-12">
			    <div class="card">
			    	<div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
       				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      			</div>
			      <div class="card-body">
			       <div class="table-responsive">
			          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
			                  <thead class="thead-light">
			                    <tr>
			                      <th>No</th>
			                      <th>Category</th>
			                      <th>Size</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody id="tableBody">
			                  </tbody>
			          </table>
			        </div>
			    </div>
			  </div> <!-- /table end -->
			  <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			    	<div class="modal-content">
				      <form id="sizeForm" name="sizeForm" method="POST" enctype="multipart/form-data">
			  	      <div class="modal-header">
			  	        <h5 class="modal-title" id="modelHeading"></h5>
			            
			  	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  	          <span aria-hidden="true">&times;</span>
			  	        </button>
			  	      </div>
			          <div class="modal-body">
			  	        <div class="container-fluid">
			  	          <div class="col-12 my-2">
			                <div class="form-group row">
			                  <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
			                  <div class="col-md-6">
			                    <select name="category"  id="category" class="form-control">
			                          
			                    </select>
			                  </div>
			                </div>
			              </div>
			              <div class="col-12 my-2">
			                <div class="form-group row">
			                  <label for="size" class="col-md-4 col-form-label text-md-right">Size</label>
			                  <div class="col-md-6">
			                    <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" autofocus required>
			                      <p class="error-message-size p-2 text-md-left text-danger"></p>
			                  </div>
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

			  <div class="modal fade" id="editSizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			      <div class="modal-content">
			        <form id="editSizeForm" name="editSizeForm" method="POST" enctype="multipart/form-data">
			          <input type="hidden" name="edit_size_id" id="edit_size_id">
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
			                  <label for="edit_category" class="col-md-4 col-form-label text-md-right">Category</label>
			                  <div class="col-md-6">
			                    <select name="edit_category"  id="edit_category" class="form-control">
			                          
			                    </select>
			                  </div>
			                </div>
			              </div>
			              <div class="col-12 my-2">
			                <div class="form-group row">
			                  <label for="edit_size" class="col-md-4 col-form-label text-md-right">Size</label>
			                  <div class="col-md-6">
			                    <input type="text" class="form-control @error('edit_size') is-invalid @enderror" id="edit_size" name="edit_size" autofocus required>
			                      <p class="error-message-edit_size p-2 text-md-left text-danger"></p>
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
			</div>
		</div>
	</section>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
    getSize()
    var myStopTimer = setInterval(Timer,3000)

		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	})
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getSize(){
      var url="{{route('admin.get_size')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
            	console.log(data);
              html+=`<tr>
                        <td>${j++}</td>
                        <td>${v.category_name}</td>
                        <td>${v.size}</td>
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editSize " data-id="${v.s_id}"><i class="fas fa-edit text-white"></i></button>
                         <button class="btn btn-danger btn-sm d-inline-block deleteSize" data-id="${v.s_id}"><i class="fa fa-trash text-white"></i></button>    
                        </td>
                      </tr>`;
            });
            $('#tableBody').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    function getCategory(){
      var url="{{route('admin.get_category')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
              console.log(data);
              html+=`<option value="${v.id}">${v.category_name}</option>`;
            });
            $('#category').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    function getEditCategory(){
      var url="{{route('admin.get_category')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
              html+=`<option value="${v.id}">${v.category_name}</option>`;
            });
            $('#edit_category').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    $('#createNewSize').click(function () {
        clearInterval(myStopTimer)
        getCategory()
        $('#saveBtn').text("Save");
        /*$('#transportation_id').val('');*/
        document.getElementById("sizeForm").reset()
        $('#modelHeading').html("Create New Post");
        $('#sizeModal').modal('show');
    });   
    $('#sizeForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        $.ajax({
          data: formData,
          url: "{{ route('admin.size.store') }}",
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#sizeForm').trigger("reset");
              $('#sizeModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getSize();
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var size=errors.size;
                  var context=errors.context;
                  var image=errors.image;
                  $('.error-message-size').text(size)
                  $('.error-message-context').text(context)
                  $('.error-message-image').text(image)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editSize', function () {
      $('.alertMessage').addClass('d-none');
      var size_id = $(this).data('id');
      console.log(size_id);
      var url="{{route('admin.size.edit',':id')}}";
      url=url.replace(':id',size_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
          	console.log(data);
              $('#edit_modelHeading').html("Edit Size");
              $('#editSaveBtn').text("Update");
              $('#editSizeModal').modal('show');
              getEditCategory();
              $('#edit_size_id').val(data.id);
              $('#edit_category_id').val(data.category_id);
              $('#edit_size').val(data.size);
              
          },
          error: function (error) {
          }
        })
   })
  $('#editSizeForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        var id=$('input[name="edit_size_id"]').val();
        console.log(id);
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        formData.append('_method', 'PUT');
        console.log(name);
        var url="{{ route('admin.size.update',':id') }}";
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
          	console.log(data.success);
              $('#editSizeForm').trigger("reset");
              $('#editSizeModal').modal('hide');
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getSize()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var size=errors.size;
                  var context=errors.context;
                  $('.edit-error-message-edit_size').text(size)
                  $('.edit-error-message-edit_cotnext').text(cotnext)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
   $('body').on('click', '.deleteSize', function () {
        clearInterval()
        var size_id = $(this).data('id');
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="{{route('admin.size.destroy',':id')}}";
          url=url.replace(':id',size_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                if (data.success) {
                  $('.alertMessage').text(data.success);
                }else{
                  $('.alertMessage').text(data.error);
                }
                getSize()
                setInterval(Timer, 3000);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    }); 
  });
</script>
@endsection