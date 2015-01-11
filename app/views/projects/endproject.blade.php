@extends('layouts.master')
@section('content')
<div class="container" style="margin-top:50px;margin-bottom:100px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">End {{ $project->project_title }}</div>
                <div class="panel-body">
                    <div id="donation-panel-body" style="font-size:16px;margin-bottom:5px;margin-top:20px;padding:20px;">
                        <p>Are you sure you want to end <b>{{ $project->project_title }}</b>?</p>
                        <p>If you end your project you will no longer be able to receive donations for it. You may request re-activation of your project at any time.</p>
                        <div style="padding:10px;margin:auto;margin-bottom:20px;width:200px;height:40px;">
                            <form action="{{ URL::route('project-edit-status-post', $project->id) }}" method="post" role="form">
                                <input type="hidden" name="status" value="ended">
                                <button class="btn btn-danger" type="submit" value="end-project">End {{ $project->project_title }}</button>
                            {{ Form::token() }}
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
</div>
@stop