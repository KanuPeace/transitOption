@extends('admin.layout.app',[ 'pageTitle' =>  'Users Management | Users' , 'activeGroup'  => 'users_management', 'activePage' => 'users'])
@section('content')
@php
    $source = env('RESOURCE_PATH').'/'."dashboard";
@endphp
<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{$user->getAvatar()}}" width="160" height="160" alt="avatar" />
                                {{-- <div class="btn btn-sm btn-info" >
                                    Change Photo <i class="material-icons mt-4">camera_alt</i>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden"  name="user_id" value="{{auth('web')->id()}}">
                                </form> --}}
                            </div>
                            <div class="content-area">
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->getRole()}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Name</span>
                                    <span>{{$user->fullName()}}</span>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <span>{{$user->email}}</span>
                                </li>
                                <li>
                                    <span>Phone</span>
                                    <span>{{$user->phone}}</span>
                                </li>
                                <li>
                                    <span>Country</span>
                                    <span>{{$user->country}}</span>
                                </li>
                                <li>
                                    <span>State</span>
                                    <span>{{$user->state}}</span>
                                </li>
                                <li>
                                    <span>Referral Code</span>
                                    <span>{{$user->ref_code}}</span>
                                </li>
                                <li>
                                    <span>Status</span>
                                    <span>{{$user->getStatus()}}</span>
                                </li>
                                <li>
                                    <span>Referrals</span>
                                    <span>{{$referrals->count()}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#referrals" aria-controls="referrals" role="tab" data-toggle="tab">Referrals</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane fade in active" id="referrals">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Referrals History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>User name</th>
                                                                <th>Reference</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($referrals as $referral)
                                                            <tr>
                                                                <td>{{$referral->user->name}}</td>
                                                                <td>{{$referral->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.users.update' , $user)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="NameSurname" class="col-sm-2 control-label">First Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                            <input type="text" class="form-control" id="NameSurname" name="fname" placeholder="Name Surname" value="{{$user->fname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="NameSurname" class="col-sm-2 control-label">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                            <input type="text" class="form-control" id="NameSurname" name="lname" placeholder="Name Surname" value="{{$user->fname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Phone</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{$user->phone}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Gender</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control" name="gender"  required>
                                                                    <option value="" disabled selected>Select Option</option>
                                                                    <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                                    <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Country</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control" name="country"  required>
                                                                    {{-- <option value="" disabled selected>Select Option</option> --}}
                                                                    <option value="Nigeria">Nigeria</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">State</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="state" placeholder="e.g Lagos" value="{{$user->state}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Role</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control" name="role"  required>
                                                                    <option value="" disabled selected>Select Option</option>
                                                                    {{-- <option value="{{$userRole}}" {{$user->role == $userRole ? 'selected' : ''}}>User</option>
                                                                    <option value="{{$bloggerRole}}" {{$user->role == $bloggerRole ? 'selected' : ''}}>Blogger</option>
                                                                    <option value="{{$instructorRole}}" {{$user->role == $instructorRole ? 'selected' : ''}}>Instructor</option>
                                                                    <option value="{{$adminRole}}" {{$user->role == $adminRole ? 'selected' : ''}}>Administrator</option> --}}
                                                                </select>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Profile Photo</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="file" class="form-control" name="avatar" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Status</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select type="text" name="status" required class="form-control" required>
                                                                    <option disabled selected></option>
                                                                    <option value="{{$activeStatus}}" {{ $user->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                                    <option value="{{$inactiveStatus}} {{ $user->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" method="POST" action="{{route('admin.users.password_reset' , $user) }}">
                                        @csrf
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="new" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="new_confirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
