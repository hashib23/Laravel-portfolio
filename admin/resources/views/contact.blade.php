@extends('layout/app')
@section('title','Contacts')
@section('content')
<div id="mainDiv" class="container d-none" >
  
  <!-- Contact table -->
  <div class="row">
    <div class="col-md-12 p-5">
      <table id="ContactsDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Name</th>
            <th class="th-sm">Mobile</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Message</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="contact_table">
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

<!--Contact Delete Modal-->
<div class="modal fade" id="contactDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="m-4">Do You Want to Delete</h5>
        <h5 id="contactDeleteId" class="m-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button type="button" id="contactDeleteConfirmBtn" class="btn btn-sm btn-danger" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal Start-->
<div class="modal fade" id="contactEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="contactEditId" class="mt-4 d-none">   </h5>
        <div id="contactEditForm" class="d-none w-100">
          <input id="contactNameID" type="text" id="" class="form-control mb-4" placeholder="Contact Name">
          <input id="contactMobileID" type="text" id="" class="form-control mb-4" placeholder="Contact Mobile">
          <input id="contactEmailID" type="text" id="" class="form-control mb-4" placeholder="Contact Email">
          <input id="contactMsgID" type="text" id="" class="form-control mb-4" placeholder="Contact Message">
        </div>
        <img id="contactEditLoader" class="loading-icon m-5" src="{{asset('images/loader.gif')}}">
        <h5 id="contactEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="contactEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
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
        <h5 class="modal-title">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="contactAddID" class="mt-4">   </h5>
        <div id="contactAddForm" class="w-100">
          <input id="contactNameAddID" type="text" id="" class="form-control mb-4" placeholder="Contact Name">
          <input id="contactMobileAddID" type="text" id="" class="form-control mb-4" placeholder="Contact Description">
          <input id="contactEmailAddID" type="text" id="" class="form-control mb-4" placeholder="ontact Description">
          <input id="contactMsgAddID" type="text" id="" class="form-control mb-4" placeholder="Cervice Image Link">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="contactAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal End-->

@endsection
@section('script')
<script type="text/javascript">
  getContactsData();

//Contact show
function getContactsData() {

  axios.get('/getContactsData')
    .then(function (response) {

      if (response.status == 200) {

        $('#mainDiv').removeClass('d-none');
        $('#loaderDiv').addClass('d-none');
        $('#ContactsDataTable').DataTable().destroy();
        $('#contact_table').empty();

        var jsonData = response.data;
        $.each(jsonData, function (i, item) {
          $('<tr>').html(
            "<td>" + jsonData[i].contact_name + "</td>" +
            "<td>" + jsonData[i].contact_mobile + "</td>" +
            "<td>" + jsonData[i].contact_email + "</td>" +
            "<td>" + jsonData[i].contact_msg + "</td>" +
            "<td><a class='contactEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
            "<td><a class='contactDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#contact_table')

        });

        //Contact table Delete  moal
        $('.contactDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#contactDeleteId').html(id);
          $('#contactDeleteModal').modal('show');

        })


        //Contact table Edit  Modal
        $('.contactEditBtn').click(function () {
          var id = $(this).data('id');
          $('#contactEditId').html(id);
          ContactUpdateDetails(id);
         $('#contactEditModal').modal('show');

        })
        //this is for pagination 
        $('#ContactsDataTable').DataTable({'order':false});
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


//Contract delete confirm btn
$('#contactDeleteConfirmBtn').click(function(){
     var id = $('#contactDeleteId').html();
     ContactDelete(id);
})

function ContactDelete(deleteID){
  $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")//animation

  axios.post('/ContactDelete', {
      id: deleteID
    })
    .then(function (response) {
    $('#contactDeleteConfirmBtn').html("Yes");
      if (response.data == 1) {
        toastr.success('Delete Success');
        $('#contactDeleteModal').modal('hide');
        getContactsData();
      } else {
        toastr.warning('Delete Fail');
        $('#contactDeleteModal').modal('hide');
        getContactsData();
      }

    })

    .catch(function (error) {

    });

}


// Each Service Update Details 
function ContactUpdateDetails(detailsID) {
  axios.post('/ContactDetails', {
      id: detailsID
    })
    .then(function (response) {
      if (response.status == 200) {
        $('#contactEditForm').removeClass('d-none');
        $('#contactEditLoader').addClass('d-none');

        var jsonData = response.data;
        $('#contactNameID').val(jsonData[0].contact_name);
        $('#contactMobileID').val(jsonData[0].contact_mobile);
        $('#contactEmailID').val(jsonData[0].contact_email);
        $('#contactMsgID').val(jsonData[0].contact_msg);
        
      } else {
        $('#contactEditLoader').addClass('d-none');
        $('#contactEditWrong').removeClass('d-none');
      }
    })
    .catch(function (error) {
      $('#contactEditLoader').addClass('d-none');
      $('#contactEditWrong').removeClass('d-none');
    });
}

//contact update confirm btn
$('#contactEditConfirmBtn').click(function(){
   var id = $('#contactEditId').html();
   var name =  $('#contactNameID').val();
   var mobile = $('#contactMobileID').val();
   var email = $('#contactEmailID').val();
   var msg = $('#contactMsgID').val();
   ContactUpdates(id, name, mobile, email, msg);
})

function ContactUpdates(cintactID, contactName, contactMobile, contactEmail, contactMsg){

  if (contactName.length == 0) {
    toastr.error('Service Name empty');
  } else if (contactMobile.length == 0) {
    toastr.error('Service Description empty');
  } else if (contactEmail.length == 0) {
    toastr.error('Service Image empty');
  } else if (contactMsg.length == 0) {
    toastr.error('Service Image empty');
  }  else {
    $('#contactEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/ContactUpdate', {
        id: cintactID,
        name: contactName,
        mobile: contactMobile,
        email: contactEmail,
        msg: contactMsg,
      })
      .then(function (response) {
        $('#contactEditConfirmBtn').html("Save");
        if (response.data == 1) {
          toastr.success('Update Success');
          $('#contactEditModal').modal('hide');
          getContactsData();

        } else {
          toastr.warning('Update Fail');
          $('#contactEditModal').modal('hide');
          getContactsData();

        }
      })
      .catch(function (error) {

      });

  }
}




  
</script>
@endsection






