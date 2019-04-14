@extends('layouts.appvue')

@section('content')
<profile-gua :guardian="{{ auth()->user() }}"></profile-gua>
@endsection
