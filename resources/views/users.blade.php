<?php
// use App\Models\CmsHelper as cms;
?>

@extends('layouts.adminlte')

@section('title', 'user')

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
            <a href="{{ route('users_create') }}" class="btn btn-success float-right">add</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">user</h3>

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

          <table class="table table-bordered table-striped ">
            <thead>
              <tr class="text-center">
                <th width="10%">id</th>
                <th class="text-left">name</th>
                <th class="text-left" width="10%">email</th>
                <th width="10%">role</th>
                {{-- <th width="15%">created_at</th> --}}
                <th width="15%">action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key => $value)
                <tr class="text-center">
                  <td>{{ $users->firstItem() + $key }}</td>
                  <td class="text-left">{{ $value->name }}</td>
                  <td class="text-left">{{ $value->email }}</td>
                  <td>{{ $value->role }}</td>
                  {{-- <td class="">{{ cms::thaiDate($value->created_at) }}</td> --}}
                  <td>
                    <a href="{{ route('users_edit', $value->id) }}" class="btn btn-sm btn-primary">edit</a>
                    <a href="{{ route('users_delete', $value->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบ {{ $value->name }} ?')">del</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="my-3"> {{ $users->links() }}</div>


        </div><!-- /.card-body -->
      </div><!-- /.card -->
    </section><!-- /.content -->
  </div>
@stop

@section('css')
@stop

@section('js')
@stop
