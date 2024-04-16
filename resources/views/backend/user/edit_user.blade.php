@extends('admin.admin_master')
@section('admin')
    <!-- Content Header (Page header) -->


    <div class="content-wrapper" style="min-height: 1189.3px;">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update User</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('users.update', $editData->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Role<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="role" id="role" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Role
                                                                </option>
                                                                <option value="Admin"
                                                                    {{ $editData->role == 'Admin' ? 'selected' : '' }}>
                                                                    Admin
                                                                </option>
                                                                <option
                                                                    value="Operator"{{ $editData->role == 'Operator' ? 'selected' : '' }}>
                                                                    Operator</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End offirstcolmd-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $editData->name }}" required>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>User Email<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $editData->email }}" required>
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- End offirstcolmd-6 -->
                                                <div class="col-md-6">

                                                </div><!-- End offirstcolmd-6 -->

                                            </div>


                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                    value="Update">
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
@endsection
