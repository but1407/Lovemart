@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/home/home.scss') }}">
@endsection
@section('js')
<script src="{{ asset('admins/home/home.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Home', 'key' => ''])
        @include('admin.alert')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="question">Do u love ur job?</div>
                            <label class="ans yes">
                                <input class="ansYes" type="radio" name="ans">
                                <div class="tick">✓</div>
                                □ YES
                            </label>
                            <label class="ans no">
                                <input class="ansNo" type="radio" name="ans">
                                <div class="tick">✓</div>
                                □ NO
                            </label>
                            <div class="cat active">
                                <div class="tick">✓</div>
                                <div class="face">()</div>
                                <div class="ear ear_l">v</div>
                                <div class="ear ear_r">v</div>
                                <div class="eye eye_l">.</div>
                                <div class="eye eye_r">.</div>
                                <div class="mouth">T</div>
                                <div class="wisker wisker_l">"</div>
                                <div class="wisker wisker_r">"</div>
                                <div class="body">( )</div>
                                <div class="foot foot_l">V</div>
                                <div class="foot foot_r">V</div>
                                <div class="hand hand_l">V</div>
                                <div class="hand hand_r">V</div>
                                <div class=tail>S</div>
                            </div>
                        </div>

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
    
</style>
