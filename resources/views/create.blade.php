@extends('layout')
@section('content')

<!-- Create View => send to CrudMemberController use the function STORE
     and them return on View => INDEX.blade.php 
-->

<div class="card">
  <div class="card-header titleCard">CREATE MEMBER</div>
  <div class="card-body">
      
      <form action="{{ route('member.create')}}" method="post" id="form" name="form">
        @csrf
        <label>Name</label></br>
        <input type="text" name="memberName" id="memberName" class="form-control @error('memberName') is-invalid @enderror"></br>
        @error('memberName')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
        <label>School</label></br>
        
        <select class="form-select @error('memberSchoolId') is-invalid @enderror" id="memberSchoolId" name="memberSchoolId">
            <option value="">-------  select a school</option>
            <!-- This FOREACH brings the SELECT options from the SCHOOL table -->
          @foreach($schools as $school)
            <option value="{{$school->id}}">{{$school->SchoolName}}</option>
          @endforeach
        </select>
        @error('memberSchoolId')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror</br>
       
        <label>Email</label></br>
        <input type="text" name="memberEmail" id="memberEmail" class="form-control @error('memberEmail') is-invalid @enderror" onblur="validacaoEmail(form.memberEmail)" >
        <div id="msgemail"></div>
        @error('memberEmail')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror</br>
        <input type="submit" id="saveBtn" value="Save" class="btn btn-warning"></br>
            <div>
              <button type="button" class="btn btn-success btnCreateBack" onclick="history.back()">Go back</button>
            </div>
    </form>
   
  </div>
</div>
<script language="Javascript">
function validacaoEmail(memberEmail) {
usuario = memberEmail.value.substring(0, memberEmail.value.indexOf("@"));
dominio = memberEmail.value.substring(memberEmail.value.indexOf("@")+ 1, memberEmail.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) &&
    (usuario.search("@")==-1) &&
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) &&
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&
    (dominio.indexOf(".") >=1)&&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
document.getElementById("msgemail").innerHTML="<font color='green'>E-mail OK";
document.getElementById('saveBtn').removeAttribute("disabled");
}
else{
document.getElementById("msgemail").innerHTML="<font color='red'>Invalid Email </font>";
document.getElementById('saveBtn').setAttribute("disabled","disabled");
}
}
</script>


@stop