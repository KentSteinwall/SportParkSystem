<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Staff;
use App\User;
class StaffController extends Controller
{
    //validate and check the login details
    function checklogin(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:3'
        ]);
    

        $user_data=array(
            'email' => $request->get('username'),
            'password' => $request->get('password')
        );

   
        if(Auth::attempt($user_data) && Auth::user()->isadmin==1)
        // check the login details are correct and if the field of isadmin is true
        //isadmin is true only for staff users
        {
            return redirect('staffs');
        }else
        {
            return back()->with('error','Wrong Login Details!');
        }
    }
    function successlogin()
    {
        return view('staffs');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/StaffLogin');
    }

    //validate and store staff login details in users table
    function store()
    {
        $this->validate(request(),[
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required|min:5',
            'isadmin'=>'required'

        ]);
        
        //if a user is staff user then the isadmin is true
        //so any time isadmin give true from staff registration form
        $pass1=request('password');
        $pass2=request('password_confirmation');

        //check if both passwords are same
        if($pass1==$pass2){
            $user=User::create(request(['username','email','password','isadmin']));
            auth()->login($user);
            return redirect()->to('/staffnextreg');
        }
        else{
            return redirect()->to('/staffreg');
        }

    }

    //validate and store staff personal details in staff table 
    public function submit(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'position'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'nic'=>'required',
            'email'=>'required',
            'address'=>'required',
            'mobile'=>'required',
        ]);
        
        //array for get position from index
        $pos=array('Athletic Trainer','Physical Therapist'
        ,'Medical Assistance','Sport Trainer','Badminton Trainer','Other');

        //create new staff  member

        $staff=new Staff;
        $staff->username = $request->input('username');
        $staff->position = $pos[$request->input('position')];
        $staff->firstname = $request->input('firstname');
        $staff->lastname = $request->input('lastname');
        $staff->nic = $request->input('nic');
        $staff->email = $request->input('email');
        $staff->address = $request->input('address');
        $staff->mobile = $request->input('mobile');
      

        //save staff member
        $staff->save();

        //redirect
        return redirect('/adminmenu')->with('success','Register successfull!');
    }


    public function getStaff(){
        $staffs=Staff::all();
        return view('staffs')->with('staffs',$staffs);
    }

}