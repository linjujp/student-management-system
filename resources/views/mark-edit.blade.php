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
    Edit
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
      <form method="post" action="{{ route('marks.update', $marks->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Student</label>
              {!! Form::select('student_id',$students,  $marks->student_id,['class' => 'form-control']); !!}
          </div>
          <div class="form-group">
              <label for="term">Term</label>
              {!! Form::select('term',['One'=>'One','Two'=>'Two'], $marks->term,['class' => 'form-control']); !!}
          </div>
          <div class="form-group">
          <label for="term"> <strong> Subject</strong></label>
          </div>
          <div class="form-group">
              <label for="maths">Maths</label>
              <input type="text" class="form-control" name="maths" value="{{ $marks->maths }}"/>
          </div>
          <div class="form-group">
              <label for="science">Science</label>
              <input type="text" class="form-control" name="science" value="{{ $marks->science }}"/>
          </div>
          <div class="form-group">
              <label for="history">History</label>
              <input type="text" class="form-control" name="history" value="{{ $marks->history }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Update Student Marks</button>
      </form>
  </div>
</div>
@endsection