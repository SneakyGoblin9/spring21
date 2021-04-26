@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">

        @can('add_categories')
        <div class="mb-2">
            <a onclick="createRecord()" href="javascript:;" class="btn btn-primary ml-auto">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
        @endcan

        @include('admin.layouts.flash')

        <div class="shadow card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Categories
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm" id="category-table">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            <td>
                                @can('edit_categories')
                                <a class="text-warning mr-2" onclick="editRecord({{ $category }})" href="javascript:;">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                @endcan

                                @can('delete_categories')
                                <delete-record id="{{ $category->id }}" url="/admin/categories"></delete-record>
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


@section('script')
<script>
    function createRecord() {
    const { value: name } = Swal.fire({
      title: 'Enter Category name',
      input: 'text',
      showCancelButton: true,
      inputValidator: (value) => {
        if (!value) {
          return 'category name is required!'
        }
        if (!value.match(/^[A-Za-z]+$/)) {
          return 'Please enter a valid name!'
        }
      }
    })
    .then((result) => {
        if (result.value) {
          console.log(result.value)
          console.log(name)
            axios.post("/admin/categories",{name: result.value})
                .then(function (response) {
                    Swal.fire({title: 'Success',text:`The record ${result.value} has been created.`, type: 'success', timer: 2000})
                    .then( () =>  { location.reload(); });
                })
                .catch(function (error) {
                    Swal.fire({ title: 'Opps...', text : error.response.data.message, type : 'error' ,timer: 2000})
                });
        }
    });
  }

  function editRecord(category) {
    const { value: name } = Swal.fire({
      title: 'Enter category name',
      input: 'text',
      inputValue: category.name,
      showCancelButton: true,
      inputValidator: (value) => {
        if (!value) {
          return 'You need to write something!'
        }
      }
    })
    .then((result) => {
        if (result.value) {
          var url = "/admin/categories/"+category.id
            axios.patch(url,{name: result.value})
                .then(function (response) {
                    Swal.fire({title: 'Success',text:`The record has been updated.`, type: 'success', timer: 2000})
                    .then( () =>  { location.reload(); });
                })
                .catch(function (error) {
                    Swal.fire({ title: 'Opps...', text : error.response.data.message, type : 'error' ,timer: 2000})
                });
        }
    });
  }
</script>

@endsection