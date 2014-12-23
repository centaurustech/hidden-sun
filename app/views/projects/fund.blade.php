@extends('layouts.master')
@section('content')

<h2>Fund A Project</h2>

<form class="form-horizontal" role="form" action="{{ URL::route('projects-fund') }}" method="post">
        <div class="form-group">    
            <label for="amount" class="col-sm-2 control-label">Enter Amount</label>
            <div class="col-sm-10">
                <input id="amount" type="text" name="amount" class="ui-autocomplete-input" autocomplete="on">
                @if($errors->has('amount'))
                    {{ $errors->first('amount') }}
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="payment_type" class="col-sm-2 control-label">Select Payment Type</label>
            <div class="btn-group">
              <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Small button <span class="caret"></span>
              </button>
                  <ul class="dropdown-menu" role="menu">
                        <li><a href="#">PayPal</a></li>
                        <li><a href="#">Credit</a></li>
                        <li><a href="#">Debit</a></li>
                  </ul>
            </div>
        </div>
</form>





@stop
