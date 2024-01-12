@extends('layouts.admin')

@section('title')
    <title>list User</title>
@endsection
@section('js')
    <script src="{{ asset('sweetalert/sweetalert2/sweetalert2.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script type="module" src="{{ asset('admins/slider/index/list.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'User', 'key' => 'list'])
        @include('admin.alert')
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <form class="" method="get" role="search">
                            <div class="form-row">
                                <div class="col-md-4 mb-4">
                                    <label for="full_name">Tên danh mục</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ request()->name }}" placeholder='Tên danh mục'>
                                </div>
                                {{-- <div class="col-md-4 mb-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ request()->email }}" placeholder='email'>
                            </div> --}}
                                {{-- <div class="col-md-4 mb-4">
                                <label for="status">Vai trò</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Tất cả</option>
                                    @if (!empty(getAllCategories()))
                                        @foreach (getAllCategories() as $item)
                                            <option value="{{ $item->status }}"
                                                {{ request()->status == $item->status ? 'selected' : false }}>
                                                {{ $item->status }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select> --}}

                            </div>
                            <div class="">
                                <button class="btn btn-success" type="submit">Tìm Kiếm</button>&nbsp;
                            </div>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Email</th>

                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {!! \App\Helpers\helper::user($users) !!}

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
                <div class="col-md-3 pull-right float-right">
                    Tổng: {{ number_format($users->total()) }} kết quả
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

<style>
    .noanimation:hover,
    .noanimation {
        text-decoration: none;
        color: inherit;
    }
</style>
