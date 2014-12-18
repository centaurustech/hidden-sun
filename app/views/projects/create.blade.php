<!-- /vagrant/sites/hidden-sun.dev/app/views/projects/create.blade.php -->
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
    $( "#genre_id" ).autocomplete({
      source: availableTags
    });
  });
</script>

<h1>Create A New Project</h1>
<form class="form-horizontal" role="form">
        
    <div class="form-group">

        <p>Project Name: <input type="text" id="project_title" placeholder="Project Title" required=""></p>
 
        <div class="ui-widget">
          <label for="genre_id">Genre: </label><br>
          <input id="genre_id" class="ui-autocomplete-input" autocomplete="on" required="">
        </div>
        
        <label>Synopsis</label><br>
        <textarea id="synopsis" rows="5" cols="20"></textarea>

        <p>Start Date: <input type="text" id="start_date"></p>

        <p>Funding Until: <input type="text" id="funds_end_date"></p>
        
        <p>Comlete Date: <input type="text" id="complete_date"></p>

        <p>Goal Amount: <input type="text" id="goal_amount"></p>
        
        <p>Upload Video:
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple=""></p>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

    </div>

</form>




@stop
