<!-- Trying out a new layout-->
<div class="container">

  <br>

<div class="btn-group btn-group-justified" role="group">
  <div class="btn-group" role="group">
    <a href="<?php echo base_url() ?>index.php/home/" class="btn btn-primary" role="button">Staff</a>
  </div>
  <div class="btn-group" role="group">
    <a href="<?php echo base_url() ?>index.php/emails/" class="btn btn-primary" role="button">Emails</a>
  </div>
  <div class="btn-group" role="group">
  <a href="<?php echo base_url() ?>index.php/department/" class="btn btn-primary" role="button">Departments</a>
  </div>
</div>

  <h3>STAFF DETAILS</h3>
  <div class="alert alert-success" style="display: none;">
    
  </div>
  <button id="btnAdd" class="btn btn-success">Add New</button>
  <table class="table table-bordered table-responsive table-fixed" style="margin-top: 20px;">
    <thead>
    <tr>
        <td>#</td>
        <td>Title</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>status</td>
        <td>gender</td>
        <td>department</td>
        <td>Action</td> <!--Here i will add my update and delete buttons -->
      </tr>
    </thead>
    <tbody id="showdata">
      
    </tbody>
  </table>
</div>


<!-- Here il create the adding model-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
                 <form id="myForm" action="" method="post" class="form-horizontal">
            <input type="hidden" name="txtId" value="0">

             <div class="form-group">
              <label for="name" class="label-control col-md-4">Title</label>
              <div class="col-md-8">
                <input type="text" name="txtStaffTitle" class="form-control">
              </div>
            </div>
            
            <div class="form-group">
              <label for="name" class="label-control col-md-4">Name</label>
              <div class="col-md-8">
                <input type="text" name="txtStaffName" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="label-control col-md-4">Surname</label>
              <div class="col-md-8">
                <input type="text" name="txtStaffSurname" class="form-control">
              </div>
            </div>

                  <div class="form-group">
              <label for="name" class="label-control col-md-4">Status</label>
              <div class="col-md-8">
                <input type="text" name="txtStaffStatus" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="label-control col-md-4">Gender</label>
              <div class="col-md-8">
                <select class="selectpicker form-control" name="txtStaffGender">
                <option value="m">Male</option>
                <option value="f">Female</option>
                </select>
                </div>
            </div>

            <div class="form-group">
              <label for="name" class="label-control col-md-4">Department</label>
              <div class="col-md-8">
                <select class="selectpicker form-control" name="txtStaffDepartment">
                <?php foreach ($getDepartments as $department): ?>
                <option value=<?php echo $department->id;?>><?php echo $department->name;?></option>
              <?php endforeach; ?>
                </select>

              </div>
            </div>
          
            <!-- div class="form-group">
              <label for="name" class="label-control col-md-4">Email</label>
              <div class="col-md-8">
                <input type="text" name="txtStaffEmail" class="form-control">
              </div>
            </div-->

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
          Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ***********************         JAVASCRIPT     ****************************************** -->
<script type="text/javascript">
//Put all the J.S actions in one function  
$(function(){

//show all the staff when page loads
show_all_staff();

    //Modal for Adding a New staff member
    $('#btnAdd').click(function(){
      $('#myModal').modal('show');
      
      //going to toggle the modal name between add and edit 
      $('#myModal').find('.modal-title').text('Add New staff member');
      $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/add_staff');
    });

      $('#btnSave').click(function(){
      
      //set the forms action 
      var url = $('#myForm').attr('action');
      
      //set the form elements to a string
      var data = $('#myForm').serialize(); 
      
      //setup the input fields for validation 
      var title = $('input[name=txtStaffTitle]');
      var name = $('input[name=txtStaffName]');
      var surname = $('input[name=txtStaffSurname]');
      var status = $('input[name=txtStaffStatus]');
      var gender = $('select[name=txtStaffGender]');
      var department = $('select[name=txtStaffDepartment]');
      //var email = $('input[name=txtStaffEmail]');
      
      //create a checker
      var result = '';

      //check the title for input
      if(title.val()==''){
        title.parent().parent().addClass('has-error');
      }else{
        title.parent().parent().removeClass('has-error');
        result +='1';
      }

      //check the name for input
      if(name.val()==''){
        name.parent().parent().addClass('has-error');
      }else{
        name.parent().parent().removeClass('has-error');
        result +='2';
      }
      
      //check the surname for input
      if(surname.val()==''){
        surname.parent().parent().addClass('has-error');
      }else{
        surname.parent().parent().removeClass('has-error');
        result +='3';
      }

     //check the status for input
      if(status.val()==''){
        status.parent().parent().addClass('has-error');
      }else{
        status.parent().parent().removeClass('has-error');
        result +='4';
      }

      //check the gender for input
      if(gender.val()==''){
        gender.parent().parent().addClass('has-error');
      }else{
        gender.parent().parent().removeClass('has-error');
        result +='5';
      }

      //check the department for input
      if(department.val()==''){
        department.parent().parent().addClass('has-error');
      }else{
        department.parent().parent().removeClass('has-error');
        result +='6';
      }         
 
      //check the email for input
      // if(email.val()==''){
      //   email.parent().parent().addClass('has-error');
      // }else{
      //   email.parent().parent().removeClass('has-error');
      //   result +='6';
      // } 
      
      //setup alerts for success or failure upon inputs
      if(result=='123456'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#myModal').modal('hide');
              $('#myForm')[0].reset();
              if(response.type=='add'){
                var type = "added";
              }
              else if(response.type=='update'){
                var type ="updated";
              }
              $('.alert-success').html('Employee ' + type + ' successfully').fadeIn().delay(3000).fadeOut('slow');
              
              show_all_staff();
            }
            else{
              alert('Error');
            }
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
  });
    
    //edit
    $('#showdata').on('click', '.item-edit', function(){
      var id = $(this).attr('data');
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Employee');
      $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/update_staff');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/home/edit_staff',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=txtStaffTitle]').val(data.title);
          $('input[name=txtStaffName]').val(data.firstname);
          $('input[name=txtStaffSurname]').val(data.surname);
          $('input[name=txtStaffStatus]').val(data.status);
          $('input[name=txtStaffGender]').val(data.gender);
          $('input[name=txtStaffDepartment]').val(data.department);
          $('input[name=txtId]').val(data.id);
         // $('input[')
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });


    //Delete the data
    $('#showdata').on('click', '.item-delete', function(){
      var id = $(this).attr('data');
      $('#deleteModal').modal('show');
      //prevent previous handler - unbind()
      $('#btnDelete').unbind().click(function(){
        $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php echo base_url() ?>index.php/home/delete_staff',
          data:{id:id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#deleteModal').modal('hide');
              $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
              show_all_staff();
            }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Error deleting');
          }
        });
      });
    });


  //function for displaying the data
    function show_all_staff(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/home/show_all_staff',
        async: false,
        dataType: 'json',
          success: function(data){
          var html = '';
          var i;
          
          for(i=0; i<data.length; i++){
          
          html +='<tr>'+
                  '<td>'+data[i].id+'</td>'+
                  '<td>'+data[i].title+'</td>'+
                  '<td>'+data[i].firstname+'</td>'+
                  '<td>'+data[i].surname+'</td>'+
                  '<td>'+data[i].status+'</td>'+
                  '<td>'+data[i].gender+'</td>'+
                  '<td>'+data[i].department_id+'</td>'+
                  '<td>'+
                    '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>&nbsp;'+
                    '<a href="javascript:;" class="btn btn-danger item-delete"  data="'+data[i].id+'">Delete</a>'+
                  '</td>'+
                  '</tr>';
          }
          
          $('#showdata').html(html);
        },
        error: function(){
          alert('Could not get Data from Database');
        }
      });
    }
});
</script>
