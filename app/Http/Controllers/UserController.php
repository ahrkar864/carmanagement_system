<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Branch;
use App\Models\Position;
use App\Models\Positions;
use App\Models\Department;
use App\Models\UserBranch;
use App\Models\Departments;
use Illuminate\Support\Arr;
use App\Models\MainDocument;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Models\ChangeBranchLog;
use App\Models\ProductCategory;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $repository;


    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function login()
    {
        return view('layouts.auth.login');
    }

    public function checkLogin(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password' => 'required',
        ]);

        $this->repository->saveLog($data);
        $user = User::where(["email" => $data['email']])->first();
        if ($user && Hash::check($data['password'], $user->password))
        {
            Auth::login($user);
            return redirect('/admins');
        }
        else{
            return redirect()->route('admins.login')->with('fails','Wrong Password');
        }

    }

    public function logout()
{
        Auth::logout();

        return redirect('login');
    }

    // public function index(Request $request)
    // {
    //     getRequiredData();
    //     $role                   = Session::get('role');
    //     $emp_id                 = Session::get('emp_id');
    //     $branch_id              = Session::get('branch_id');
    //     $category_id            = Session::get('category_id');


    //     $users                  = $this->search_query($role,$emp_id,$branch_id,$category_id);
    //     // $users                  = User::with('departments','positions','roles','user_branches')->latest()->paginate(10);
    //     $departments            = Department::all();
    //     $categories             = ProductCategory::all();
    //     $positions              = Position::all();
    //     $branches               = Branch::all();
    //     $roles                  = Role::all();

    //     if($request->ajax()){

    //         return response()->json([
    //             'success'               => true,
    //             'users'                 => $users,
    //             'departments'           => $departments,
    //             'categories'            => $categories,
    //             'positions'             => $positions,
    //             'branches'              => $branches,
    //             'roles'                 => $roles,
    //            ]);
    //     }
    //     return view('admins.users.index',compact('users','departments','categories','positions','branches','roles'));
    // }

    public function index()
    {
        $users = User::all();
        $branches = Branch::all();
        $departments = Departments::all();
        $positions = Positions::all();
        $roles = Role::all();

        return view('admins.users.index', compact('users', 'branches', 'departments', 'positions', 'roles'));
    }


    public function create()
    {
        getRequiredData();
        $departments            = Department::all();
        $positions              = Position::all();
        $roles                  = Role::all();
        $product_categories     = ProductCategory::all();
        return view('admins.users.create',compact('roles','departments','positions','product_categories'));
    }


    public function store(UserRequest $request)
    {

        // $input = $this->validate($request, [
        //     'title'             => 'required',
        //     'name'              => 'required',
        //     'emp_id'            => 'required|unique:users,emp_id',
        //     'password'          => 'required|same:confirm-password',
        //     'department_id'     => 'required',
        //     'category_id'       => 'required',
        //     'position_id'       => 'required',
        //     'roles'             => 'required',
        //     'status'            => 'required',
        //     'from_branch_id'    => 'required'
        // ]);

        // try{
        //     DB::beginTransaction();
        //     $input['password'] = Hash::make($input['password']);
        //     $user['from_branch_id'] = $request->from_branch_id;
        //     $user = User::create($request->except('category_id','branch_id'));
        //     $user->assignRole($request->input('roles'));
        //     if(count($request->category_id)!=0)
        //     {
        //         foreach($request->category_id as $cat)
        //         {
        //             $user_cat = new UserCategory();
        //             $user_cat->user_id      = $user->id;
        //             $user_cat->category_id  = $cat;
        //             $user_cat->save();
        //         }

        //     }

        //     if(count($request->branch_id)!=0)
        //     {
        //         foreach($request->branch_id as $branch_id)
        //         {
        //             $user_cat = new UserBranch();
        //             $user_cat->user_id      = $user->id;
        //             $user_cat->branch_id  = $branch_id;
        //             $user_cat->save();
        //         }
        //     }
        //     DB::commit();
        //     return redirect()->route('users.index')
        //                     ->with('success','User created successfully');
        // }
        //     catch(Exception $e)
        // {
        //     DB::rollBack();
        //     return $e->getMessage();
        // }
        DB::beginTransaction();
        try {
            $user = User::create([
                'title' => $request->title,
                'name' => $request->name,
                'email' => $request->email,
                'employee_number' => $request->employee_number,
                'password' => Hash::make($request->password), 
                'branch_id' => $request->branch_id,
                'department_id' => $request->department_id,
                'position_id' => $request->position_id,
                'status' => $request->status
            ]);
            $user->assignRole($request->input('role_id')); 
            DB::commit(); 
            return response()->json(['success' => 'User created and role assigned successfully.']);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong'], 500);
        }

    }


    public function show($id)
    {
        $user = User::find($id);
        return view('admins.users.show',compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $role = $user->roles->first(); 
        return response()->json([
            'user' => $user,
            'role_id' => $role ? $role->id : null,
        ]);



        // $departments            = Department::all();
        // $product_categories     = ProductCategory::all();
        // $positions              = Position::all();
        // $branches               = Branch::all();
        // $roles                  = Role::all();
        // $userRole = $user->roles->pluck('name','name')->all();
        // return response()->json([
        //     'success'                => true,
        //     'user'                  => $user,
        //     'departments'            => $departments,
        //     'product_categories'     => $product_categories,
        //     'positions'              => $positions,
        //     'branches'               => $branches,
        //     'roles'                  => $roles
        //  ]);
        // return view('admins.users.edit',compact('user','roles','userRole','branches','departments','positions','product_categories'));
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }
            $user = User::find($id);
            $user->update($input);
            return response()->json(['success' => 'User updated successfully.']);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // $input = $this->validate($request, [
        //     'title'             => 'required',
        //     'name'              => 'required',
        //     'emp_id'            => 'required',
        //     'department_id'     => 'required',
        //     'position_id'       => 'required',
        //     'status'            => 'required',
        // ]);


        
        // if(!empty($request['password'])){
        //     $input['password'] = Hash::make($request['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));
        // }
        // $input = Arr::except($input,array('category_id','branch_id'));
        // $user = User::find($id);
        // $user->update($input);
        // // dd($user);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();

        // $user->assignRole($request->input('roles'));
        // if(count($request->category_id)!=0)
        // {
        //     foreach($request->category_id as $cat)
        //     {
        //         if(UserCategory::where(['category_id'=>$cat,'user_id'=>$user->id])->doesntExist())
        //         {
        //             $user_cat = new UserCategory();
        //             $user_cat->user_id      = $user->id;
        //             $user_cat->category_id  = $cat;
        //             $user_cat->save();
        //         }

        //     }

        // }
        // if(count($request->branch_id)!=0)
        // {
        //     $user_branches = UserBranch::where('user_id',$user->id)->delete();
        //     foreach($request->branch_id as $branch_id)
        //     {


        //         $user_branch = new UserBranch();
        //         $user_branch->user_id      = $user->id;
        //         $user_branch->branch_id  = $branch_id;
        //         $user_branch->save();
        //     }
        // }

        // return redirect('/admins/users');
    }

    public function destroy($id)
    {
        try {
            $item = User::findorFail($id);
            $item->delete();
            return response()->json(['success' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }


    public function user_delete($id)
    {
        UserCategory::where('user_id',$id)->delete();
        UserBranch::where('user_id',$id)->delete();
        User::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Success Deleted user',
            ]);
    }

    public function get_position($dept_id)
    {
        $positions = Position::where('department_id',$dept_id)->get();
        // dd($positions);
        return response()->json($positions, 200);
    }

    public function get_branch_name(Request $request)
    {
       $branch_ids = collect($request->user_branches)->pluck('branch_id');

        return response()->json($branch_ids, 200);

    }

    public function user_search(Request $request)
    {

        getRequiredData();
        $departments            = Department::all();
        $categories             = ProductCategory::all();
        $positions              = Position::all();
        $branches               = Branch::all();
        $roles                  = Role::all();

        $role                   = $request->role;
        $emp_id                 = $request->emp_id;
        $branch_id              = $request->branch_id;
        $category_id            = $request->category_id;

        $users                  = $this->search_query($role,$emp_id,$branch_id,$category_id);

        Session::put(['branch_id'=>$branch_id,'role'=>$role,'emp_id'=>$emp_id,'category_id'=>$category_id]);

        $users->appends($request->all());

        return view('admins.users.index',compact('users','departments','categories','positions','branches','roles'));
    }

    public function search_query($role,$emp_id,$branch_id,$category_id)
    {
        $result                  = User::query();

        if (!empty($role)) {
            $result = User::whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            });

        }
        if (!empty($emp_id)) {
            $result         = $result->where('emp_id',$emp_id);

        }
        if (!empty($branch_id)) {
            $user_branch_ids  = UserBranch::where(['branch_id'=>$branch_id])->pluck('user_id');
            $result         = $result->whereIn('id',$user_branch_ids);

        }
        if (!empty($category_id)) {
            $user_category_ids  = UserCategory::where(['category_id'=>$category_id])->pluck('user_id');
            $result         = $result->whereIn('id',$user_category_ids);

        }

        return $result->orderBy('id','desc')->paginate(10);
    }

    public function change_branch()
    {
        $branches = Branch::all();
        return view('admins.users.change_branch',compact('branches'));
    }

    public function update_branch(Request $request)
    {
        // dd();
        $branch_ids             = $request->branch_id;
        $input = $this->validate($request, [
            'emp_id'            => 'required',
        ]);
        $user = User::where('emp_id',$request->emp_id)->first();
        $old_branches = $user->user_branches()->pluck('branch_id')->toArray();
        $user->user_branches()->delete();
        foreach($branch_ids as $branch_id)
        {
            $user_branch                = new UserBranch();
            $user_branch->branch_id     = $branch_id;
            $user_branch->user_id       = $user->id;
            $user_branch->save();
            // dd($user_branch);
        }   
        $log                = new ChangeBranchLog();
        $log->emp_id        = $request->emp_id;
        $log->old_branch_id = implode(",",$old_branches);
        $log->new_branch_id = implode(",",$branch_ids);
        $log->updated_by    = getAuthUser()->id;
        $log->ip_address    = request()->ip();
        $log->save();
        $data = $this->user_info($user->emp_id);
        return response()->json($data, 200);
    }
    public function get_user($emp_id)
    {
        $data = $this->user_info($emp_id);
        return response()->json($data, 200);
    }
    public function user_info($emp_id){
        $user           = User::where('emp_id',$emp_id)->first();
        $user_branches  = [];
        foreach($user->user_branches as $u_branch)
        {
            array_push($user_branches,$u_branch->branches);
        }
        $data           = ['user'=>$user,'user_branches'=>$user_branches];
        return $data;
    }
}
