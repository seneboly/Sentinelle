@extends('template.app')
@inject('f', 'App\Services\Helpers')

@section('title')

Tableau de bord | Gestion clients

@endsection


@section('page_name')

@include('template.inc.page_name', ['name'=>'Liste des réclamations par client'])

@endsection

@section('counter')

@include('template.inc.counter')



@endsection

@section('content')





@endsection