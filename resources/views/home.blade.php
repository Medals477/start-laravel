@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       {{Auth::user()->name}}
    </div>
</div>
@endsection
