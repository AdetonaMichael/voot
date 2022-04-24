<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }
    public function makeadmin(User $user){
        $user->role ='admin';
        $user->save();
        Session::flash('success', 'Successfully... Changed Users Permission');
        return redirect(route('users.index'));
    }
    public function removeadmin(User $user){
        $user->role = 'writer';
        $user->save();
        Session::flash('success', 'Successfully... Changed Users Permission');
        // session()->flash('success', 'Successfully... Changed Users Permission');
        return redirect(route('users.index'));
    }
    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UpdateProfileRequest $request){
        $data = $request->only(['name','about','firstname','lastname','twitter','facebook','linkdin','stack']);
        $user = auth()->user();
        if($request->hasFile('image')){
            $image = $request->image->store('profpix', 's3');
            $data['image'] = Storage::disk('s3')->url($image);
        }
        $user->update($data);
        
        Session::flash('success', 'Profile Updated Successfully...!!');
        return redirect(route('users.edit-profile'));

    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
