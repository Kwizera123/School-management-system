@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Content Header (Page header) -->


    <div class="content-wrapper" style="min-height: 1189.3px;">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Other Cost </h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('store.other.cost') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <!-- End offirstcolmd-6 -->
                        <div class="col-md-12">

                          


                          


                         

                          <div class="row"> <!-- Fouth Row -->

                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Amount<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="amount" class="form-control" required="">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->

                            <div class="col-md-3">

                                        <div class="form-group">
                                <h5>Date<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" class="form-control" required="">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->


                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image" class="form-control" id="image">      
                                </div>
                            </div>
                             

                            </div> <!-- End col md-3 -->

                            <div class="col-md-3">
                             
                              <div class="form-group">
                                <div class="controls">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" 
                                    style="width: 100px; height: 100px; border: 1px solid #000000">      
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->

                          </div> <!-- End of first Row -->

                          <div class="row">
                            <div class="col-md-12">

                              <div class="form-group">
                                <h5>Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <textarea name="description" id="description" class="form-control" required="" placeholder="Type Description..." aria-invalid="false"></textarea>
                                <div class="help-block"></div></div>
                              </div>

                            </div>
                          </div>
        
                        </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
          $('#image').change(function(e){
              var reader = new FileReader();
              reader.onload = function(e){
                  $('#showImage').attr('src',e.target.result);
              }
              reader.readAsDataURL(e.target.files['0']);
          });
      });
  </script>
@endsection
