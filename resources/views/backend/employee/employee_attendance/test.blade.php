<table id="example1" class="table table-bordered table-striped">
  <thead>
      <tr>
          <th width="10%">SL</th>
          <th>Name</th>
          <th>ID No</th>
          <th>Date</th>
          <th>Attendance Status</th>
          <th width="25%">Active</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($allData as $key => $value)
          <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $value['user']['name'] }}</td>
              <td>{{ $value['user']['id_no'] }}</td>
              <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
              <td>{{ $value->attend_status }}</td>
              
             
              <td>
                  <a href="{{ route('employee.leave.edit', $value->id) }}"
                      class="btn btn-info">Edit</a>
                  <a href="{{ route('employee.leave.delete', $value->id) }}"
                      class="btn btn-danger" id="delete">Delete</a>
              </td>
          </tr>
      @endforeach
  </tbody>

</table>