
@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header',['name'=>'Home','key'=>'home'])
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    </div>
      <!-- /.content -->
</div>
@endsection