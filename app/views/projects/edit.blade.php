@extends('layouts.master')
@section('content')
<script type="text/javascript">
    $(function() {
        $("#start_date").datepicker();
        $("#funds_end_date").datepicker();
        $("#complete_date").datepicker();
    });
</script>

<div class="form-outline">
    <h1>Update {{ $this_project->project_title }}</h1>
    {{ Form::model($this_project, array('route' => array('project-edit-put', $this_project->id), 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form')) }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">    
            <label for="project_title" class="col-sm-2 control-label">Project Name</label>
            <div class="col-sm-10">
                {{ Form::text('project_title', Input::old('project_title'), ['placeholder' => 'War Stars: Episode 53']) }} 
                @if($errors->has('project_title'))
                    {{ $errors->first('project_title') }}
                @endif
            </div>
        </div>    
        <div class="form-group">    
            <label for="genre" class="col-sm-2 control-label">Genre</label>
            <div class="col-sm-10">
                <select name="genre">
                    @foreach ($main_genres as $genre)
                        <option value="{{ $genre->id }}" selected="{{ $this_project->genre }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
                @if($errors->has('genre'))
                    {{ $errors->first('genre') }}
                @endif
            </div>
        </div>
        <div class="form-group">    
            <label for="genre" class="col-sm-2 control-label">Other Genre (optional)</label>
            <div class="col-sm-10">
                <select name="genre2">
                    @foreach ($secondary_genres as $genre)
                        <option value="{{ $genre->id }}" selected="{{ $this_project->genre2 }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">    
            <label for="genre" class="col-sm-2 control-label">Other Genre (optional)</label>
            <div class="col-sm-10">
                <select name="genre3">
                    @foreach ($secondary_genres as $genre)
                        <option value="{{ $genre->id }}" selected="{{ $this_project->genre3 }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
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
                <input type="text" name="start_date" id="start_date">
                @if($errors->has('start_date'))
                    {{ $errors->first('start_date') }}
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="funds_end_date" class="col-sm-2 control-label">Funding Until</label>
            <div class="col-sm-10">
                <input type="text" name="funds_end_date" id="funds_end_date">
                @if($errors->has('funds_end_date'))
                    {{ $errors->first('funds_end_date') }}
                @endif
            </div>
        </div>    
        <div class="form-group"> 
            <label for="complete_date" class="col-sm-2 control-label">Complete Date</label>
            <div class="col-sm-10">
                <input type="text" name="complete_date" id="complete_date">
                @if($errors->has('complete_date'))
                    {{ $errors->first('complete_date') }}
                @endif
            </div>
        </div>   
        <div class="form-group">    
            <label for="funds_current" class="col-sm-2 control-label">Currently Funded</label>
            <div class="col-sm-10">
                {{ Form::text('funds_current', Input::old('funds_current')) }} 
            </div>
        </div>    
        <div class="form-group">    
            <label for="goal_amount" class="col-sm-2 control-label">Funding Goal</label>
            <div class="col-sm-10">
                {{ Form::text('funds_goal', Input::old('funds_goal')) }} 
            </div>
        </div>
        <div class="form-group">    
            <label for="stage" class="col-sm-2 control-label">Stage of Production</label>
            <div class="col-sm-10">
                <select name="stage">
                    <option value="pre-production" selected="{{ $this_project->stage }}">Pre-Production</option>
                    <option value="in-production" selected="{{ $this_project->stage }}">In-Production</option>
                    <option value="post-production" selected="{{ $this_project->stage }}">Post-Production</option>
                </select>
            </div>
        </div>
        <div class="form-group">    
            <label for="video_url" class="col-sm-2 control-label">Video URL</label>
            <div class="col-sm-10">
                {{ Form::text('video_url', Input::old('funds_goal')) }} 
            </div>
        </div>
        {{ Form::token() }}
    <button type="submit" value="create_project">Update</button>
    </form>
</div> <!--form outline -->
@stop

