@extends('layouts.manage')

@section('head_content')
<style>
#file {
    color: #FFFFFF !important
}
</style>
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form class="form-horizontal" method="POST" action="{{ route('news.insert') }}" enctype="multipart/form-data">
              <fieldset>
                <legend>Create News</legend>
                <div class="form-group">
                  <label for="title" class="col-lg-2 control-label">Title</label>
                  <div class="col-lg-10">
                    <input id="title" type="text" class="form-control" name="title" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="summary" class="col-lg-2 control-label">Summary</label>
                  <div class="col-lg-10">
                    <input id="summary" type="text" class="form-control" name="summary" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <textarea id="description" class="form-control" rows="4" cols="50" name="description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                	<div class="col-lg-10">
                		<label>Select image to upload:</label>
				    	<input type="file" name="file" id="file">	
                	</div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Create News</button>
                  </div>
                </div>
             	<div class="form-group">
             		<input type="hidden" name="_token" value="{{ csrf_token() }}">
             	</div>   
              </fieldset>
            </form>
        </div>
    </div>
</div>

@endsection