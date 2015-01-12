@extends('layouts.master')
@section('content')
<script type="text/javascript">
    $(function() {
        $("#funds_start_date").datepicker();
        $("#funds_end_date").datepicker();
        $("#complete_date").datepicker();
    });

    $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>
    <div class="row">
    <form role="form" action="{{ URL::route('projects-create-post') }}" method="post">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="row setup-content" id="step-1" style="margin-bottom:50px;">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h3>Describe Your Project</h3>
                    <div class="form-group" style="margin-bottom:20px;">
                        <div class="input-group input-group-lg" style="width:500px;">
                            {{ Form::text('project_title', Input::old('project_title'), ['class' => 'form-control', 'placeholder' => 'Project Title', 'required' => 'required']) }} 
                            @if($errors->has('project_title'))
                                {{ $errors->first('project_title') }}
                            @endif
                        </div>
                    </div>
            <!-- genres -->
                    <div class="form-group" style="margin-bottom:70px;">    
                        <div class="col-sm-2" style="margin-right:10px;padding-left:0px;">
                            <select name="genre">
                                @foreach ($main_genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('genre'))
                                {{ $errors->first('genre') }}
                            @endif
                        </div>
                        <div class="col-sm-2" style="margin-right:10px;padding-left:0px;">
                            <select name="genre2">
                                @foreach ($secondary_genres as $genre)
                                    <option value="{{ $genre->id }}" selected="99">{{ $genre->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2" style="margin-right:10px;padding-left:0px;">
                            <select name="genre3">
                                @foreach ($secondary_genres as $genre)
                                    <option value="{{ $genre->id }}" selected="99">{{ $genre->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            <!-- synopsis -->
                    <div class="form-group" style="margin-bottom:20px;margin-top:25px;">    
                        <div class="col-sm-10" style="padding-left:0px;">
                            {{ Form::textarea('synopsis', Input::old('synopsis'), ['class' => 'form-control', 'style' => 'height:300px;', 'placeholder' => 'Describe your movie here...', 'required' => 'required']) }}
                            @if($errors->has('synopsis'))
                                {{ $errors->first('synopsis') }}
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="position:relative;right:100px;">Next</button>
        </div>
    <!-- - step 2 - -->    
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3>Enter Funding Goals</h3>
                    <div class="form-group">
                        <label class="control-label">Funding Goal</label>
                        <input type="text" name="funds_goal" id="funds_goal">
                            @if($errors->has('funds_goal'))
                                {{ $errors->first('funds_goal') }}
                            @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Funding Start Date</label>
                        <input type="text" name="funds_start_date" id="funds_start_date">
                            @if($errors->has('funds_start_date'))
                                {{ $errors->first('funds_start_date') }}
                            @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Funding End Date</label>
                        <input type="text" name="funds_end_date" id="funds_end_date">
                            @if($errors->has('funds_end_date'))
                                {{ $errors->first('funds_end_date') }}
                            @endif
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
    <!-- - step 3 - -->    
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Finish</h3>
                <div class="form-group">    
                    <label for="stage" class="col-sm-2 control-label">Stage of Production</label>
                    <select name="stage">
                        <option value="pre-production">Pre-Production</option>
                        <option value="in-production">In-Production</option>
                        <option value="post-production">Post-Production</option>
                    </select>
                </div>
            </div>
                <div class="form-group">    
                    <label for="video_url" class="col-sm-2 control-label">Video URL</label>
                    {{ Form::text('video_url', Input::old('funds_goal')) }} 
                </div>
                <div class="form-group">
                    <label for "thumbnail_url" class="col-sm-2 control-label">Cover Image URL</label>
                    <div class="col-sm-2">
                        {{ Form::text('thumbnail_url', Input::old('thumbnail_url')) }}
                    </div>
                </div>
            </div>
                    <button class="btn btn-success btn-lg pull-right" type="submit" value="create_project">Finish!</button>
        </div>

    </div>
    {{ Form::token() }}
    </form>
</div><!-- form row -->
</div> <!--container -->
@stop

