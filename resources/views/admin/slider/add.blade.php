@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])
        @include('admin.alert')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên slider" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Mô tả" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control-file" id="upload" name="image_path">
                                <div id="image_show_face">
                                </div>
                                <input type="hidden" name="thumb_1" id="thumb_1">
                            </div>
                            <div class="form-group">
                                <label for="menu">Sắp Xếp</label>
                                <input type="number" name="sort_by" value="1" class="form-control" >
                            </div>
                
                            <div class="form-group">
                                <label>Kích Hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                                    <label for="no_active" class="custom-control-label">Không</label>
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
