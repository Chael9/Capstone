@extends('layouts.appvue')

@section('content')
<profile-stu :student="{{ auth()->user() }}"></profile-stu>
@endsection
