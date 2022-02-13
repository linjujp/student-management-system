@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div>
<a href="{{ route('marks.create')}}" class="btn btn-primary btn-sm" style="float: right;margin: 5px;">Add Student Marks</a>
</div>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>ID</td>
          <td>Name</td>
          <td>Maths</td>
          <td>Science</td>
          <td>History</td>
          <td>Term</td>
          <td>Total Marks</td>
          <td>Created On</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($marks as $mark)
        <tr>
            <td>{{$mark->id}}</td>
            <td>{{$mark['student']['name']}}</td>
            <td>{{$mark->maths}}</td>
            <td>{{$mark->science}}</td>
            <td>{{$mark->history}}</td>
            <td>{{$mark->term}}</td>
            <td>{{$mark->maths+$mark->science+$mark->history}}</td>
            <td>{{$mark->created_at->format('M d, Y H:i A')}}</td>
            <td class="text-center">
                <a href="{{ route('marks.edit', $mark->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('marks.destroy', $mark->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection