
@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header',['name'=>'Menu','key'=>'Edit'])
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-12">
            <div style="margin-bottom: 2px">
              <a href="{{ route('home') }}"><button type="button" class="btn btn-success float-sm-right">Home</button></a>
            </div>
             <form action="{{ route('menus.update',['id' => $menus['id'] ]) }}" method="post">
                {{ csrf_field() }}
        			  <div class="form-group">
        			    <label for="exampleInputEmail1">Nhập tên menu</label>
        			    <input type="text" class="form-control" name="name" placeholder="Tên menu" value="{{ $menus->name }}">
        			  </div>
        			  <div class="form-group">
                  <label for="exampleFormControlSelect1">Chọn menu cha</label>
                  <select class="form-control" name="parent_id">
                    <option>Chọn danh mục cha</option>
                    @foreach($list_menu as $menu)
                        <option value="{{$menu['id']}}" @if($menus->parent_id == $menu['id']) selected @endif >{{$menu['name']}}</option>
                    @endforeach
                  </select>
               </div>
        			  <button type="submit" class="btn btn-primary">Submit</button>
      			</form>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    </div>
      <!-- /.content -->
</div>
@endsection