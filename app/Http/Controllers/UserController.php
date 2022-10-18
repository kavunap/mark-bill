<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified','super_admin']);
        $this->middleware(['auth','verified']);
        // $this->middleware('super_admin')->except('store','update','edit');
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::paginate();

        // return view('user.index', compact('users'))
        //     ->with('i', (request()->input('page', 1) - 1) * $users->perPage());

        if($request->has('search')){
    		$users = User::search($request->get('search'))->paginate();	
    	}
        else{
    		$users = User::paginate();
    	}
        // return view('user.index', compact('users'));
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function teachers(Request $request){
        if($request->has('search')){
            if(Auth::user()->user_role=='admin'){
                $users=User::search($request->get('search'))->orderBy('name')->where('admin_id',Auth::user()->id)->paginate();
            }
            else{
                $users=User::search($request->get('search'))->where('user_role','teacher')->paginate();
            }
            
        }
        elseif(Auth::user()->user_role=='admin'){
            $users=User::where('user_role','teacher')->where('admin_id',Auth::user()->id)->paginate();
        }
        else{
            $users = User::where('user_role','teacher')->paginate();
        }
        return view('user.teachers',compact('users'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg|max:2024',
            'signature' => 'image|mimes:jpeg,png,jpg|max:2024',
        ]);
        $data=$request->all();
        if($request->file('profile')){
            $file= $request->file('profile');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/profiles'), $filename);
            // $data['profile']= $filename;
            $user->profile=$filename;
        }
        if($request->file('signature')){
            $file= $request->file('signature');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/signatures'), $filename);
            // $data['signature']= $filename;
            $user->signature=$filename;
        }
        if($request->user_role){
            // $data['user_role ']= $request->user_role;
            // $user->user_role=$data['user_role '];
            $user->user_role=$request->user_role;
        }
        if($request->status){
            $user->status=$request->status;
        }
        // $data->save();
    
        $user->name=$request->name;
        $user->email=$request->email;
        $user->status=$request->status;
        if ($user->save()) {
            return redirect()->route('users.teacher')
            ->with('success', 'User updated successfully');
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function dashboard(){
        $users=User::all();
        return view('user.dashboard',compact('users'));
    }
}
