@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Setting</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboardadmin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">User Setting</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Your Data</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="First Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                  <input id="newpassconf" name="newpassconf" placeholder="Confirm Password" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>
                
            </div>
        </div>
@endsection