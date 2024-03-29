@extends('layouts.admin')

@section('title')
    <title>CHAT</title>
@endsection

@section('content')
    <div class="content-wrapper">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Chats</div>

                            <div class="panel-body">
                                <chat-messages :messages="messages"></chat-messages>
                            </div>
                            <div class="panel-footer">
                                User: {{ Auth::user()->name }}
                                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div></div>
@endsection
