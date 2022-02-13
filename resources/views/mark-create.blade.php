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
<a href="{{ route('marks.index')}}" class="btn btn-primary btn-sm" "="">Student Marks</a>
</div>
<div class="card push-top">
  <div class="card-header">
    Add Student Marks
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
      <form method="post" action="{{ route('marks.store') }}">
          <div class="form-group">
              @csrf
              <label for="student_id">Student</label>
              {!! Form::select('student_id',$students, '',['class' => 'form-control']); !!}
          </div>
          <div class="form-group">
              <label for="term">Term</label>
              <select name="term" id="" class="form-control">
                  <option value="One">One</option>
                  <option value="Two">Two</option>
              </select>
          </div>
          <div class="form-group">
          <label for="term"> <strong> Subject</strong></label>
          </div>
          <div class="form-group">
              <label for="maths">Maths</label>
              <input type="text" class="form-control" name="maths"/>
          </div>
          <div class="form-group">
              <label for="science">Science</label>
              <input type="text" class="form-control" name="science"/>
          </div>
          <div class="form-group">
              <label for="history">History</label>
              <input type="text" class="form-control" name="history"/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Add Marks</button>
      </form>
  </div>
</div>
@endsection