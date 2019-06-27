@extends('layouts.app')

@section('content')<br>
<?php
header('Location: https://www.easytravelshare.com/'. Auth::user()->name );
die();

// old homepage below
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard for {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            Login status: {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/profile/{{ Auth::user()->name }}" class="btn btn-primary">Go to public profile</a>
                    <hr>
                    <code>More soon</code>
                    <!--
                    - public private switch
                -->
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
