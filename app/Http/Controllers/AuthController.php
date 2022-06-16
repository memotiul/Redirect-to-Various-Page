<?php
 
namespace App\Http\Controllers;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use App\User;
use App\Staff;
use App\Doctor;
use App\Branch;
use App\Patient;
Use charts;
use Illuminate\Support\Facades\Auth;
 
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('profile')->with('message','Successfull Logged-In');
        }
 
        return redirect("login")->with('message','Log-In details are not Valid');
    }
 
    public function registration()
    {
        return view('auth.registration');
    }
 
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $data = $request->all();
        $check = $this->create($data);
        
        return back()->with('message','Registration Successfull');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
      
    }
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
    
        return redirect("login")->with('message','You are not allowed to access');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
 
        return Redirect('login');
    }

    public function profile()
    {
               $users = User::get();
        return view('profile', compact('users'));
    }

    public function edit()
    {
        return view('changePassword');
    } 
   
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('message','Password Change Successfully');
    }

         public function addstaff()
    {
        return view('addstaff');
    }
      public function customadd(Request $request)
    {
             $user = new User;
             $user->name = $request->name;
             $user->mobile = $request->mobile;
             $user->email = $request->email;
             $user->password = $request->password;
             $user->save();
            return back ();
    }
     public function profile_staff()
    {
        $user = User::all();
        return view('staffprofile', compact('user'));
    }

     public function patient_list()
    {
        $patient = Patient::all();
        return view('patientlist', compact('patient'));
    }
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
 
        return back();
    } 
 
     public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('todolist')
            ->with('success','Product updated successfully');
    }
      public function adddoctor()
    {
        return view('adddoctor');
    }
      public function add_doctor(Request $request)
    {
             $user = new User;
             $user->name = $request->name;
             $user->email = $request->email;
             $user->mobile = $request->mobile;
             $user->password = $request->password;
             $user->save();
            return back ();
    }
          public function addbranch()
    {
        return view('addbranch');
    }
      public function add_branch(Request $request)
    {
             $branch = new Branch;
             $branch->name = $request->name;
             $branch->amount = $request->amount;
             $branch->save();
            return back ();
    }
        public function staff_zone()
    {
       
        return view('staffzone');
    }
     public function addpatient()
    {
        return view('addpatient');
    }
      public function add_patient(Request $request)
    {
             $patient = new Patient;
             $patient->name = $request->name;
             $patient->mobile = $request->mobile;
             $patient->age = $request->age;
             $patient->date = $request->date;
             $patient->save();
            return back ();
    }
     public function doctor_profile()
    {
       
        return view('doctorprofile');
    }
    public function makeChart($type)
 {
 switch ($type) {
 case 'bar':
 $patients = User::where(DB::raw("(DATE_FORMAT(date,'%Y'))"),date('Y')) 
 ->get();
 $chart = Charts::database($patients, 'bar', 'highcharts') 
 ->title("Monthly new Register Users") 
 ->elementLabel("Total Users") 
 ->dimensions(1000, 500) 
 ->responsive(true) 
 ->groupByMonth(date('Y'), true);
 break;
 case 'pie':
 $chart = Charts::create('pie', 'highcharts')
 ->title('HDTuto.com Laravel Pie Chart')
 ->labels(['Codeigniter', 'Laravel', 'PHP'])
 ->values([5,10,20])
 ->dimensions(1000,500)
 ->responsive(true);
 break;
 case 'donut':
 $chart = Charts::create('donut', 'highcharts')
 ->title('HDTuto.com Laravel Donut Chart')
 ->labels(['First', 'Second', 'Third'])
 ->values([5,10,20])
 ->dimensions(1000,500)
 ->responsive(true);
 break;
 case 'line':
 $chart = Charts::create('line', 'highcharts')
 ->title('HDTuto.com Laravel Line Chart')
 ->elementLabel('HDTuto.com Laravel Line Chart Lable')
 ->labels(['First', 'Second', 'Third'])
 ->values([5,10,20])
 ->dimensions(1000,500)
 ->responsive(true);
 break;
 case 'area':
 $chart = Charts::create('area', 'highcharts')
 ->title('HDTuto.com Laravel Area Chart')
 ->elementLabel('HDTuto.com Laravel Line Chart label')
 ->labels(['First', 'Second', 'Third'])
 ->values([5,10,20])
 ->dimensions(1000,500)
 ->responsive(true);
 break;
 case 'geo':
 $chart = Charts::create('geo', 'highcharts')
 ->title('HDTuto.com Laravel GEO Chart')
 ->elementLabel('HDTuto.com Laravel GEO Chart label')
 ->labels(['ES', 'FR', 'RU'])
 ->colors(['#3D3D3D', '#985689'])
 ->values([5,10,20])
 ->dimensions(1000,500)
 ->responsive(true);
 break;
 default:
 break;
 }
 return view('chart', compact('chart'));
 }

}
