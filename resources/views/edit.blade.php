@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.update', $student->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="text" class="form-control" name="age" value="{{ $student->age }}"/>
          </div>
          <div class="form-group">
              <label for="gender">Gender</label>
              {!! Form::select('gender',['M'=>'Male','F'=>'Female','O'=>'Others'], $student->gender,['class' => 'form-control']); !!}
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              {!! Form::select('teacher_id',$teacher, $student->teacher_id,['class' => 'form-control']); !!}
          </div>
          <button type="submit" class="btn btn-block btn-primary">Update Student</button>
      </form>
  </div>
</div>
@endsection