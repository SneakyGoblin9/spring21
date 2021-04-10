@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Add New Post
            </div>
            <form class="form-horizontal" action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="card-body">
                    @include('admin.layouts.flash')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Title</label>
                        <div class="col-md-8">
                            <input class="form-control" name="title" value="{{ old('title') }}" required autofocus
                                autocomplete="off">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Body</label>
                        <div class="col-md-8">

                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection