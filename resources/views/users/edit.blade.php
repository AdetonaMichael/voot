@extends('layouts.app')

@section('content')


<div class="container rounded bg-white mb-5">
    <div class="row">
        @if($errors->any())
        <div class="alert alert-danger">
              <ul class="list-group">
                  @foreach ($errors->all() as $error )
                      <li class="list-group-item text-danger text-center">{{ $error }}</li>
                  @endforeach
              </ul>
        </div>
        @endif

                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{ $user->image }}" width="90"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span></div>

                </div>

                    <div class="col-md-5 border-right">
                        <form action="{{ route('users.update-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-right">Edit your profile</h6>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Profile Pix</label><input type="file" class="form-control" name="image" value="{{ $user->name }}"></div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="first name" name="name" value="{{ $user->name }}"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" name="firstname" value="{{ $user->firstname }}"></div>
                                <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{ $user->lastname }}" name="lastname" placeholder="Doe"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Your Stack</label><input type="text" class="form-control" name="stack" value="{{ $user->stack }}"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">About Me</label><textarea name="about" class="form-control" id="about" cols="30" rows="10">{{ $user->about }}</textarea>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Twitter</label><input type="text" class="form-control" name="twitter" placeholder="Twitter Url" value="{{ $user->twitter }}"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">FaceBook</label><input type="text" class="form-control" name="facebook" placeholder="Facebook Url" value="{{ $user->facebook }}"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Linkdin</label><input type="text" class="form-control" name="linkdin" placeholder="Linkdin Url" value="{{ $user->linkdin }}"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
                        </div>
                    </div>

                </form>
                </div>


    <div class="col-md-4">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center experience"><span>Edit Socials</span></div>
            <div class="d-flex flex-row mt-3 exp-container"><img src="https://i.imgur.com/azSfBM3.png" width="45" height="45">
                <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block text-black-50 labels">Twitter Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
            </div>
            <hr>
            <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/100/000000/facebook.png" width="45" height="45">
                <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block text-black-50 labels">Facebook Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
            </div>
            <hr>
            <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/50/000000/google-logo.png" width="45" height="45">
                <div class="work-experience ml-1"><span class="font-weight-bold d-block">UI/UX Designer</span><span class="d-block text-black-50 labels">Google Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
@section('css')
<style>


.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
@endsection
