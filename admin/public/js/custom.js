
//Review show
function getReviewsData() {

  axios.get('/getReviewsData')
    .then(function (response) {

      if (response.status == 200) {

        $('#mainDiv').removeClass('d-none');
        $('#loaderDiv').addClass('d-none');
        $('#ReviewDataTable').DataTable().destroy();
        $('#Review_table').empty();

        var jsonData = response.data;
        $.each(jsonData, function (i, item) {
          $('<tr>').html(
            "<td><img class='table-img' src=" + jsonData[i].review_img + "> </td>" +
            "<td>" + jsonData[i].review_name + "</td>" +
            "<td>" + jsonData[i].review_desc + "</td>" +
            "<td><a class='ReviewEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
            "<td><a class='ReviewDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#Review_table')

        });

        //Review table Delete  moal
        $('.ReviewDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#ReviewDeleteId').html(id);
          $('#ReviewdeleteModal').modal('show');

        })


        //Review table Edit  Modal
        $('.ReviewEditBtn').click(function () {
          var id = $(this).data('id');
          $('#ReviewEditId').html(id);
          ReviewUpdateDetails(id);
         $('#editModal').modal('show');

        })
        //this is for pagination 
        $('#ReviewDataTable').DataTable({'order':false});
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