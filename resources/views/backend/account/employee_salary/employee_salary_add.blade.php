@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script>

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
                      <h4 class="box-title">Add <strong>Employee Salary</strong></h4>
                      </div>
            
                      <div class="box-body">
                    
                        
                          <div class="row">

                            <div class="col-md-6">

                              <div class="form-group">
                                <h5>Date<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                            </div>

                            </div> <!-- End col md-3 -->



                            <div class="col-md-6" style="padding-top:25px;">
                             
                            <a id="search" class="btn btn-primary" name="search">Search</a>
                            </div> <!-- End col md-4 -->
                          </div> <!-- End of row -->

                              <!-- Marks Entry Table -->         

                          <!-- Roll Generate Table -->
                          <div class="row">
                            <div class="col-md-12">

                              <div id="DocumentResults">
                                <script id="document-template" type="text/x-handlebars-template">

                                  <form action="{{ route('account.salary.store') }}" method="post">
                                    @csrf
                                <table class="table table-bordered table-striped" style="width: 100%">
                                  <thead>
                                    <tr>
                                      @{{{thsource}}}
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @{{#each this}}
                                    <tr>
                                      @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
                                  </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary" style="margin-top:10px">submit</button>
                                  </form>
                              </script>
                                  
                              </div>
                            
                            </div> <!-- End col md 12 -->
                          </div> <!-- End row -->

                          

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

    <script type="text/javascript">
      $(document).on('click','#search',function(){
        var date = $('#date').val();
         $.ajax({
          url: "{{ route('account.salary.getemployee')}}",
          type: "get",
          data: {'date':date},
          beforeSend: function() {       
          },
          success: function (data) {
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var html = template(data);
            $('#DocumentResults').html(html);
            $('[data-toggle="tooltip"]').tooltip();
          }
        });
      });
    
    </script>
    

@endsection
