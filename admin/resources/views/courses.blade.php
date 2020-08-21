@extends('layout/app')
@section('title','Courses')
@section('content')


<div id="mainDivCourse" class="container">
	<!-- Add new Button -->
  <button id="courseAddBtn" class="btn btn-danger mt-4 ">Add New Course</button>
  <!-- Add new Button end-->
  <!-- courses table -->
<div class="row">
<div class="col-md-12 p-5">
<table id="CourseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Name</th>
	  <th class="th-sm">Course Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enrool</th>
	  <th class="th-sm">Details</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="course_table">


  </tbody>
</table>

</div>
</div>
</div>

<!-- loaderDivCourse -->
<div id="loaderDivCourse" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-img" src="{{asset('images/loader.gif')}}">
    </div>
  </div>
</div>

<!-- wrongDivCourse -->
<div id="wrongDivCourse" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Data Not Found, Something is Wrong!</h3>
    </div>
  </div>
</div>


<!--Add NewCourse Modal Start-->
<div class="modal fade " id="AddNewCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center ">
        <h5 id="courseAddID" class="mt-4 ">   </h5>
        <div class="container">
        	<div class="row">

        	<div class="col-md-6">
        		<input id="courseTitleAddID" type="text" id="" class="form-control mb-4" placeholder="Course Title">
          		<input id="courseSubtitleAddID" type="text" id="" class="form-control mb-4" placeholder="Course Subtitle">
          		<input id="courseDetailsAddID" type="text" id="" class="form-control mb-4" placeholder="Course Description">
        		<input id="courseFeeAddID" type="text" id="" class="form-control mb-4" placeholder="Course Fee">

        	</div>
        	<div class="col-md-6">
        		<input id="courseTotalenrollAddID" type="text" id="" class="form-control mb-4" placeholder="Course Total Enroll Link">
          		<input id="courseTotalclassAddID" type="text" id="" class="form-control mb-4" placeholder="Course Total Class">
          		<input id="courseLinkAddID" type="text" id="" class="form-control mb-4" placeholder="Course Site Link">
          		<input id="courseImgAddID" type="text" id="" class="form-control mb-4" placeholder="Course Image Link">
        	</div>

        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="courseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal End-->

<!--Course Delete Modal-->
<div class="modal fade" id="courseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="m-4">Do You Want to Delete</h5>
        <h5 id="courseDeleteId" class="m-4 d-none" ></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button type="button" id="courseDeleteConfirmBtn" class="btn btn-sm btn-danger" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Course Delete Modal End-->

<!--Course Edit Modal Start-->
<div class="modal fade " id="courseEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Course Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center ">
        <h5 id="courseEditID" class="mt-4 d-none">   </h5>
        <div class="container">
        	<div class="row d-none" id="courseEditForm">
        	<div class="col-md-6">
        		<input id="courseTitleID" type="text" id="" class="form-control mb-4" placeholder="Course Title">
          		<input id="courseSubtitleID" type="text" id="" class="form-control mb-4" placeholder="Course Subtitle">
          		<input id="courseDetailsID" type="text" id="" class="form-control mb-4" placeholder="Course Description">
        		<input id="courseFeeID" type="text" id="" class="form-control mb-4" placeholder="Course Fee">

        	</div>
        	<div class="col-md-6">
        		<input id="courseTotalenrollID" type="text" id="" class="form-control mb-4" placeholder="Course Total Enroll Link">
          		<input id="courseTotalclassID" type="text" id="" class="form-control mb-4" placeholder="Course Total Class">
          		<input id="courseLinkID" type="text" id="" class="form-control mb-4" placeholder="Course Site Link">
          		<input id="courseImgID" type="text" id="" class="form-control mb-4" placeholder="Course Image Link">
        	</div>
        	</div>

        	<img id="courseEditLoader" class="loading-icon m-5" src="{{asset('images/loader.gif')}}">
        	<h5 id="courseEditWrong" class="d-none">Something Went Wrong !</h5>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" id="courseEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!--Course Edi Modal End-->

@endsection

@section('script')
	<script type="text/javascript">
		getCoursesData();


    //service show
function getCoursesData() {

  axios.get('/getCoursesData')
    .then(function (response) {

      if (response.status == 200) {

        $('#mainDivCourse').removeClass('d-none');
        $('#loaderDivCourse').addClass('d-none');
        $('#CourseDataTable').DataTable().destroy();
        $('#course_table').empty();

        var jsonData = response.data;
        $.each(jsonData, function (i, item) {
          $('<tr>').html(

            "<td>" + jsonData[i].course_title + "</td>" +
            "<td>" + jsonData[i].course_fee + "</td>" +
            "<td>" + jsonData[i].course_totalclass + "</td>" +
            "<td>" + jsonData[i].course_totalenroll + "</td>" +
            "<td><a class='courseViewDetailsBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-eye'></i></a></td>" +
            "<td><a class='courseEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
            "<td><a class='courseDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#course_table')

        });

        //Course Delete  modal
        $('.courseDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#courseDeleteId').html(id);
          $('#courseDeleteModal').modal('show');

        })

        //course edit modal
        $('.courseEditBtn').click(function(){
          var id= $(this).data('id');
          $('#courseEditID').html(id);
          CourseUpdateDetails(id);
          $('#courseEditModal').modal('show');
        })

        $('#CourseDataTable').DataTable({'order':false});
        $('.dataTables_length').addClass('bs-select');

      } else {

        $('#wrongDivCourse').removeClass('d-none')
        $('#loaderDivCourse').addClass('d-none')
      }

    })
    .catch(function (error) {

      $('#wrongDivCourse').removeClass('d-none')
      $('#loaderDivCourse').addClass('d-none')

    });

}


//course add  Modal
$('#courseAddBtn').click(function () {
$('#AddNewCourseModal').modal('show');
})

// Courses Add confirm btn
$('#courseAddConfirmBtn').click(function() {
    var title = $('#courseTitleAddID').val();
    var subtitle = $('#courseSubtitleAddID').val();
    var details = $('#courseDetailsAddID').val();
    var fee = $('#courseFeeAddID').val();
    var totalenroll = $('#courseTotalenrollAddID').val();
    var totalclass = $('#courseTotalclassAddID').val();
    var link = $('#courseLinkAddID').val();
    var img = $('#courseImgAddID').val();
    CourseAdd(title, subtitle, details, fee, totalenroll, totalclass, link, img);
})

// Course Add Method
function CourseAdd(courseTitle,courseSubtitle,courseDetails,courseFee,courseTotalenroll,courseTotalclass,courseLink,courseImg) {

    if(courseTitle.length==0){
     toastr.error('Course Title is Empty !');
    }
    else if(courseSubtitle.length==0){
     toastr.error('Course Subtitle is Empty !');
    }
    else if(courseDetails.length==0){
      toastr.error('Course Description is Empty !');
    }
    else if(courseFee.length==0){
      toastr.error('Course Fee is Empty !');
    }
    else if(courseTotalenroll.length==0){
      toastr.error('Course Total Enroll is Empty !');
    }
    else if(courseTotalclass.length==0){
      toastr.error('Course Total Class is Empty !');
    }
    else if(courseLink.length==0){
      toastr.error('Course Link is Empty !');
    }
    else if(courseImg.length==0){
      toastr.error('Course Image is Empty !');
    }

    else{
    $('#courseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/CourseAdd', {
            title: courseTitle,
            subtitle: courseSubtitle,
            details: courseDetails,
            fee: courseFee,
            totalenroll: courseTotalenroll,
            totalclass: courseTotalclass,
            link: courseLink,
            img: courseImg,
        })
        .then(function(response) {
            $('#courseAddConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#AddNewCourseModal').modal('hide');
                toastr.success('Course Add Success');
                getCoursesData();
            } else {
                $('#AddNewCourseModal').modal('hide');
                toastr.error('Course Add Fail');
                getCoursesData();
            }
         }
         else{
             $('#AddNewCourseModal').modal('hide');
             toastr.error('Something Went Wrong !');
         }
    })
    .catch(function(error) {
             $('#AddNewCourseModal').modal('hide');
             toastr.error('Something Went Wrong !');
   });
}
}

//course Delete  modal Yes icon click
$('#courseDeleteConfirmBtn').click(function () {
  var id = $('#courseDeleteId').html();
  CourseDelete(id);

})

// Course delete function
function CourseDelete(deleteID) {

 $('#courseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
  axios.post('/CourseDelete', {
      id: deleteID
    })
    .then(function (response) {
    $('#courseDeleteConfirmBtn').html("Yes");
      if (response.data == 1) {
        toastr.success('Course Delete Success');
        $('#courseDeleteModal').modal('hide');
        getCoursesData();
      } else {
        toastr.warning('Course Delete Fail');
        $('#courseDeleteModal').modal('hide');
        getCoursesData();
      }

    })

    .catch(function (error) {


    });

}


// Course Update Details
function CourseUpdateDetails(detailsID) {
  axios.post('/CourseDetails', {
      id: detailsID
    })
    .then(function (response) {
      if (response.status == 200) {
        $('#courseEditForm').removeClass('d-none');
        $('#courseEditLoader').addClass('d-none');

        var jsonData = response.data;
        $('#courseTitleID').val(jsonData[0].course_title);
        $('#courseSubtitleID').val(jsonData[0].course_subtitle);
        $('#courseDetailsID').val(jsonData[0].course_details);
        $('#courseFeeID').val(jsonData[0].course_fee);
        $('#courseTotalenrollID').val(jsonData[0].course_totalenroll);
        $('#courseTotalclassID').val(jsonData[0].course_totalclass);
        $('#courseLinkID').val(jsonData[0].course_link);
        $('#courseImgID').val(jsonData[0].course_img);

      } else {
        $('#courseEditLoader').addClass('d-none');
        $('#courseEditWrong').removeClass('d-none');
      }
    })
    .catch(function (error) {
      $('#courseEditLoader').addClass('d-none');
      $('#courseEditWrong').removeClass('d-none');
    });
}



// Course Edit Modal Save Btn
$('#courseEditConfirmBtn').click(function () {
  var courseID = $('#courseEditID').html();
  var courseTitle = $('#courseTitleID').val();
  var courseSubtitle = $('#courseSubtitleID').val();
  var courseDetails = $('#courseDetailsID').val();
  var courseFee = $('#courseFeeID').val();
  var courseTotalenroll = $('#courseTotalenrollID').val();
  var courseTotalclass = $('#courseTotalclassID').val();
  var courseLink = $('#courseLinkID').val();
  var courseImg = $('#courseImgID').val();
  CourseUpdates(courseID, courseTitle, courseSubtitle, courseDetails, courseFee, courseTotalenroll, courseTotalclass, courseLink, courseImg);
})


function CourseUpdates(courseID, courseTitle, courseSubtitle, courseDetails, courseFee, courseTotalenroll, courseTotalclass, courseLink, courseImg) {

  if (courseTitle.length == 0) {
    toastr.error('Course Title empty');
  } else if (courseSubtitle.length == 0) {
    toastr.error('Course Subtitle empty');
  } else if (courseDetails.length == 0) {
    toastr.error('Course Description empty');
  } else if (courseFee.length == 0) {
    toastr.error('Course Fee empty');
  } else if (courseTotalenroll.length == 0) {
    toastr.error('Course totalenroll empty');
  } else if (courseTotalclass.length == 0) {
    toastr.error('Course totalclass empty');
  } else if (courseTotalclass.length == 0) {
    toastr.error('Course totalclass empty');
  } else if (courseImg.length == 0) {
    toastr.error('Course Image empty');
  }
   else {
  $('#courseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....

    axios.post('/CourseUpdate', {
        id: courseID,
        title: courseTitle,
        subtitle: courseSubtitle,
        details: courseDetails,
        fee: courseFee,
        totalenroll: courseTotalenroll,
        totalclass: courseTotalclass,
        link: courseLink,
        img: courseImg,
      })
      .then(function (response) {
        $('#courseEditConfirmBtn').html("Save");
        if (response.data == 1) {
          toastr.success('Update Success');
          $('#courseEditModal').modal('hide');
          getCoursesData();

        } else {
          toastr.warning('Update Fail');
          $('#courseEditModal').modal('hide');
          getCoursesData();

        }
      })
      .catch(function (error) {
          toastr.warning('Something went worng!');
          $('#courseEditModal').modal('hide');
          getCoursesData();
      });

  }

}




	</script>
@endsection
