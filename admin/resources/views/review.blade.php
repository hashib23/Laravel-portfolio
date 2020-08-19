@extends('layout/app')
@section('title','Reviews')
@section('content')
<div id="mainDiv" class="container d-none" >
  <!-- Add new Button -->
  <button id="reviewAddBtn" class="btn btn-danger mt-4 ">Add New Review</button>
  <!-- Add new Button end-->
  <!-- Reviews table -->
  <div class="row">
    <div class="col-md-12 p-5">
      <table id="ReviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id='Review_table'>
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
        <h5 id="reviewDeleteId" class="m-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button type="button" id="ReviewDeleteConfirmBtn" class="btn btn-sm btn-danger" data-dismiss="modal">Yes</button>
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
        <h5 class="modal-title">Update Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="ReviewEditId" class="mt-4 d-none">   </h5>
        <div id="ReviewEditForm" class="d-none w-100">
          <input id="ReviewNameID" type="text" id="" class="form-control mb-4" placeholder="Review Name">
          <input id="ReviewDescID" type="text" id="" class="form-control mb-4" placeholder="Review Description">
          <input id="ReviewImgID" type="text" id="" class="form-control mb-4" placeholder="Review Image Link">
        </div>
        <img id="ReviewEditLoader" class="loading-icon m-5" src="{{asset('images/loader.gif')}}">
        <h5 id="ReviewEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="ReviewEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
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
        <h5 class="modal-title">Add Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
        <h5 id="AddID" class="mt-4">   </h5>
        <div id="ReviewAddForm" class="w-100">
          <input id="ReviewNameAddID" type="text" id="" class="form-control mb-4" placeholder="Review Name">
          <input id="ReviewDescAddID" type="text" id="" class="form-control mb-4" placeholder="Review Description">
          <input id="ReviewImgAddID" type="text" id="" class="form-control mb-4" placeholder="Review Image Link">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="ReviewAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal End-->

@endsection
@section('script')
<script type="text/javascript">
  getReviewsData();
</script>
@endsection