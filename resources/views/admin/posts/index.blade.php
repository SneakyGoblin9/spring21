@extends('admin.layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12">

    @can('add_posts')
    <div class="mb-2">
      <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary ml-auto">
        <i class="fa fa-plus"></i> Add New Post
      </a>
    </div>
    @endcan

    @include('admin.layouts.flash')

    <div class="shadow card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Users
      </div>
      <div class="card-body">
        <table class="table table-responsive-sm" id="state-table">

          <thead>
            <tr>
              <th>Title</th>
              <th>Published At</th>
            </tr>
          </thead>

          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $post->name }}</td>
              <td>{{ $post->created_at }}</td>

              <td>
                @can('edit_posts')
                <a href="{{ route('posts.edit', $post->id) }}" class="text-warning mr-2">
                  <i class="fa fa-edit"></i> Edit
                </a>
                @endcan

                @can('delete_post')
                <delete-record id="{{ $post->id }}" url="/admin/posts"></delete-record>
                @endcan
              </td>

            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

@endsection