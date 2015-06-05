@extends('layout.master')
@section('main')
    {!! BootstrapForm::horizontal(['store' => 'user.login']) !!}
        {!! BootstrapForm::text('email') !!}
        {!! BootstrapForm::password('password') !!}
        {!! BootstrapForm::submit('Login') !!}
    {!! BootstrapForm::close() !!}
@stop

