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
                        <h4 class="box-title">Edit Employee </h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('update.employee.registration',$editData->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <!-- End offirstcolmd-6 -->
                        <div class="col-md-12">

                          <div class="row"> <!-- First Row -->

      <div class="col-md-4">

        <div class="form-group">
          <h5>Employee Name<span class="text-danger">*</span></h5>
          <div class="controls">
              <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}">
          </div>
      </div>

      </div> <!-- End col md-4 -->


        <div class="col-md-4">

          <div class="form-group">
            <h5>Father's Name<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="fname" class="form-control" required="" value="{{ $editData->fname }}">
            </div>
        </div>

        </div> <!-- End col md-4 -->


        <div class="col-md-4">

          <div class="form-group">
            <h5>Mother's Name<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="mname" class="form-control" required="" value="{{ $editData->mname }}">
            </div>
        </div>

        </div> <!-- End col md-4 -->



                          </div> <!-- End of first Row -->


          <div class="row"> <!-- Second Row -->

            <div class="col-md-4">

              <div class="form-group">
                <h5>Mobile Number <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="mobile" class="form-control" required="" value="{{ $editData->mobile }}">
                </div>
            </div>

            </div> <!-- End col md-4 -->


                            <div class="col-md-4">

                              <div class="form-group">
                                <h5>Address<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" required="" value="{{ $editData->address }}">
                                </div>
                            </div>

                            </div> <!-- End col md-4 -->


                            <div class="col-md-4">

                              <div class="form-group">
                                <h5>Gender<span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="gender" id="gender" required="" 
                                  class="form-control">
                                  <option value="" selected="" disabled="">Select
                                      Gender
                                  </option>
                                  <option value="Male"  {{ ($editData->gender == 'Male')? 'selected': '' }}>Male</option>
                                  <option value="Female" {{ ($editData->gender == 'Female')? 'selected': '' }}>Female</option>
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-4 -->



                          </div> <!-- End of Second Row -->


                          <div class="row"> <!-- Third Row -->

                            <div class="col-md-4">

                              <div class="form-group">
                                <h5>Religion<span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="religion" id="religion" required=""
                                  class="form-control">
                                  <option value="" selected="" disabled="">Select
                                    Religion
                                  </option>
                                  
                                  <option value="Christian"  {{ ($editData->religion == 'Christian')? 'selected': '' }}>Christian</option>
                                  <option value="Jehova"  {{ ($editData->religion == 'Jehova')? 'selected': '' }}>Jehova</option>
                                  <option value="Islam"  {{ ($editData->religion == 'Islam')? 'selected': '' }}>Islam</option>
                                  
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-4 -->

                            <div class="col-md-4">

                              <div class="form-group">
                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="dob" class="form-control" required="" value="{{ $editData->dob }}">
                                </div>
                            </div>

                            </div> <!-- End col md-4 -->


                            <div class="col-md-4">

                              <div class="form-group">
                                <h5>Designation<span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="designation_id" required=""
                                  class="form-control">
                                  <option value="" selected="" disabled="">Select
                                    Designation
                                  </option>
                                  @foreach ($designation as $desi)
                                  <option value="{{ $desi->id }}" {{ ($editData->designation_id == $desi->id)?'selected':'' }} >{{ $desi->name }}</option>
                                  @endforeach
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-4 -->

                          </div> <!-- End of Third Row -->


                          <div class="row"> <!-- Fouth Row -->
                            @if(!@editData)
                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Salary<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="salary" class="form-control" required="" value="{{ $editData->salary }}">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->
                            @endif

                            @if(!@editData)
                            <div class="col-md-3">

                                        <div class="form-group">
                                <h5>Joining Date<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="join_date" class="form-control" required="" value="{{ $editData->join_date }}">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->
                            @endif


                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Profile Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image" class="form-control" id="image">      
                                </div>
                            </div>
                             

                            </div> <!-- End col md-3 -->

                            <div class="col-md-3">
                             
                              <div class="form-group">
                                <div class="controls">
                                  <img id="showImage" src="{{ (!empty($editData->image))? url('upload/employee_images/'.$editData->image):url('upload/no_image.jpg') }}" 
                                  style="width: 100px; height: 100px; border: 1px solid #000000">        
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->

                          </div> <!-- End of Fouth Row -->
        
                        </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update">
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
