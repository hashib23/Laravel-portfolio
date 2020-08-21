@extends('layout/app')
@section('title','Photo Gallery')
@section('content')

    <!-- Add new Button -->
    <button id="photoAddBtn" class="btn btn-danger mt-4 ">Add New Photo</button>
    <!-- Add new Button end-->


    <div class="container-fluid" >

        <div class="row photoRow">

        </div>

    </div>


    <!--Add Modal-->
    <div class="modal fade" id="PhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                    <h5 class="m-4">Add New Photo</h5>
                    <h5 id="photoAddId" class="m-4 d-none"></h5>
                    <input  id="imgInput"  type="file">
                    <img class="pt-2 imgPreview" id="imgPreview" src="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="SavePhoto" class="btn btn-sm btn-danger" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">

        //Photo add  Modal
        $('#photoAddBtn').click(function () {
            $('#PhotoModal').modal('show');
        })

        //photo preview
        $('#imgInput').change(function () {
            let reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event) {
                let ImgSource= event.target.result;
                $('#imgPreview').attr('src',ImgSource)
            }
        })

        //Save Photo
        $('#SavePhoto').on('click',function () {
            $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")

            let PhotoFile= $('#imgInput').prop('files')[0];
            let formData=new FormData();
            formData.append('photo',PhotoFile);

            axios.post('/PhotoUpload',formData).then(function (response) {
                if(response.status==200 && response.data==1){
                    $('#PhotoModal').modal('hide');
                    $('#SavePhoto').html('Save');
                    toastr.success('Photo Upload Success');
                }
                else{
                    $('#PhotoModal').modal('hide');
                    toastr.error('Photo Upload Fail');
                }
            }).catch(function (error) {
                $('#PhotoModal').modal('hide');
                toastr.error('Photo Upload Fail');
                $('#SavePhoto').html('Save');
            })
        });
        LoadPhoto();
        function LoadPhoto() {
            axios.get('/PhotoJSON').then(function (response) {
                $.each(response.data, function(i, item) {
                    $("<div class='col-md-3 p-1'>").html(
                        "<img class='imgOnRow' src="+item['location']+">"
                    ).appendTo('.photoRow');
                });
            }).catch(function (error) {
            })
        }



    </script>
@endsection
