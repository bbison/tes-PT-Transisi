<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Employee</title>


    <style>
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px
        }
    </style>
</head>
<body>
    <h1 style="text-align: center"> Employee Data Base {{$company->name}} </h1>
<table class="table" width='100%'>
    <tr class="table-secondary">
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
    </tr>
    @foreach ($company->employee as $employee)
        <tr>
            <td style="text-align: center">{{$loop->iteration}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
        </tr>
    @endforeach
</table>
   
        
 

</body>
</html>