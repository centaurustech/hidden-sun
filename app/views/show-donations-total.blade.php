@extends('layouts.master')
@section('content')
<h3>{{ $project->project_title }} has {{ $donation_total }} cents of donations</h3>
@stop