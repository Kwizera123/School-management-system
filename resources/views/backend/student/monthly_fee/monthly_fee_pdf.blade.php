<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

  <table id="customers">
    <tr>
      <td><h2>
        <?php $image_path = '/upload/sinapyschool.png'; ?>
        <img src="{{ public_path() . $image_path }}" width="100" height="100">
        </h2></td>

      <td><h3>Sinapy School Managent System</h3>
      <p>School Address</p>
      <p>Phone : 0788820700</p>
      <p>Email : kwizerasinapy49@gmail.com</p>
      <p><b>Student Monthly Fee</b></p>
      </td>
    </tr>
  </table>

  @php
  $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();
            $originalfee = $registrationfee->amout;
            $discount = $details['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;
  @endphp



<table id="customers">
  <tr>
    <th width="10%">Sl No</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no']}}</td>
  </tr>

  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll}}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name']}}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname']}}</td>
  </tr>

  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name']}}</td>
  </tr>

  <tr>
    <td>6</td>
    <td><b> Class</b></td>
    <td>{{ $details['student_class']['name']}}</td>
  </tr>

  <tr>
    <td>7</td>
    <td><b>Monthly Fee</b></td>
    <td>{{ $originalfee }} Frw</td>
  </tr>

  <tr>
    <td>8</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount}} %</td>
  </tr>

  <tr>
    <td>9</td>
    <td><b>Fee for this Student of {{ $month }}</b></td>
    <td>{{ $finalfee }} Frw</td>
  </tr>
 
</table>
<br>
<i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color:#000604; margin-bottom: 8px">

<table id="customers">
  <tr>
    <td><h2>Sinapy</h2></td>
    <td><h3>Sinapy School Managent System</h3>
    <p>School Address</p>
    <p>Phone : 0788820700</p>
    <p>Email : kwizerasinapy49@gmail.com</p>
    <p><b>Student Monthly Fee</b></p>
    </td>
  </tr>
</table>

@php
$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();
          $originalfee = $registrationfee->amout;
          $discount = $details['discount']['discount'];
          $discounttablefee = $discount/100*$originalfee;
          $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp



<table id="customers">
<tr>
  <th width="10%">Sl No</th>
  <th width="45%">Student Details</th>
  <th width="45%">Student Data</th>
</tr>
<tr>
  <td>1</td>
  <td><b>Student ID No</b></td>
  <td>{{ $details['student']['id_no']}}</td>
</tr>

<tr>
  <td>2</td>
  <td><b>Roll No</b></td>
  <td>{{ $details->roll}}</td>
</tr>

<tr>
  <td>3</td>
  <td><b>Student Name</b></td>
  <td>{{ $details['student']['name']}}</td>
</tr>

<tr>
  <td>4</td>
  <td><b>Father's Name</b></td>
  <td>{{ $details['student']['fname']}}</td>
</tr>

<tr>
  <td>5</td>
  <td><b>Session</b></td>
  <td>{{ $details['student_year']['name']}}</td>
</tr>

<tr>
  <td>6</td>
  <td><b> Class</b></td>
  <td>{{ $details['student_class']['name']}}</td>
</tr>

<tr>
  <td>7</td>
  <td><b>Monthly Fee</b></td>
  <td>{{ $originalfee }} Frw</td>
</tr>

<tr>
  <td>8</td>
  <td><b>Discount Fee</b></td>
  <td>{{ $discount}} %</td>
</tr>

<tr>
  <td>9</td>
  <td><b>Fee for this Student of {{ $month }}</b></td>
  <td>{{ $finalfee }} Frw</td>
</tr>

</table>
<br>
<i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>


