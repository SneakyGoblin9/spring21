@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">

        @include('admin.layouts.flash')

        <div class="shadow card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Contacts
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm" id="category-table">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->message }}</td>

                                <td>
                                    @can('delete_contacts')
                                    <delete-record id="{{ $contact->id }}" url="/admin/contact"></delete-record>
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
</div>

@endsection