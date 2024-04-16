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
                                <h3 class="box-title">Student Year List</h3>
                                <a href="{{ route('student.year.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5">Add Student Year
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">SL</th>
                                                <th>Name</th>
                                                <th width="25%">Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $year)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $year->name }}</td>
                                                    <td>
                                                        <a href="{{ route('student.year.edit', $year->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('student.year.delete', $year->id) }}"
                                                            class="btn btn-danger" id="delete">Delete</a>
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
