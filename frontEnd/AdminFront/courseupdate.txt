$('#CourseUpdateConfirmBtn').click(function(){
var courseID=$('#courseEditId').html();
var  courseName=$('#CourseNameUpdateId').val();
var  courseDes=$('#CourseDesUpdateId').val();
var courseFee=$('#CourseFeeUpdateId').val();
var  courseEnroll=$('#CourseEnrollUpdateId').val();
var  courseClass=$('#CourseClassUpdateId').val();
var courseLink=$('#CourseLinkUpdateId').val();
var  courseImg=$('#CourseImgUpdateId').val();
CourseUpdate(courseID,courseName,courseDes,courseFee,courseEnroll,courseClass,courseLink,courseImg);
})
function CourseUpdate(courseID,courseName,courseDes,courseFee,courseEnroll,courseClass,courseLink,courseImg) {
  
    if(courseName.length==0){
     toastr.error('Course Name is Empty !');
    }
    else if(courseDes.length==0){
     toastr.error('Course Description is Empty !');
    }
    else if(courseFee.length==0){
      toastr.error('Course Fee is Empty !');
    }
    else if(courseEnroll.length==0){
      toastr.error('Course Enroll is Empty !');
    }
    else if(courseClass.length==0){
      toastr.error('Course Class is Empty !');
    }
    else if(courseLink.length==0){
      toastr.error('Course Link is Empty !');
    }
    else if(courseImg.length==0){
      toastr.error('Course Image is Empty !');
    }
    else{
    $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/CoursesUpdate', {
            id: courseID,
            course_name: courseName,
            course_des: courseDes,
            course_fee: courseFee,
            course_totalenroll: courseEnroll,
            course_totalclass: courseClass,  
            course_link: courseLink,             
            course_img: courseImg,   
        })
        .then(function(response) {
            $('#CourseUpdateConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#updateCourseModal').modal('hide');
                toastr.success('Update Success');
                getCoursesData();
            } else {
                $('#updateCourseModal').modal('hide');
                toastr.error('Update Fail');
                getCoursesData();
            }  
         } 
         else{
            $('#updateCourseModal').modal('hide');
             toastr.error('Something Went Wrong !');
         }   
    })
    .catch(function(error) {
        $('#updateCourseModal').modal('hide');
        toastr.error('Something Went Wrong !');
   });
}
}