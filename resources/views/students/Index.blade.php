@extends('students.layout')

@section('content')
        <h4>Student Profile Management System</h4>

        <button><a href="{{ route('students.create') }}">Create New Student</a></button>
    <br>

    <table>
        <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Batch</th>
            <th>Mobile</th>
            <th style="width:280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email}}</td>
            <td>{{ $student->batch }}</td>
            <td>{{ $student->mobile}}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <button><a href="{{ route('students.edit',$student->id) }}">Edit</a></button>
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>