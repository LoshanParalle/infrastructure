
<h3>COMPUTERS</h3>
  <div class="alert alert-success" style="display: none;">
    
  </div>
  <button id="btnAdd" class="btn btn-success">Add New</button>
  <table class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
    <tr>
        <td>#</td>
        <td>Computer</td>
        <td>Type</td>
        <td>OS</td>
        <td>Owner</td>
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
              <label for="name" class="label-control col-md-4">Computer</label>
              <div class="col-md-8">
                <input type="text" name="txtComputer" class="form-control">
              </div>
            </div>

               <div class="form-group">
              <label for="name" class="label-control col-md-4">Type</label>
              <div class="col-md-8">
                <input type="text" name="txtComputerType" class="form-control">
              </div>
            </div>

               <div class="form-group">
              <label for="name" class="label-control col-md-4">OS</label>
              <div class="col-md-8">
                <input type="text" name="txtComputerOS" class="form-control">
              </div>
            </div>

               <div class="form-group">
              <label for="name" class="label-control col-md-4">Owner</label>
              <div class="col-md-8">
                <input type="text" name="txtComputerOwner" class="form-control">
              </div>
            </div>

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
          Do you want to delete this Computer?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ***********************         JAVASCRIPT     ****************************************** -->
<script type="text/javascript">
//Put all the J.S actions in one function  
$(function(){

//show all the computers when page loads
show_all_computers();

    //Modal for Adding a New staff member
    $('#btnAdd').click(function(){
      $('#myModal').modal('show');
      
      //going to toggle the modal name between add and edit 
      $('#myModal').find('.modal-title').text('Add New Email');
      $('#myForm').attr('action', '<?php echo base_url() ?>index.php/computers/add_computer');
    });

      $('#btnSave').click(function(){
      
      //set the forms action 
      var url = $('#myForm').attr('action');
      
      //set the form elements to a string
      var data = $('#myForm').serialize(); 
      
      //setup the input fields for validation 
      var computer = $('input[name=txtComputer]');
      var type = $('input[name=txtComputerType]');
      var os = $('input[name=txtComputerOS]');
      var owner = $('input[name=txtComputerOwner]');
      
      //create a checker
      var result = '';

      //check the title for input
      if(computer.val()==''){
        computer.parent().parent().addClass('has-error');
      }else{
        computer.parent().parent().removeClass('has-error');
        result +='1';
      }

      //check the name for input
      if(type.val()==''){
        type.parent().parent().addClass('has-error');
      }else{
        type.parent().parent().removeClass('has-error');
        result +='2';
      }

        //check the name for input
      if(os.val()==''){
        os.parent().parent().addClass('has-error');
      }else{
        os.parent().parent().removeClass('has-error');
        result +='3';
      }

        //check the name for input
      if(owner.val()==''){
        owner.parent().parent().addClass('has-error');
      }else{
        owner.parent().parent().removeClass('has-error');
        result +='4';
      }


      
      //setup alerts for success or failure upon inputs
      if(result=='1234'){
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
              $('.alert-success').html('computer added successfully').fadeIn().delay(4000).fadeOut('slow');
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
      $('#myModal').find('.modal-title').text('Edit Email');
      $('#myForm').attr('action', '<?php echo base_url() ?>index.php/computers/update_computer');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/computers/edit_computer',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=txtComputer]').val(data.computer_name);
          $('input[name=txtComputerType]').val(data.computer_type);
          $('input[name=txtComputerOS]').val(data.os_version);
          $('input[name=txtComputerOwner]').val(data.staff_id);
          $('input[name=txtId]').val(data.id);
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
          url: '<?php echo base_url() ?>index.php/computers/delete_computer',
          data:{id:id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#deleteModal').modal('hide');
              $('.alert-success').html('Computer Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
              show_all_emails();
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
    function show_all_computers(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/computers/show_all_computers',
        async: false,
        dataType: 'json',
          success: function(data){
          var html = '';
          var i;
          
          for(i=0; i<data.length; i++){
          
          html +='<tr>'+
                  '<td>'+data[i].id+'</td>'+
                  '<td>'+data[i].computer_name+'</td>'+
                  '<td>'+data[i].computer_type+'</td>'+
                  '<td>'+data[i].os_version+'</td>'+
                  '<td>'+data[i].staff_id+'</td>'+
                  '<td>'+
                    '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>&nbsp;'+
                    '<a href="javascript:;" class="btn btn-danger item-delete disabled"  data="'+data[i].id+'">Delete</a>'+
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

