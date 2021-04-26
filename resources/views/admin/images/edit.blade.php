@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Gallery
            </div>
            <form class="form-horizontal" action="{{ route('images.update',$image->id) }}" method="post">
                @method('patch') @csrf
                <div class="card-body">
                    @include('admin.layouts.flash')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Name</label>
                        <div class="col-md-4">
                            <input class="form-control" name="name" required autofocus autocomplete="off"
                                value="{{ $image->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="image">Image</label>
                        <div class="col-md-4 offset-md-3">
                            <edit-image-upload :file='{!! json_encode($image) !!}'></edit-image-upload>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="category_id">Category</label>
                        <div class="col-md-4">
                            <select class="form-control" autofocus required name="category_id">
                                <option value="">Choose Category...</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $image->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="description">Description</label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="5" name="description" autofocus
                                autocomplete="off">{{ $image->description }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section(' script') {{-- {!! JsValidator::formRequest('App\Http\Requests\imageRequest'); !!} --}} @endsection