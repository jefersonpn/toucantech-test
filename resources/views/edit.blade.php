@extends('layout')
@section('content')

<div class="card">
  <div class="card-header titleCard">Update Member</div>
  <div class="card-body">
      
      <form action="{{ url('member/' .$members->id) }}" method="post">
        {!! csrf_field() !!} <!-- SECURITY token -->
        @method("PATCH") <!-- Get a partial UPDATE unlike PUT -->
        <input type="hidden" name="id" id="id" value="{{$members->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="memberName" id="name" value="{{$members->memberName}}" class="form-control"></br>
        <label>School</label></br>
        <select class="form-select" id="memberSchoolId" name="memberSchoolId">
          <!-- This FOREACH get the data from SCHOOLS table and display in the form. -->
          @foreach($schools as $school)
            @if ($members->memberSchoolId == $school->id)
            <option value="{{$school->id}}" selected>{{$school->SchoolName}}</option>
            @else 
            <option value="{{$school->id}}">{{$school->SchoolName}}</option>
            @endif
          @endforeach
        </select>
        <label>Email</label></br>
        <input type="text" name="memberEmail" id="mobile" value="{{$members->memberEmail}}" class="form-control">
        </br>
        <input type="submit" value="Update" class="btn btn-warning"></br>
        <button type="button" class="btn btn-success btnUpdateBack" onclick="history.back()">Go back</button>
        
    </form>
   
  </div>
</div>

@stop