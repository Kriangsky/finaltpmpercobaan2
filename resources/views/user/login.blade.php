@extends('app')

@section('content')
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/timeline">Timeline</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/">Logout</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                  </li> --}}
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="row">
        <div class="cpl-md-6">
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('login.action') }}">
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
                    <button class="btn btn-primary">Login</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>              
            </form>
        </div>
    </div>
@endsection
