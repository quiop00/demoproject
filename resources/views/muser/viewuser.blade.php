@extends('layouts.layout')

@section('titles', 'User View')

@section('content')

@include('muser.Header')

@include('muser.SearchMuser')

<div id="table-users">
    @include('muser.TableMuser')
</div>
@endsection