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
<div class="card">
<a href="{{ route('students.index')}}" class="btn btn-primary btn-sm" "="">Students</a>
</div>
<div class="card push-top">
  <div class="card-header">
    Add Student
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
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="text" class="form-control" name="age"/>
          </div>
          <div class="form-group">
              <label for="gender">Gender</label>
              <select name="gender" id="" class="form-control">
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                  <option value="O">Others</option>
              </select>
          </div>
          <div class="form-group">
              <label for="teacher_id">Reporting Teacher</label>
              {!! Form::select('teacher_id',$teacher, '',['class' => 'form-control']); !!}
          </div>
          <button type="submit" class="btn btn-block btn-primary">Create Student</button>
      </form>
  </div>
</div>
@endsection