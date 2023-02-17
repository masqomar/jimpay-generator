@extends('layouts.app')

@section('title', trans('Tabungan'))

@extends('layouts.contentHeader')

@section('content')
<!-- loader -->
<div id="loader">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- * loader -->

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Tabungan</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

Comming Soon

@endsection