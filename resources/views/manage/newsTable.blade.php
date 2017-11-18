@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-8">
            <div class="pull-right">
                <a href="{{ route('news.new') }}" class="btn btn-success">Create News</a>
            </div>
            <legend>Manage News</legend>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    @if (session('info'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{session('info')}}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Composer</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                  @if (count($news) > 0)
                    @foreach($news->all() as $newsInstance)
                        <tr>
                          <td>{{ $newsInstance->id }}</td>
                          <td>{{ $newsInstance->Title }}</td>
                          <td>{{ $newsInstance->Composer }}</td>
                          <td>{{ $newsInstance->updated_at->toFormattedDateString() }}</td>
                          <td>
                              <a href="{{ route('news.show', $newsInstance->id) }}" class="btn btn-info btn-xs">View</a> |
                              <a href="{{ route('news.edit', $newsInstance->id) }}" class="btn btn-warning btn-xs">Edit</a> |
                              <a href="{{ route('news.delete', $newsInstance->id) }}" class="btn btn-danger btn-xs">Delete</a>
                          </td>
                        </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>
      </div>
    </div>
</div>

@endsection
