@extends('layout')

@section('content')
 
  <div class="row">
    <div class="col-md-9 customScreenShow"> 
      <div class="card"> 
          <div class="card-header titleCard">Show Member</div>
          <div class="card-body">
                <div class="card-body">
                  @foreach ($members as $member)<!-- Display the selected member from the INDEX view. It get the result from the CRUDMEMBERCONTROLLER -->
                <h5 class="card-title">Name : {{ $member->memberName }}</h5>
                <p class="card-text">School : {{ $member->SchoolName }}</p>
                <p class="card-text">Email : {{ $member->memberEmail }}</p>
                @endforeach
          </div>
          <div>
            <div>
              <button type="button" class="btn btn-success btnBackShow" onclick="history.back()">Go back</button>
            </div>
          </div>
          </hr>
        </div>   
      </div>
    </div>  
  </div>
@endsection
