
@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header',['name'=>'Menu','key'=>'List'])
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-12">
            <div style="margin-bottom: 2px">
              <a href="{{ route('menus.create') }}"><button type="button" class="btn btn-success float-sm-right">Add</button></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list_menu as $menu)
                  <tr>
                    <th scope="row">{{$menu['id']}}</th>
                    <td>{{$menu['name']}}</td>
                    <td>
                      <button type="button" class="btn btn-info" ><a href="{{ route('menus.edit', ['id' => $menu['id'] ]) }}" style="color:white">Edit</a></button>
                      <button type="button" class="btn btn-danger"><a href="{{ route('menus.delete', ['id' => $menu['id'] ]) }}" style="color:white">Delete</a></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
           <div class="col-lg-12">
          		{{ $list_menu->links() }}
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    </div>
      <!-- /.content -->
</div>
@endsection