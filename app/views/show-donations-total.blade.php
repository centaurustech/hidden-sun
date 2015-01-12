@extends('layouts.master')
@section('content')

<h2>{{ $project->project_title }}</h2>

<h3>Donations</h3>
{{ $donation_total }}
@stop