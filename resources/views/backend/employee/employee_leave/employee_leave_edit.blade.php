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
                        <h4 class="box-title">Edit Employee Leave</h4>

                    </div>
                    <!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col">
            <form method="post" action="{{ route('update.employee.leave',$editData->id)}}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="row">


                          
                            <!-- End offirstcolmd-6 -->
                            <div class="col-md-12">


                              <div class="row">

                                <div class="col-md-6">

                                  <div class="form-group">
                                    <h5>Employee  Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="employee_id" id="employee_id" required=""
                                            class="form-control">
                                            <option value="" selected="" disabled="">Select
                                                Employee Name
                                            </option>
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id}}" {{ ($editData->employee_id == $employee->id) ? 'selected' : ''  }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div> 


                                </div><!-- End of col md 6 -->

                                <div class="col-md-6">

                                  <div class="form-group">
                                    <h5> Start Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" class="form-control" value="{{ $editData->start_date }}">
                                    </div>
                                </div>
                                
                                </div>  <!-- End of col md 6 -->


      <div class="col-md-6">
    <div class="form-group">
      <h5>Leave Purpose<span class="text-danger">*</span></h5>
      <div class="controls">
          <select name="leave_purpose_id" id="leave_purpose_id" required=""
              class="form-control">
              <option value="" selected="" disabled="">Select
                  Leave Purpose
              </option>
              @foreach($leave_purpose as $leave)
              <option value="{{ $leave->id }}" {{ ($editData->leave_purpose_id == $leave->id)?'selected':'' }} > {{ $leave->name }}</option>
              @endforeach
              <option value="0">New Purpose</option>
          </select>
          <input type="text" name="name" id="add_another" class="form-control" placeholder=" Write Purpose" 
          style="display: none;">

      </div>
  </div>
  </div>  <!-- End of col md 6 -->
    
                              
            <div class="col-md-6">

                <div class="form-group">
                    <h5> End Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" name="end_date" class="form-control" value="{{ $editData->end_date }}">
                    </div>
                </div>
                
                </div>  <!-- End of col md 6 -->
            </div> <!-- End of raw -->
                            

                        
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
        $(document).on(`change`,`#leave_purpose_id`,function(){
           var leave_purpose_id = $(this).val();
           if(leave_purpose_id == '0'){
            $('#add_another').show();
           }else{
            $('#add_another').show();
           }
        });
    });
</script>
@endsection
