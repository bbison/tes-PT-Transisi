<table class="table">
    @foreach ($employees as $employee)
    <tr>
        <td> {{$employee->name}}</td>
        <td> {{$employee->email}}</td>
        <td> {{$employee->company->name}}</td>
        <td> <a class="btn btn-warning" href="/employee/{{$employee->id}}">Lihat</a></td>
    </tr>
    @endforeach
   
</table>