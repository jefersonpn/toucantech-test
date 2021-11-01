@extends('layout')

@section('content')

        <div class="card cardCustom">
            <div class="card-header" >
                <p class="titleCard">Members</p> 
                <div>
            
                    <form action="{{ route('member.filter')}}" method="post">
                        @csrf   
                        <div class="col-sm-3" >
                            <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                            <select class="form-select" id="schoolid" name="schoolid">
                            <option value=""> -------- Select School</option>
                            @foreach($schools as $school)
                                <option value="{{$school->id}}">{{$school->SchoolName}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-auto btn-filter">
                            <button type="submit" class="btn btn-primary filterBt">Filter</button>
                            <a href="{{ url('/member') }}" class="btn btn-warning cleanFilter" title="Clean filter">Clean Filter</a>
                        </div>

                    </form>
                
                </div>
            </div>
                <div class="card-body">
                    <a href="{{ url('/member/create') }}" class="btn btn-success btn-sm" title="Add New Member">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <span>
                        @if (session('flash_message'))
                        <span class="flash_message">{{ session('flash_message')}}</span>
                        @endif

                    </span>
                </div>  

                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>School</th><th>Email</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->memberName }}</td>
                                <td>{{ $item->SchoolName }}</td>
                                <td>{{ $item->memberEmail }}</td>

                                <td>
                                    <a href="{{ url('/member/' . $item->id) }}" title="View Member"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    <a href="{{ url('/member/' . $item->id . '/edit') }}" title="Edit member"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/member' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete member" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
                
            
        
@endsection