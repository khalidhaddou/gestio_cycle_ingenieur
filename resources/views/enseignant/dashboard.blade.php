@extends('enseignant.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->


    <div class="container-xxl flex-grow-1 container-p-y">
 


        <div class="card " >
            <div class="card-body" >
              <div class="d-flex flex-column align-items-center text-center">
                <img
                  src="{{asset(Auth::guard('admin')->user()->image)}}"
                  alt="user-avatar"
                  class="img-fluid rounded   justify-center"
                  height="100"
                  width="100"
                  id="uploadedAvatar"
                />
                <br>
                <div class="button-wrapper ">
                  <p class="text-muted mb-0">{{Auth::guard('admin')->user()->nom}} {{Auth::guard('admin')->user()->prenom}}</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="firstName"
                      value="{{Auth::guard('admin')->user()->nom}}"
                      autofocus
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Prenome</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{Auth::guard('admin')->user()->prenom}}" disabled />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{Auth::guard('admin')->user()->email}}"
                      placeholder="john.doe@example.com"
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">CIN</label>
                    <input
                      type="text"
                      class="form-control"
                      id="organization"
                      name="organization"
                      value="{{Auth::guard('admin')->user()->cin}}"
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">N°Tell</label>
                    <div class="input-group input-group-merge">

                      <input
                        type="text"
                        id="phoneNumber"
                        name="phoneNumber"
                        class="form-control"
                       value="{{Auth::guard('admin')->user()->telephone}}"
                       disabled
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{Auth::guard('admin')->user()->adresse}}" disabled />
                  </div>
              </form>
            </div>
    </div>

     </div>
</div>
@endsection




