//Project Add confirm btn
$('#projectAddConfirmBtn').click(function(){
  var name = $('#projectNameID').val();
  var desc = $('#projectDescID').val();
  var link = $('#projectLinkID').val();
  var img = $('#projectImgID').val();
  ProjectAdd(name, desc, link, img);
})


//Project Add
function ProjectAdd(projectName, projectDesc, projectLink, projectImg){
  
  if(projectName.length==0){
      toastr.error('Project Name is Empty !');
     }else if(projectDesc.length==0){
      toastr.error('Project Description is Empty !');
     }else if(projectLink.length==0){
         toastr.error('Project Link is Empty !');
     }else if(projectImg.length==0){
         toastr.error('Project Image is Empty !');
     }else{
      $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
      axios.post('/ProjectAdd',{
          name:projectName,
          desc:projectDesc,
          link:projectLink,
          img:projectImg,

      })
      .then(function(response) {
          $('#projectAddConfirmBtn').html("Save");
          if(response.status==200){
            if (response.data == 1) {
              $('#projectAddModal').modal('hide');
              toastr.success('Add Success');
              getServicesData();
          } else {
              $('#projectAddModal').modal('hide');
              toastr.error('Add Fail');
              getServicesData();
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

}





//Project edit/update save btn
$('#projectEditConfirmBtn').click(function(){
    var id = $('#projectEditId').html();
    var name = $('#projectNameID').val();
    var desc = $('#projectDescID').val();
    var link = $('#projectLinkID').val();
    var img = $('#projectImgID').val(); 
    ProjectUpdates(id,name,desc,link,img); 
}) 
  
//Project updates
function ProjectUpdates(projectID, projectName, projectDesc, projectLink, projectImg){

    if (projectName.length == 0) {
        toastr.error('Project Name empty');
      } else if (projectDesc.length == 0) {
        toastr.error('Project Description empty');
      } else if (projectLink.length == 0) {
        toastr.error('Project Link empty');
      } else if (projectImg.length == 0) {
        toastr.error('Project Image empty');
      }else{

        $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/ProjectUpdate',{
          id =  projectID,
          name =  projectName,
          desc =  projectDesc,
          link =  projectLink,
          img =  projectImg,
        })
        .then(function (response) {
            $('#projectEditConfirmBtn').html("Save");
            if (response.data == 1) {
              toastr.success('Update Success');
              $('#projectEditModal').modal('hide');
              getProjectsData();
    
            } else {
              toastr.warning('Update Fail');
              $('#projectEditModal').modal('hide');
              getProjectsData();
    
            }
          })
          .catch(function (error) {
    
          });
        }      

}