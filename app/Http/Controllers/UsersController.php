<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }
    public function makeadmin(User $user){
        $user->role ='admin';
        $user->save();
        session()->flash('success', 'The User is Now an Admin');
        return redirect(route('users.index'));
    }
    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UpdateProfileRequest $request){
        $user = auth()->user();
        $user->update([
            'name'=> $request->name,
            'about'=>$request->about,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'twitter'=>$request->twitter,
            'facebook'=>$request->facebook,
            'linkdin'=>$request->linkdin,
            'stack'=>$request->stack,
            'image'=>$request->image->store('profpix'),
        ]);

        session()->flash('success', 'User Updated Successfully...');
        return redirect(route('users.edit-profile'));

    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
