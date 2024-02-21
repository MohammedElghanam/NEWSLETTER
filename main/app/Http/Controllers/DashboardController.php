<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\send_temp;
use App\Models\Members;
use App\Models\Template;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::all();
        $templates = Template::all();
        $templates_count = Template::Count();
        $member_sub = Members::where('sub', 'subscribe')->get();
        $member_unsub = Members::where('sub', 'unsubscribe')->get();
        $userCount = User::count();
        $users = User::paginate(5);

        $userRoles = [];

        foreach ($users as $user) {
            // Retrieve roles for the current user
            $userRoles[$user->id] = $user->getRoleNames();
        }

        

        $isOnline = $this->isOnline();
        if ($isOnline) {
            return view('newsletter.DASHBOARD.show',compact('members', 'member_sub', 'member_unsub', 'users', 'userRoles', 'userCount', 'templates', 'templates_count'));
        }else {
            return view('internet');
        }
    }


    public function Add_Role(User $user){
        $roles  = Role::all();
        return view('newsletter.DASHBOARD.assign_role', compact('user','roles'));
    }


    public function Assign_Role(Request $request, User $user){

        $user = User::find($user->id);
        $user->syncRoles($request->role);
        return redirect()->route('dashboard');
    }





    /**
     * Store a newly created resource in storage.
     */
    public function Create_Tamp(Request $request)
    {

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Template::create($data);
        return redirect()->back();
    }





    /**
     * Display the specified resource.
     */
    public function Edit_Tamp(Template $template)
    {
        return view('newsletter.DASHBOARD.edit_temp', ['template' => $template]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function Update_Tamp(Request $request, Template $template)
    {
        // dd($template);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        // dd($template);

        $template->update($data);
        return redirect()->route('dashboard');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function SoftDelete_Tamp(Template $template)
    {
        $template = Template::find($template->id);
        $template->delete();
        session()->put('deleted_template_id', $template->id);
        return redirect()->route('dashboard');
    }


    public function Restore(){
      
        $templateId = session()->pull('deleted_template_id');
        $template = Template::withTrashed()->findOrFail($templateId);
        $template->restore();

        return redirect()->route('dashboard');
    }



    public function send_to_email(Template $template){

        $template = Template::find($template->id);
        // dd($template-a>title);

        $members = DB::table('members')->select('email', 'sub')->get();

        foreach ($members as $member) {
            if ($member->sub == 'subscribe') {
                
                Mail::to($member->email)->send(new send_temp($template));
    
            }
        }
        
        $update_status = DB::table('members')->update(['status' => 'confirmed']);

        $membersCount = Members::count();
         

        if ($update_status == $membersCount || $update_status == 0) {
            return redirect()->route('dashboard');
        }
    }


    public function Download_pdf(){

        $templates_count = Template::Count();
        $userCount = User::count();
        $users = User::all();
        $members = Members::all();

        $userRoles = [];

        foreach ($users as $user) {
            $userRoles[$user->id] = $user->getRoleNames();
        }

        $pdf = PDF::loadView('newsletter.DASHBOARD.PDF', compact('templates_count', 'userCount', 'users', 'members', 'userRoles')); 
        return $pdf->download('statistique_website.pdf');
    }


    // this function check user has internet on no 
    public function  isOnline($site = "https://youtube.com/"){
	
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
    
}
