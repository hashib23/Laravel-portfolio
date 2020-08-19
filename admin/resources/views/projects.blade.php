@extends('layout/app')
@section('title','Projects')
@section('content')
<div id="mainDiv" class="container d-none" >
  <!-- Add new Button -->
  <button id="projectAddBtn" class="btn btn-danger mt-4 ">Add New Project</button>
  <!-- Add new Button end-->
  <!--Project table -->
  <div class="row">
    <div class="col-md-12 p-5">
      <table id="ProjectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <!--id="ProjectDataTable" this is for pagination -->
        <thead>
          <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id='project_table'>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- loaderDiv -->
<div id="loaderDiv" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-img" src="{{asset('images/loader.gif')}}">
    </div>
  </div>
</div>

<!-- wrongDiv -->
<div id="wrongDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Data Not Found, Something is Wrong!</h3>
    </div>
  </div>
</div>

<!-- Project Delete Modal-->
<div class="modal fade" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="m-4">Do You Want to Delete</h5>
        <h5 id="projectDeleteId" class="m-4"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button type="button" id="projectDeleteConfirmBtn" class="btn btn-sm btn-danger" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- project Edit Modal Start-->
<div class="modal fade" id="projectEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="projectEditId" class="mt-4">  </h5>
        <div id="projectEditForm" class="d-none w-100">
          <input id="projectNameID" type="text" id="" class="form-control mb-4" placeholder="Project Name">
          <input id="projectDescID" type="text" id="" class="form-control mb-4" placeholder="Project Description">
          <input id="projectDescID" type="text" id="" class="form-control mb-4" placeholder="Project Link">
          <input id="projectImgID" type="text" id="" class="form-control mb-4" placeholder="Project Image Link">
        </div>
        <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.gif')}}">
        <h5 id="projectEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="projectEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal End-->

<!--Add Modal Start-->
<div class="modal fade" id="projectAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="projectAddID" class="mt-4">   </h5>
        <div id="projectAddForm" class="w-100">
            <input id="projectNameID" type="text" id="" class="form-control mb-4" placeholder="Project Name">
            <input id="projectDescID" type="text" id="" class="form-control mb-4" placeholder="Project Description">
            <input id="projectDescID" type="text" id="" class="form-control mb-4" placeholder="Project Link">
            <input id="projectImgID" type="text" id="" class="form-control mb-4" placeholder="Project Image Link">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="projectAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal End-->

@endsection
@section('script')
<script type="text/javascript">
  getProjectsData();

//Project show
function getProjectsData() {

  axios.get('/getProjectsData')
    .then(function (response) {

      if (response.status == 200) {

        $('#mainDiv').removeClass('d-none');
        $('#loaderDiv').addClass('d-none');
        $('#ProjectDataTable').DataTable().destroy(); //this is for pagination
        $('#project_table').empty();

        var jsonData = response.data;
        $.each(jsonData, function (i, item) {
          $('<tr>').html(
            "<td><img class='table-img' src=" + jsonData[i].project_img + "> </td>" +
            "<td>" + jsonData[i].project_name + "</td>" +
            "<td>" + jsonData[i].project_desc + "</td>" +
            "<td><a class='projectEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
            "<td><a class='projectDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#project_table')

        });

        //Project table Delete  modal
        $('.projectDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#projectDeleteId').html(id);
          $('#projectDeleteModal').modal('show');

        })


        //Project table Edit  Modal
        $('.projectEditBtn').click(function () {
            var id = $(this).data('id');
            $('#projectEditId').html(id);
            ProjectUpdateDetails(id);
         $('#projectEditModal').modal('show');

        })
        //this is for pagination 
        $('#ProjectDataTable').DataTable({'order':false});
        $('.dataTables_length').addClass('bs-select');
        //this is for pagination end
      } else {

        $('#wrongDiv').removeClass('d-none')
        $('#loaderDiv').addClass('d-none')
      }

    })
    .catch(function (error) {

      $('#wrongDiv').removeClass('d-none')
      $('#loaderDiv').addClass('d-none')

    });

}

//Project Delete  modal Yes icon click
    $('#projectDeleteConfirmBtn').click(function () {
    var id = $('#projectDeleteId').html();
    ProjectDelete(id);
    })

// Project delete function
function ProjectDelete(deleteID) {

    $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
     axios.post('/ProjectDelete', {
         id: deleteID
       })
       .then(function (response) {
       $('#projectDeleteConfirmBtn').html("Yes");
         if (response.data == 1) {
           toastr.success('Delete Success');
           $('#projectDeleteModal').modal('hide');
           getProjectsData();
         } else {
           toastr.warning('Delete Fail');
           $('#projectDeleteModal').modal('hide');
           getProjectsData();
         }
   
       })
   
       .catch(function (error) {
   
   
       });
   
   }

// Project Update Details 
function ProjectUpdateDetails(detailsID) {
    axios.post('/ProjectDetails', {
        id: detailsID
      })
      .then(function (response) {
        if (response.status == 200) {
          $('#projectEditForm').removeClass('d-none');
          $('#projectEditLoader').addClass('d-none');
  
          var jsonData = response.data;
          $('#projectNameID').val(jsonData[0].project_name);
          $('#projectDescID').val(jsonData[0].project_desc);
          $('#projectLinkID').val(jsonData[0].project_link);
          $('#projectImgID').val(jsonData[0].project_img);
          
        } else {
          $('#projectEditLoader').addClass('d-none');
          $('#projectEditWrong').removeClass('d-none');
        }
      })
      .catch(function (error) {
        $('#projectEditLoader').addClass('d-none');
        $('#projectEditWrong').removeClass('d-none');
      });
  }


//Project table add  Modal
$('#projectAddBtn').click(function () {          
    $('#projectAddModal').modal('show');
    })


// Projects AddModal Add Btn
$('#projectAddConfirmBtn').click(function() {
    var project_name = $('#projectNameID').val();
    var project_desc = $('#projectDescID').val();
    var project_link = $('#projectDescID').val();
    var project_img = $('#projectImgID').val();
    ProjectAdd(project_name,project_desc,project_link,project_img);
})


// Project Add Method
function ProjectAdd(projectName,projectDesc,projectLink,projectImg) {
  
    $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/ProjectAdd', {
        project_name: projectName,
        project_desc: projectDesc,
        project_link: projectLink,
        project_img: projectImg,
        })
        .then(function(response) {
            $('#projectAddConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#projectAddModal').modal('hide');
                toastr.success('Add Success');
                getProjectsData();
            } else {
                $('#projectAddModal').modal('hide');
                toastr.error('Add Fail');
                getProjectsData();
            }  
         } 
         else{
             $('#projectAddModal').modal('hide');
             toastr.error('Something Went Wrong !');
         }   
    })
    .catch(function(error) {
             $('#projectAddModal').modal('hide');
             toastr.error('Something Went Wrong !');
   });
}

  
</script>
@endsection