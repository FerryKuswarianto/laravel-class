@extends('layout.master')
@section('main')
    {!! BootstrapForm::horizontal(['model' => $user, 'update' => 'user.update']) !!}
        @include('user.form')
        {!! BootstrapForm::submit('Update') !!}
    {!! BootstrapForm::close() !!}
@stop

