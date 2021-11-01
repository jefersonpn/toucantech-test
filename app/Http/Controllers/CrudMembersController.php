<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class CrudMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from SCHOOLS table
        $schools = DB::table('schools')
            ->select('schools.*')
            ->get();
        //get data from MEMBERS and SCHOOLS table using a JOIN
        $members = DB::table('members')
            ->join('schools', 'memberSchoolId', '=', 'schools.id')
            ->select('members.*', 'schools.id as schoolId', 'schools.SchoolName')
            ->OrderBy('memberName')
            ->get();
       
        //dd($members, $schools); // Checking the variable is passing
        return view ('index')->with('members', $members) //Sending to the VIEW index.blade.php
                             ->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get data from SCHOOL table
        $schools = DB::table('schools')
        ->select('schools.*')
        ->get();
        
        return view ('create')->with('schools', $schools);;//send data from SCHOOLS table to the CREATE view using the variable $schools
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'memberName' => 'required',
                'memberSchoolId' => 'required',
                'memberEmail' => 'required',
                ]);
        //get the inputs from FORM the VIEW edit.blade 
       $input = $request->all();
       Member::create($input); //inserting
       return redirect('member')->with('flash_message', 'Member Addedd!');  //retriving message to VIEW index.blade.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $schools = School::all();
        //dd($schools);  //Checking the variables 
        $members = DB::table('members') //Selecting members from database filtering by ID and ordering by NAME
        ->join('schools', 'memberSchoolId', '=', 'schools.id')
        ->select('members.*', 'schools.id as schoolId', 'schools.SchoolName')
        ->where('members.id', '=', $id)
        ->OrderBy('memberName')
        ->get();   
        //dd($members);  //Checking the variables 
        return view('show')->with('members', $members);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get school data
        $schools = DB::table('schools')
        ->select('schools.*')
        ->get();
        //get a particular members data using ID
        $members = DB::table('members')
        ->join('schools', 'memberSchoolId', '=', 'schools.id')
        ->select('members.*', 'schools.id as schoolId', 'schools.SchoolName')
        ->where('members.id', '=', $id)
        ->OrderBy('memberName')
        ->get();    

        $members = Member::find($id);
        return view('edit')->with('members', $members)//sending to the VIEW edit.blade.php
                           ->with('schools', $schools);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get member from members table 
        $members = Member::find($id);
        $input = $request->all();//get the input from form
        $members->update($input);//updanding
        //dd($input);    //Test to see the variables are coming
        return redirect('member')->with('flash_message', 'Member Updated!'); //sending msg to the view INDEX 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get member by ID and deleting
        Member::destroy($id);

        return redirect('member')->with('flash_message', 'Member deleted!');  //sending the MSG to view
    }
    
    public function filter(Request $request) 
    {
        //dd($request); //Test if is comming the ID
        $id = $request->schoolid; //GETING the ID from request -> when you select a school from index and click on filter, it send a SCHOOL->ID 

        $schools = DB::table('schools') //Get the data from SCHOOL table
        ->select('schools.*')
        ->get();
        
        $members = DB::table('members')//Get data from MEMBERS table by ID
        ->join('schools', 'memberSchoolId', '=', 'schools.id')
        ->select('members.*', 'schools.id as schoolId', 'schools.SchoolName')
        ->where('members.memberSchoolId', '=', $id)
        ->OrderBy('memberName')
        ->get();   
        //dd($members);
    
        return view('index')->with('members', $members) //Sending to the VIEW
                            ->with('schools', $schools);
       
    }
  

       
}

