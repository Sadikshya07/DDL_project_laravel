@extends('students.layout')
@section('content')
    <h2>Create New Student</h2>
        <button><a href="{{ route('students.index') }}">Back</a></button>
    <br>
    @if ($errors->any())
    <div >
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

      <h3 style="color:blue;text-align:center;">Want to update your information!</h3>
      <label>Name:</label></br><input type="text" placeholder="Enter your full name." name="name" autocomplete="off"></br>
      <label> Email:</label></br><input type="email" placeholder="Enter Your Email" name="email" autocomplete="off"></br>
      <label> Batch:</label></br><input type="number" placeholder="Enter Your Batch" name="batch" autocomplete="off"></br>
      <label> MobileNo:</label></br><input type="number" placeholder="Mobile Number" name="mobile" autocomplete="off"></br>
    </br>
      <button type="submit"name="submit">SUBMIT</button>

    </form>
</div>
@endsection