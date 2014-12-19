@extends('layouts.master')
@section('content')
<script type="text/javascript">
    $(function() {
        $("#start_date").datepicker();
        $("#funds_end_date").datepicker();
        $("#complete_date").datepicker();
    });
    
    $(function() {
    var availableTags = [
      "Action",
      "Comedy",
      "Drama",
      "Documentary",
      "Horror",
      "Romance",
      "Sci-fi/Fantasy",
      "Western"
    ];
    $( "#genre" ).autocomplete({
      source: availableTags
    });
  });
</script>

<h1>Create A New Project</h1>

<form class="form-horizontal" role="form" action="{{ URL::route('account-create-post') }}" method="post">
    <div class="form-group">    
        <label for="project_title" class="col-sm-2 control-label">Project Name</label>
        <div class="col-sm-10">
            {{ Form::text('project_title', Input::old('project_title'), ['placeholder' => 'Project Name']) }} 
            @if($errors->has('project_title'))
                {{ $errors->first('project_title') }}
            @endif
        </div>
    </div>    
    <div class="form-group">    
        <label for="genre" class="col-sm-2 control-label">Genre</label>
        <div class="col-sm-10">
            <input id="genre" name="genre" class="ui-autocomplete-input" autocomplete="on" required="">
        </div>
    </div>
    <div class="form-group">    
        <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>
        <div class="col-sm-10">
            {{ Form::textarea('synopsis') }}
            @if($errors->has('synopsis'))
                {{ $errors->first('synopsis') }}
            @endif 
        </div>
    </div>
    <div class="form-group">
        <label for="start_date" class="col-sm-2 control-label">Start Date</label>
        <div class="col-sm-10">
            {{ Form::text('start_date', Input::old('start_date')) }} 
        </div>
    </div>
    <div class="form-group">
        <label for="funds_end_date" class="col-sm-2 control-label">Funding Until</label>
        <div class="col-sm-10">
            {{ Form::text('funds_end_date', Input::old('funds_end_date')) }} 
        </div>
    </div>    
    <div class="form-group"> 
        <label for="complete_date" class="col-sm-2 control-label">Complete Date</label>
        <div class="col-sm-10">
            {{ Form::text('complete_date', Input::old('complete_date')) }} 
        </div>
    </div>   
    <div class="form-group">    
        <label for="goal_amount" class="col-sm-2 control-label">Goal Amount</label>
        <div class="col-sm-10">
            {{ Form::text('goal_amount', Input::old('goal_amount')) }} 
        </div>
    </div>
    <div class="form-group">
        <label for="fileupload" class="col-sm-2 control-lable">Upload File</label>
        <div class="col-sm-10">
            <input id="fileupload" type="file" name="files[]" multiple="">
        </div>
    </div>
    {{ Form::token() }}
<button type="submit" value="create_project">Submit</button>
</form>
@stop

