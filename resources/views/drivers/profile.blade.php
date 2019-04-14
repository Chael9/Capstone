@extends('layouts.appvue')

@section('content')
<profile-dri :driver="{{ auth()->user() }}"></profile-dri>
@endsection
