<?php

namespace App\Http\Controllers;


use App\Models\Dept;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminItemController extends Controller
{
    
    public function index(Request $request){

        $users = new User;


        $role_arr = ['Admin Po', 'Admin Approval', 'Admin Mrv', 'Admin Root'];

        $positions = Position::select('level','id')
        ->get();

        $depts = Dept::select('id','name')->get();

        $max_level = Position::max('level');


        $users = $users->paginate(10); 

        $sequence = $users->firstItem();


        return view ('purchase.users.registration', compact('role_arr','max_level','positions','depts','users', 'sequence'));
    }

    public function submit(Request $request)
    {

        if($request->role == 'Admin Po'){
            $positions = Position::select('level','id') ->where('level','0') ->first();
            $request['level'] = [$positions->id];

        }
        
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|max:255',
            'role' => ['required', 'in:Admin Po,Admin Mrv,Admin Approval,Admin Root'],
            'level' => 'required|array|min:1',
            'dept' => 'required|numeric|min:1',
            'active' => 'required|boolean',
        ]; 

      
        
        $validator = Validator::make($request->all(),$rules,//[
           // 'username.unique' => 'test errorr'
        //]
        );
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        

        $user = new User();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->dept_id = $request->input('dept');
        $user->is_active = $request->input('active');
    
        $user->save();

        $user->positions()->sync($request->input('level'));

        Alert::success('Success', 'User sucessfully created!');
        return redirect()->route('admin_user_page');
    }

    public function levelconfig(Request $request){

        $rules = [
            'level_update' => 'nullable|numeric|min:0',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }

        $max_level = Position::max('level');


        if($max_level < $request->level_update){ 
            
            for($i = $max_level + 1; $i <= $request->level_update; $i++){
                $position = Position::where('level', $i)->withTrashed()->first();
                if($position){
                    $position->restore();
                }
                else{
                    $position = new Position;
                    $position->level = $i;
                    $position->save();
                }
            }
        }
        else{ 
            for($i = $max_level; $i > $request->level_update; $i--){
                $position = Position::where('level', $i)->delete();
            }

        } 

        Alert::success('Success', 'Level revision sucessfully updated!');
        return redirect()->route('admin_user_page'); 

    }

    public function updateuser($id){

        // mengambil data menu berdasarkan id yang dipilih 
        $users = User:: find($id);

        $positions = Position::select('level','id')->get();

        $depts = Dept::select('id','name')->get();

        $position_ids= $users->positions->pluck('id')->toArray();


        // passing data menu yang didapat ke view edit.blade.php
	    return view('purchase.users.regisUpdate',compact('users', 'positions','depts','position_ids'));

    }

    public function save(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->role == 'Admin Po'){
            $positions = Position::select('level','id') ->where('level','0') ->first();
            $request['level'] = [$positions->id];

        }

        $rules= [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'password' => 'required|string|max:255',
            'role' => ['required', 'in:Admin Po,Admin Mrv,Admin Approval,Admin Root'],
            'level' => 'required|array|min:1',
            'dept' => 'required|numeric|min:1',
            'active' => 'required|boolean',
         ];

        $validator = Validator::make($request->all(),$rules
         );
         if ($validator->fails()) {
             return redirect()->back()
             ->withInput()
             ->withErrors($validator);
         }

               
        $user = User::find($id);
    

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->dept_id = $request->input('dept');
        $user->is_active = $request->input('active');
       
        $user->save();

        $user->positions()->sync($request->input('level'));
 
        Alert::success('Success', 'User updated successfully!');
        return redirect()->route('admin_user_page');

    }

    public function deleteuser ($id)
    {
        $users = User:: find($id);

        $users->is_active = false; // Set the boolean field to true/false as desired
    
        $users->save();    

        Alert::success('Success', 'User has been delete successfully!');
        return redirect()->route('admin_user_page');
    }

    public function restoreuser ($id)
    {
        
        $users = User:: find($id);

    
        $users->is_active = true; // Set the boolean field to true/false as desired
    
        $users->save();    

        Alert::success('Success', 'User restored successfully!');
        return redirect()->route('admin_user_page');
    }

    public function dept(Request $request){

        $depts = new Dept;

        //if($request->role_name != null){  
           //$role_name = $request->role_name;
            //$roles = $users->where(function ($query)USE($role_name){
            //    $query->where('role','like',"%".$roles_name."%");
           // });
       // }

        $depts = $depts->withTrashed()->paginate(10);  
        $sequence = $depts->firstItem();


        return view ('purchase.users.department', compact('depts' , 'sequence'));
    }

    public function deptcreate(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        
        $save = new Dept();

        $save->name = $request->input('name');

        $save->save();

        Alert::success('Success', 'Dept sucessfully made!');
        return redirect()->route('admin_dept_show'); 
    }

    public function updatedept($id)
    {
        // mengambil data menu berdasarkan id yang dipilih 
        $depts = Dept:: find($id);
         // passing data menu yang didapat ke view edit.blade.php
	    return view('purchase.users.departmentUpdate',compact('depts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
         ]);
               
        $depts = Dept::find($id);
        

        $depts->Name = $request->input('name');
  
        $depts->save();

        Alert::success('Success', 'Dept updated successfully!');
        return redirect()->route('admin_dept_show');

    }

    public function deletedept ($id)
    {
        $depts = Dept::find($id);

        $depts->delete();
        
        Alert::success('Success', 'Dept deleted successfully!');
        return redirect()->route('admin_dept_show');
    }

    public function restoredept ($id)
    {
        $depts = Dept::withTrashed()->find($id);

        $depts->restore();
        
        Alert::success('Success', 'Dept restored successfully!');
        return redirect()->route('admin_dept_show');
    }

    // Revisi start bagian sini
    // public function login()
    // {
    //     return view('login');
    // }

    // public function viewData()
    // {
    //     return view('po.form');
    // }

    // public function vendorData()
    // {
    //     return view('po.vendor');
    // }

    // public function vendorUpdate()
    // {
    //     return view('po.vendorUpdate');
    // }

    // public function product()
    // {
    //     return view('po.product');
    // }

    // public function productUpdate()
    // {
    //     return view('po.productUpdate');
    // }

    // public function detailStatus()
    // {
    //     return view('details.detailStatus');
    // }

    // public function detailApp()
    // {
    //     return view('details.detailApp');
    // }

    // public function detailRej()
    // {
    //     return view('details.detailRej');
    // }    

    // public function print()
    // {
    //     return view('details.print');
    // }    

    // public function listApp()
    // {
    //     return view('approval.listApp');
    // }

    // public function detailLvl1()
    // {
    //     return view('approval.level1');
    // }

    // public function detailLvl2()
    // {
    //     return view('approval.level2');
    // }

    // public function detailLvl3()
    // {
    //     return view('approval.level3');
    // }    
    
}
