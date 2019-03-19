@extends('layouts.adminlte')

@section('content')
<div class="content">
    <div class="box">
        <div class="box-header">
            <a href="{{url('/menus/create')}}" class="btn btn-primary btn-xs pull-right">Tambah</a>
            <h3>Daftar Menu</h3>
        </div>
        <div class="box-body table-responsive">

            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message')}}
                </div>
                @endif

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Menu</th>
                    <th>Icon</th>
                    <th>Parent</th>
                    <th>URL</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $key => $menu)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{{$menu['nama_menu']?$menu['nama_menu']:''}}</td>
                        <td><i class="{{$menu['icon']?$menu['icon']:'fa fa-files-o'}}"></i></td>
                        <td>-</td>
                        <td><a href="{{$menu['url']?$menu['url']:'/'}}">{{$menu['url']?$menu['url']:'/'}}</a></td>
                        <td>
                            <a href="{{route('menus.edit', ['menu' =>$menu['id']] )}}">Edit</a>
                            ||
                            <a href="{{route('menus.destroy', ['menu' =>$menu['id']] )}}" onclick="deleteMenu(event,this)">Hapus</a>
                        </td>
                    </tr>
                    @foreach($menu->child as $key2 => $child)
                        <tr>
                            <td>--{{$key2+1}}</td>

                            <td>{{$child['nama_menu']?$child['nama_menu']:''}}</td>
                            <td><i class="{{$child['icon']?$child['icon']:'fa fa-files-o'}}"></i></td>
                            <td>-</td>
                            <td><a href="{{$child['url']?$child['url']:'/'}}">{{$child['url']?$child['url']:'/'}}</a></td>
                            <td>
                                <a href="{{route('menus.edit', ['menu' => $child ['id'] ])}}">Edit</a>
                                ||
                                <a href="{{route('menus.destroy', ['menu' =>$child['id']] )}}" onclick="deleteMenu(event,this)">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <form action="" id="form_delete_menu" method="post">
    @csrf
    @method('DELETE')
    </form>
    <script>
    function deleteMenu(event, el) {
        event.preventDefault();
        var cf = confirm("Apakah Anda yakin akan menghapus data?");
        if (cf) {
            $("#form_delete_menu").attr('action', $(el).attr('href'));
            $("#form_delete_menu").submit();
        }
    }
</script>
@endpush