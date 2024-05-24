@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                  <div class="col-12">
                    <div class="box bb-3 border-warning">
                      <div class="box-header">
                      <h4 class="box-title">Manage <strong>MarkSheet Generate</strong></h4>
                      </div>
            
                      <div class="box-body">
                    
                        <form method="get" action="{{ route('report.marksheet.get') }}" target="_blank">
                          @csrf
                          <div class="row">


                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Year<span class="text-danger"></span></h5>
                                <div class="controls">
                                  <select name="year_id" id="year_id" required="" class="form-control">                              
                                  <option value="" selected="" disabled="">Select
                                    Year
                                  </option>
                                  @foreach ($years as $year)
                                  <option value="{{ $year->id }}">{{ $year->name }}</option>
                                  @endforeach
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->

                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Class<span class="text-danger"></span></h5>
                                <div class="controls">
                                  <select name="class_id" id="class_id" required="" class="form-control">                                 
                                  <option value="" selected="" disabled="">Select
                                    Class
                                  </option>
                                  @foreach ($classes as $class)
                                  <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                  @endforeach
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->


                            


                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Exam Type<span class="text-danger"></span></h5>
                                <div class="controls">
                                  <select name="exam_type_id" id="exam_type_id" required="" class="form-control">                                 
                                  <option value="" selected="" disabled="">Select Exam </option>
                                  @foreach ($exam_types as $exam)
                                  <option value="{{ $exam->id }}" >{{ $exam->name }}</option>
                                  @endforeach
                              </select>
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->


                            <div class="col-md-3">

                              <div class="form-group">
                                <h5>Id No<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="id_no" class="form-control" required="">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->


                            <div class="col-md-3" style="padding-top:25px;">
                             
                              <input type="submit" class="btn btn-rounded btn-primary" value="Search"> 
                            </div> <!-- End col md-4 -->
                          </div> <!-- End of row -->

                              <!-- Marks Entry Table -->         
                        </form>                    
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
  
<!-- For getting Student Subject -->

    

@endsection
