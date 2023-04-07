<?php

namespace App\Http\Controllers;
use App\Models\Members;
use Illuminate\Http\Request;

class memberCOntroller extends Controller
{
    //
    function memberList(){
       $data =Members::All();//show all the data in members table
       return view('memberlist',['members'=> $data ]); //['members'=> $data ] send data to memberlist page
    }
    function deleteMember($id){//id to send id paramiter in url
        $data = Members::find($id);//find finction find the sprcific id
        $data->delete();//delete function run the delete query
        return redirect('memberlst');//to redirect to list page
    }

    function showData($id)
    {
    $data =  Members::find($id);   
    return view('edit',['data'=>$data]);
    }

    function updateData(Request $request)
    {   
        $data =  Members::find($request->id);   
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        return redirect('memberlst');
    }
}
