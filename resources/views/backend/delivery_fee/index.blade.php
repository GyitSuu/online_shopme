@extends('backend.backend_template')
@section('content')
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          	<header> 
	            <h1 class="h3 display">Tables 
	            <button  class="btn btn-primary float-right" data-toggle="modal"  id="createNewDeliveryFee">
	       		 	<i class="fa fa-plus"></i> Add Delivery Fee</button></h1>
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
			                      <th>Township</th>
                            <th>Delivery Fee</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody id="tableBody">
			                  </tbody>
			          </table>
			        </div>
			    </div>
			  </div> <!-- /table end -->
			  <div class="modal fade" id="feeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			    	<div class="modal-content">
				      <form id="feeForm" name="feeForm" method="POST" enctype="multipart/form-data">
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
			                  <label for="township" class="col-md-4 col-form-label text-md-right">Township</label>
			                  <div class="col-md-6">
			                    <select name="township"  id="township" class="form-control">
			                          
			                    </select>
			                  </div>
			                </div>
			              </div>
			              <div class="col-12 my-2">
			                <div class="form-group row">
			                  <label for="fee" class="col-md-4 col-form-label text-md-right">Delivery Fee</label>
			                  <div class="col-md-6">
			                    <input type="text" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee" autofocus required>
			                      <p class="error-message-fee p-2 text-md-left text-danger"></p>
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

			  <div class="modal fade" id="editFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			      <div class="modal-content">
			        <form id="editFeeForm" name="editFeeForm" method="POST" enctype="multipart/form-data">
			          <input type="hidden" name="edit_fee_id" id="edit_fee_id">
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
			                  <label for="edit_township" class="col-md-4 col-form-label text-md-right">Township</label>
			                  <div class="col-md-6">
			                    <select name="edit_township"  id="edit_township" class="form-control">
			                          
			                    </select>
			                  </div>
			                </div>
			              </div>
			              <div class="col-12 my-2">
			                <div class="form-group row">
			                  <label for="edit_fee" class="col-md-4 col-form-label text-md-right">Deliveryo Fee</label>
			                  <div class="col-md-6">
			                    <input type="text" class="form-control @error('edit_fee') is-invalid @enderror" id="edit_fee" name="edit_fee" autofocus required>
			                      <p class="error-message-edit_fee p-2 text-md-left text-danger"></p>
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
    getFee()
    var myStopTimer = setInterval(Timer,3000)

		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	})
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getFee(){
      var url="{{route('admin.get_delivery_fee')}}";
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
                        <td>${v.township}</td>
                        <td>${v.fee}</td>
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editFee" data-id="${v.s_id}"><i class="fas fa-edit text-white"></i></button>
                         <button class="btn btn-danger btn-sm d-inline-block deleteFee" data-id="${v.s_id}"><i class="fa fa-trash text-white"></i></button>    
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

    function getTownship(){
      var url="{{route('admin.get_township')}}";
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
              html+=`<option value="${v.id}">${v.township}</option>`;
            });
            $('#township').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    function getEditTownship(){
      var url="{{route('admin.get_township')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
              html+=`<option value="${v.id}">${v.township}</option>`;
            });
            $('#edit_township').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    $('#createNewDeliveryFee').click(function () {
        clearInterval(myStopTimer)
        getTownship()
        $('#saveBtn').text("Save");
        /*$('#transportation_id').val('');*/
        document.getElementById("feeForm").reset()
        $('#modelHeading').html("Create New Post");
        $('#feeModal').modal('show');
    });   
    $('#feeForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        $.ajax({
          data: formData,
          url: "{{ route('admin.delivery_fee.store') }}",
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#feeForm').trigger("reset");
              $('#feeModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getFee();
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var fee=errors.fee;
                  var context=errors.context;
                  var image=errors.image;
                  $('.error-message-fee').text(fee)
                  $('.error-message-context').text(context)
                  $('.error-message-image').text(image)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editFee', function () {
      $('.alertMessage').addClass('d-none');
      var fee_id = $(this).data('id');
      console.log(fee_id);
      var url="{{route('admin.delivery_fee.edit',':id')}}";
      url=url.replace(':id',fee_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
          	console.log(data);
              $('#edit_modelHeading').html("Edit Fee");
              $('#editSaveBtn').text("Update");
              $('#editFeeModal').modal('show');
              getEditTownship();
              $('#edit_fee_id').val(data.id);
              $('#edit_township_id').val(data.township_id);
              $('#edit_fee').val(data.fee);
              
          },
          error: function (error) {
          }
        })
   })
  $('#editFeeForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        var id=$('input[name="edit_fee_id"]').val();
        console.log(id);
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        formData.append('_method', 'PUT');
        console.log(name);
        var url="{{ route('admin.delivery_fee.update',':id') }}";
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
              $('#editFeeForm').trigger("reset");
              $('#editFeeModal').modal('hide');
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getFee()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var fee=errors.fee;
                  var context=errors.context;
                  $('.edit-error-message-edit_fee').text(fee)
                  $('.edit-error-message-edit_cotnext').text(cotnext)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
   $('body').on('click', '.deleteFee', function () {
        clearInterval()
        var fee_id = $(this).data('id');
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="{{route('admin.delivery_fee.destroy',':id')}}";
          url=url.replace(':id',fee_id);
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
                getFee()
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