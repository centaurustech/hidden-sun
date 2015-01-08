@extends('layouts.master')
@section('content')

	<h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
	<p> Welcome to your profile, {{ $user->first_name }}!</p>
	<p>

	<div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="" name="aboutme" width="140" height="140" class="img-circle"></a>
        <h3>Drew Z</h3>
        <em>click my picture for more</em>
		</center>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <img src="" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading">Drew Z <small>USA</small></h3>
                    <span><strong>Skills: </strong></span>
                        <span class="label label-warning">The Stepfather</span>
                        <span class="label label-info">Saving Coder Ryan</span>
                        <span class="label label-info">Jurassic Shark</span>
                        <span class="label label-success">Gone with the air</span>
                    </center>
                    <hr>
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                        Great overall guy who likes to make movies and have fun</p>
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back to profile</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

@stop