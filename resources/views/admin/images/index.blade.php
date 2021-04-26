@extends('admin.layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12">

    @can('add_images')
    <div class="mb-2">
      <a href="{{ route('images.create') }}" class="btn btn-primary ml-auto">
        <i class="fa fa-plus"></i> Add New
      </a>
    </div>
    @endcan

    @include('admin.layouts.flash')

    <div class="shadow card ">

      <div class="card-header">
        <i class="fa fa-align-justify"></i> Images
      </div>

      <div class="card-body">
        <table class="table table-responsive-sm" id="state-table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($images as $image)
            <tr>
              <td><img src="{{ $image->link }}" alt="" class="img-fluid" width="100" height="100"></td>
              <td>{{ $image->name }}</td>
              <td>{{ $image->category->name }}</td>
              <td>
                @can('edit_images')
                <a href="{{ route('images.edit', $image->id) }}" class="text-warning mr-2">
                  <i class="fa fa-edit"></i> Edit
                </a>
                @endcan

                @can('delete_images')
                <delete-record id="{{ $image->id }}" url="/admin/images"></delete-record>
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