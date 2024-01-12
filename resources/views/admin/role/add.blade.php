@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
@endsection

@section('js')
    <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        @include('admin.alert')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data"
                        style="width:100%;">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên Vai tro</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên vai tro" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name"
                                    placeholder="Mô tả vai tro" rows="4">{{ old('display_name') }}</textarea>
                                @error('display_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div {{ $i = 0 }} class="row">
                                    <div class="col-md-12">
                                        <label for="">
                                            checkall
                                            <input type="checkbox" class="checkall">
                                        </label>
                                    </div>
                                    @foreach ($permissionParent as $permissionItem)
                                        <div {{ $i++ }}
                                            class="card text-white {{ $i % 2 == 0 ? 'bg-secondary' : 'bg-success' }} mb-3 col-md-12">
                                            <div class="card-header">
                                                <label for="">
                                                    <input type="checkbox" class="checkbox_wrapper">
                                                </label>
                                                Modul {{ $permissionItem->name }}
                                            </div>
                                            <div class="row">

                                                @foreach ($permissionItem->permissionsChildren as $permissionItemChild)
                                                    <div class="card-body ">
                                                        <h5 class="card-title">
                                                            <label for="">
                                                                <input type="checkbox" name="permission_id[]"
                                                                    class="checkbox_children"
                                                                    value="{{ $permissionItemChild->id }}">
                                                            </label>
                                                            {{ $permissionItemChild->name }}
                                                        </h5>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
