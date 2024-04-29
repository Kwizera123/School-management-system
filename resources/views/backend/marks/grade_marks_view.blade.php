@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Mark Grade List</h3>
                                <a href="{{ route('marks.grade.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5">Add Grade Marks
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Grade Name</th>
                                                <th>Grade Point</th>
                                                <th>Start Marks</th>
                                                <th >End Marks</th>
                                                <th>Point Range</th>
                                                <th>Remark</th>
                                                <th width="15%">Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->grade_name }}</td>
                                                    <td>{{ $value->grade_point }}</td>
                                                    <td>{{ $value->start_marks }}</td>
                                                    <td>{{ $value->end_marks }}</td>
                                                    <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
                                                    <td>{{ $value->remarks }}</td>
                                                 
                                <td>
                                    <a title="Edit" href="{{ route('marks.grade.edit', $value->id) }}"
                                        class="btn btn-info"><i class="fa fa-edit"></i><a>
                                  
                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
