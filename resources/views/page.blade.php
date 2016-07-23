@extends('layout.master')
@section('title','Page Title')
@section('sidebar')
	@parent
	<P>This is appended to master sidebar </p>
@endsection
@section('content')
	<h2>{{ $name }}</h2>
	<p> The content goes here </p>
	<h2>If statement</h2>
	@if($day == 'Friday')
		<p> Time to Party </p>
	@else
		<P> Time to Make Money </p>
	@endif
	<h2>For Loop</h2>
	@foreach($drinks as $drink)
		<p>{{ $drink}}</p>
	@endforeach

	{{ date('D M,Y') }}
@endsection