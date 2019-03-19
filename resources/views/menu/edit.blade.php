@extends('layouts.adminlte')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Menu</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{route('menus.update', ['menu' => $menu['id']])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Nama Menu" value="{{old('nama_menu')?old('nama_menu'):$menu['nama_menu']}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="{{old('icon')?old('icon'):$menu['icon']}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="0" selected="selected">Menu Utama</option>
                                    @php
                                    $parents = (new \App\Menu())->menu_parent();
                                    $selected = old('parent')?old('parent'):$menu['parent'];
                                    @endphp
                                    @foreach($parents as $parent)
                                        <option value="{{$parent['id']}}" {{$parent['id']==$selected?' selected="selected"':''}}>{{$parent['nama_menu']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Url</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="Url" value="{{old('url')?old('url'):$menu['url']}}">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
