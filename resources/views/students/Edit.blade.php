@extends('students.layout')
@section('content')
            <h2>Edit Student Data</h2>
                <button><a href="{{ route('students.index') }}">Back</a></button>
    <br>
    @if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
    <h3 style="color:blue;text-align:center;">Want to update your information!</h3>
      <label>Name:</label></br><input type="text" placeholder="Enter your full name." name="name" autocomplete="off"value="{{$student->name}}"></br>
      <label> Email:</label></br><input type="email" placeholder="Enter Your Email" name="email" autocomplete="off"value="{{$student->email}}"></br>
      <label> Batch:</label></br><input type="number" placeholder="Enter Your Batch" name="batch" autocomplete="off"value="{{$student->batch}}"></br>
      <label> MobileNo:</label></br><input type="number" placeholder="Mobile Number" name="mobile" autocomplete="off"value="{{$student->mobile}}"></br>
    </br>
      <button type="submit"name="submit">UPDATE</button>
    </form> 
@endsection