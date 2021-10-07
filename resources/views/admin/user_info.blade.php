@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header text-center">User Information</div>

                <div class="card-body">
                <h6 class="card-body-title tx-20 tx-bold tx-black-5 mg-b-8 mb-5 text-center"></h6>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   
                    <div class="row justify-content-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="mb-5">
                            <img src="{{ asset($user->image) }}" class="" height="200" width="200" alt="">


                            </div>
                            
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <!-- <label for="formGroupExampleInput">Name</label> -->
                                    <input type="text" class="form-control" value="{{ $user->name}}" name="university">
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <!-- <label for="formGroupExampleInput">Email Address</label> -->
                                    <input type="text" class="form-control" value="{{ $user->email}}" name="university">
                                </div><!-- form-group -->
                                @if($user->role_id == 1)

                                    <div class="form-group">
                                        <!-- <label for="formGroupExampleInput" class="text-center">Role</label> -->
                                        <input type="text" class="form-control" value="Administrator" name="university">
                                    </div><!-- form-group -->
                                @else
                                    <div class="form-group">
                                        <!-- <label for="formGroupExampleInput" class="text-center">Role</label> -->
                                        <input type="text" class="form-control" value="Customer" name="university">
                                    </div><!-- form-group -->
                                @endif
                                <div class="mt-5">'
                                <a href="{{ route('admin-dashboard') }}" class="btn btn-primary pl-5 pr-5" >Close</a>
                                <input type="submit" class="btn btn-danger pl-5 pr-5" value="Logout">
                                </div>

                            </form>

                        </div>
                        

                       
                    <div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
