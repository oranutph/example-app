@extends('layouts.adminlte')

@section('title', 'user create')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> User</h1>
          </div>
          <div class="col-sm-6">
            {{-- <a href="" class="btn btn-success float-right">add</a> --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">user create</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @elseif(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif


          <form action="{{ route('users_update') }}" method="post">
            @csrf

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">name</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-10">
                <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="email" disabled>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">password</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">role</label>
              <div class="col-sm-10">
                <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                  <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                  <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>manager</option>
                  <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                </select>
                @error('role')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <input type="hidden" name="id" value="{{ $user->id }}" >
            <a href="{{ route('users') }}" class="btn btn-secondary">back</a>
            <button type="submit" class="btn btn-primary">save</button>
          </form>

        </div><!-- /.card-body -->
      </div><!-- /.card -->
    </section><!-- /.content -->
  </div>
@stop

@section('css')
@stop

@section('js')
@stop
