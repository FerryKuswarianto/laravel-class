@extends('layout.master')
@section('main')
    {!! BootstrapForm::horizontal(['model' => $user, 'store' => 'user.store']) !!}
        @include('user.form')
        {!! BootstrapForm::submit('Add') !!}
    {!! BootstrapForm::close() !!}
@stop

