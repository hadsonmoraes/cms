@extends('sistema::layouts.admin')

@section('title', 'Cadastrar')

@section('content')

    <form action="{{ route('sistema::profile.update') }}" method="POST" class="row g-3">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <label class="form-label" for="profile-first"> nome </label>
            <input type="text" class="form-control" name="name" id="profile-first" value="{{ $user->name }}" />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="profile-email"> Email </label>
            <input type="email" class="form-control" name="email" id="profile-email" value="{{ $user->email }}" />
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary ms-1">
                Cancel
            </button>
        </div>
    </form>

@endsection
