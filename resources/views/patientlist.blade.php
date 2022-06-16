@extends('staffzone')
@section('content')
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>Patients List</h2>

<table style="width:100%">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        <tbody>
                            @foreach ($patient as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->date}}</td>
                                <td>
                                    <a href="{{ url('destroy/'.$item->id) }}" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </body>
            </html>
@endsection
