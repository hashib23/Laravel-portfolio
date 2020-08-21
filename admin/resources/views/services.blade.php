@extends('layout/app')
@section('title','Services')
@section('content')
<div id="mainDiv" class="container d-none" >
  <!-- Add new Button -->
  <button id="serviceAddBtn" class="btn btn-danger mt-4 ">Add New Service</button>
  <!-- Add new Button end-->
  <!-- service table -->
  <div class="row">
    <div class="col-md-12 p-5">
      <table id="ServiceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id='service_table'>
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

<!--Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="m-4">Do You Want to Delete</h5>
        <h5 id="serviceDeleteId" class="m-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button type="button" id="serviceDeleteConfirmBtn" class="btn btn-sm btn-danger" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal Start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="serviceEditId" class="mt-4 d-none">   </h5>
        <div id="serviceEditForm" class="d-none w-100">
          <input id="serviceNameID" type="text" id="" class="form-control mb-4" placeholder="Service Name">
          <input id="serviceDescID" type="text" id="" class="form-control mb-4" placeholder="Service Description">
          <input id="serviceImgID" type="text" id="" class="form-control mb-4" placeholder="Service Image Link">
        </div>
        <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loader.gif')}}">
        <h5 id="serviceEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="serviceEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal End-->

<!--Add Modal Start-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="serviceAddID" class="mt-4">   </h5>
        <div id="serviceAddForm" class="w-100">
          <input id="serviceNameAddID" type="text" id="" class="form-control mb-4" placeholder="Service Name">
          <input id="serviceDescAddID" type="text" id="" class="form-control mb-4" placeholder="Service Description">
          <input id="serviceImgAddID" type="text" id="" class="form-control mb-4" placeholder="Service Image Link">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="serviceAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal End-->

@endsection
@section('script')
<script type="text/javascript">
  getServicesData();

//service show
function getServicesData() {

  axios.get('/getServicesData')
    .then(function (response) {

      if (response.status == 200) {

        $('#mainDiv').removeClass('d-none');
        $('#loaderDiv').addClass('d-none');
        $('#ServiceDataTable').DataTable().destroy();
        $('#service_table').empty();

        var jsonData = response.data;
        $.each(jsonData, function (i, item) {
          $('<tr>').html(
            "<td><img class='table-img' src=" + jsonData[i].service_img + "> </td>" +
            "<td>" + jsonData[i].service_name + "</td>" +
            "<td>" + jsonData[i].service_desc + "</td>" +
            "<td><a class='serviceEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
            "<td><a class='serviceDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#service_table')

        });

        //Service table Delete  moal
        $('.serviceDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#serviceDeleteId').html(id);
          $('#deleteModal').modal('show');

        })


        //Service table Edit  Modal
        $('.serviceEditBtn').click(function () {
          var id = $(this).data('id');
          $('#serviceEditId').html(id);
          ServiceUpdateDetails(id);
         $('#editModal').modal('show');
        })
        //this is for pagination
        $('#ServiceDataTable').DataTable({'order':false});
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

//Service Delete  moal Yes icon click
$('#serviceDeleteConfirmBtn').click(function () {
  var id = $('#serviceDeleteId').html();
  ServiceDelete(id);

})

// service delete function
function ServiceDelete(deleteID) {

 $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
  axios.post('/ServiceDelete', {
      id: deleteID
    })
    .then(function (response) {
    $('#serviceDeleteConfirmBtn').html("Yes");
      if (response.data == 1) {
        toastr.success('Delete Success');
        $('#deleteModal').modal('hide');
        getServicesData();
      } else {
        toastr.warning('Delete Fail');
        $('#deleteModal').modal('hide');
        getServicesData();
      }

    })

    .catch(function (error) {


    });

}

// Each Service Update Details
function ServiceUpdateDetails(detailsID) {
  axios.post('/ServiceDetails', {
      id: detailsID
    })
    .then(function (response) {
      if (response.status == 200) {
        $('#serviceEditForm').removeClass('d-none');
        $('#serviceEditLoader').addClass('d-none');

        var jsonData = response.data;
        $('#serviceNameID').val(jsonData[0].service_name);
        $('#serviceDescID').val(jsonData[0].service_desc);
        $('#serviceImgID').val(jsonData[0].service_img);

      } else {
        $('#serviceEditLoader').addClass('d-none');
        $('#serviceEditWrong').removeClass('d-none');
      }
    })
    .catch(function (error) {
      $('#serviceEditLoader').addClass('d-none');
      $('#serviceEditWrong').removeClass('d-none');
    });
}

// Services Edit Modal Save Btn
$('#serviceEditConfirmBtn').click(function () {
  var id = $('#serviceEditId').html();
  var name = $('#serviceNameID').val();
  var desc = $('#serviceDescID').val();
  var img = $('#serviceImgID').val();
  ServiceUpdates(id, name, desc, img);
})

function ServiceUpdates(serviceID, serviceName, serviceDesc, serviceImg) {

  if (serviceName.length == 0) {
    toastr.error('Service Name empty');
  } else if (serviceDesc.length == 0) {
    toastr.error('Service Description empty');
  } else if (serviceImg.length == 0) {
    toastr.error('Service Image empty');
  } else {
    $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/ServiceUpdate', {
        id: serviceID,
        name: serviceName,
        desc: serviceDesc,
        img: serviceImg,
      })
      .then(function (response) {
        $('#serviceEditConfirmBtn').html("Save");
        if (response.data == 1) {
          toastr.success('Update Success');
          $('#editModal').modal('hide');
          getServicesData();

        } else {
          toastr.warning('Update Fail');
          $('#editModal').modal('hide');
          getServicesData();

        }
      })
      .catch(function (error) {

      });

  }

}

//Service table add  Modal
$('#serviceAddBtn').click(function () {
$('#AddModal').modal('show');
})

// Services AddModal Add Btn
$('#serviceAddConfirmBtn').click(function() {
    var name = $('#serviceNameAddID').val();
    var desc = $('#serviceDescAddID').val();
    var img = $('#serviceImgAddID').val();
    ServiceAdd(name,desc,img);
})


// Service Add Method
function ServiceAdd(serviceName,serviceDesc,serviceImg) {

    if(serviceName.length==0){
     toastr.error('Service Name is Empty !');
    }
    else if(serviceDesc.length==0){
     toastr.error('Service Description is Empty !');
    }
    else if(serviceImg.length==0){
      toastr.error('Service Image is Empty !');
    }
    else{
    $('#serviceAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/ServiceAdd', {
            name: serviceName,
            desc: serviceDesc,
            img: serviceImg,
        })
        .then(function(response) {
            $('#serviceAddConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#AddModal').modal('hide');
                toastr.success('Add Success');
                getServicesData();
            } else {
                $('#AddModal').modal('hide');
                toastr.error('Add Fail');
                getServicesData();
            }
         }
         else{
             $('#AddModal').modal('hide');
             toastr.error('Something Went Wrong !');
         }
    })
    .catch(function(error) {
             $('#AddModal').modal('hide');
             toastr.error('Something Went Wrong !');
   });
  }
}

</script>
@endsection
