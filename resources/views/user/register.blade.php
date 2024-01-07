@extends('app')

@section('content')
    <div class="row">
        <div class="cpl-md-6">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('register.action') }}">
                @csrf
                <div class="mb-3">
                    <label>Email<span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" value="{{old ('email')}}"/>
                </div>
                <div class="mb-3">
                    <label>Password<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password"/>
                </div>              
                <div class="mb-3">
                    <label>Password Confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password_confirmation"/>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>              
            </form>
        </div>
    </div>
@endsection
