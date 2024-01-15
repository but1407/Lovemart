@extends('layouts.admin')

@section('title')
    <title>Add Menus</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'menus', 'key' => 'Add'])
        @include('admin.alert')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.permissions.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Chọn Phan quyen cha</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">chon ten module</option>
                                    @foreach (config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach

                                    {{-- {!! $optionSelect !!} --}}

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach (config('permissions.module_children') as $moduleItem)
                                        <div class="col-md-3">
                                            <input type="checkbox" name="module_child[]" value="{{ $moduleItem }}">
                                            <b>{{ $moduleItem }}</b>
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
