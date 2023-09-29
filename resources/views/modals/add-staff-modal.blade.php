<div class="modal fade" id="add-new-staff-modal" tabindex="-1" role="dialog" aria-labelledby="roleModalLable" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="roleModalLable">New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

              <div class="center spms-loader" id="spms-loader" >
                    <div class="spinner " id="spinner-1"></div>
                </div>

        <form>
          @csrf
          <div id="role_error" class="project-topic-backend-json-response"></div>

          <input type="hidden" class="form-control" id="user-status" name="user-status">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group col-md-12">
                    <label for="title">Phone No.</label>
                    <input type="tel" class="form-control" id="phone_no" name="phone_no">
                </div>

                <div class="form-group col-md-12">
                    <label for="title">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group col-md-12">
                    <label for="title">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-new-project-topic" class="btn btn-primary" data-add-role="role">Save</button>
      </div>
    </div>
  </div>
</div>

@push('js')

    <script>
            
        $(document).ready(function() {
            
            //Show Modal for New Entry
            $(document).on('click','#add-new-staff',function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
                $('.spms-loader').hide();
                $('#add-new-staff-modal').modal('show');
            })



             //Functionality to save New Entry
            $(document).on('click','#save-new-project-topic',function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
                $('#save-new-project-topic').attr('disabled', true);
                $('.spms-loader').show();
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('name', $('#title').val());
                formData.append('description', $('#body').val());
                formData.append('user_type', $('#user-status').val());

     
                let url = "{{ route('users') }}";
                  
                $.ajax({
                url: url,
                type: "POST",
                data: formData,
                cache: false,
                processData:false,
                contentType: false,
                success: function(result){
            
                                $('.spms-loader').hide();
                                $('.project-topic-backend-json-response').hide();
                                swal.fire({
                                            title: "Saved",
                                            text: "Announcement Successfull Created",
                                            type: "success",
                                            showCancelButton: false,
                                            closeOnConfirm: false,
                                            confirmButtonClass: "btn-success",
                                            confirmButtonText: "OK",
                                            closeOnConfirm: false
                                        });
                                window.setTimeout( function(){
                                    $('#add-new-project-topic-modal').modal('hide');
                                        location.reload(true);
                                },2000);
                                


                },
                error : function(response, textStatus, errorThrown){
                                
                            $('.spms-loader').hide();
                            $('#save-new-project-topic').attr('disabled', false);
                            $('.project-topic-backend-json-response').html('');
                            $.each(response.responseJSON.errors, function(key, value){
                                $('.project-topic-backend-json-response').append('<span class="alert alert-danger mr-4" style="display:inline-block;"> <i class="fa fa-times mr-2"></i>  '+value+'</span>');
                            }); 
                },
                            dataType: 'json'
            }); 
            })
           

        })

    </script>
    
@endpush