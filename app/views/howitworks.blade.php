@extends('layouts.master')
@section('content')

<div class="jumbotron">
      <div class="container">
        <h2 class="mega">How It Works</h2>
        <p class="h3">Film Seedr is a community dedicated to bringing together creators and supporters to bring amazing projects to life.</p>
      </div>
</div>

<div class="container" style="margin-bottom:150px;">
    <div class="row" id="featured-project">
        <div class="col-md-10">
            <h2>Donate to projects you find interesting.</h2>
            <ul style="list-style-type:none;">
                <li>
                    <span class="glyphicon glyphicon-film"></span>
                    <h3>All donations are anonymous.</h3>
                    <p>There's no need to create an account. In as few as four clicks you can help a project you like.</p>
                </li>
                <li>
                    <span class="glyphicon glyphicon-film"></span>
                    <h3>It's Safe</h3>
                    <p>Transactions are handled with <a href="https://stripe.com/">Stripe</a> so we never store your credit card information on our servers.</p>
                </li>
            </ul>
            <h2>Get funding for your next project.</h2>
            <ul style="list-style-type:none;">
                <li>
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    <h3>Projects must have a clearly stated purpose.</h3>
                    <p>We understand that your project is still in development and some aspects of it will change, however respect your donors and be transparent. Please do not misrepresent your content or intention of your project.</p>
                </li>
            
                <li>
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    <h3>Funds for the project should only be used for the project.</h3>
                    <p>Flim Seedr is here to bring new movies to life. However, we not insure that donated funds will be used to support registred charities or causes.</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop
