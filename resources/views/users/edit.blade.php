@extends('layouts.master')

@section('title')
Modification 
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modification des Données Pour :  {{ $user->full_name }}</h4>

                <form action="{{ route('users.edited') }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}" id="formrow-firstname-input">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formrow-email-input" class="form-label">Email</label>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="formrow-email-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formrow-password-input" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="formrow-password-input">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Role</label>
                                <select name="role" id="formrow-inputState" class="form-select">
                                    <option value="1" {{ $user->role->role === 'Admin' ? 'Selected' : '' }}>Admin</option>
                                    <option value="2" {{ $user->role->role === 'Secretariat' ? 'Selected' : '' }}>Secretariat</option>
                                    <option value="3" {{ $user->role->role === 'Instructor' ? 'Selected' : '' }}>Formateur</option>
                                    <option value="4" {{ $user->role->role === 'Student' ? 'Selected' : '' }}>Etudiant</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <input type="hidden" name="userId" value="{{ $user->id }}">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Modifier</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>    
@endsection

@section('script')

@endsection
