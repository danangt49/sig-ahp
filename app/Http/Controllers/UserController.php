<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }
    public function index()
    {
        return view('website.user.home');
    }
    
    public function json()
    {
        $data = User::get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
          $btn='
          <a class="btn btn-sm" href="user/'.$row->id.'"><i class="fas fa-tools"></i></a>
          <button data-id="'.$row->id.'"class="btn btn-sm delete"><i class="fas fa-trash-restore"></i></button>
          ';
          return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create()
    {
        return view('website.user.create');
    }
    public function store(Request $request)
    {
        $data = [
            'name'	      => $request->name,
            'username'	  => Str::lower(Str::slug($request->name.Str::random(2))),
            'alamat'	  => $request->alamat,
            'tgl_lahir'	  => $request->tgl_lahir,
            'jk'	      => $request->jk,
            'role'	      => $request->role,
            'email'	      => $request->email,
            'password'    => Hash::make($request->password),
        ];
    
        User::create($data);
        return redirect('user')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $data['user']   = User::find($id);
        return view('website.user.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name'	      => $request->name,
            'alamat'	  => $request->alamat,
            'tgl_lahir'	  => $request->tgl_lahir,
            'jk'	      => $request->jk,
            'role'	      => $request->role,
            'email'	      => $request->email,
        ];
       
        User::where('id',$id)->update($data);
        return redirect('user')->with('success','Data Updated successfully');
    }

    public function delete($id)
    {
        $data              = User::find($id);
        $data->delete();
        return redirect('user');
    } 
}
