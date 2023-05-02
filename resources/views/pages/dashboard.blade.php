@if(!auth()->user())
    {{redirect('/login')}}
@endif

@extends('layouts.app')

@section('content')
    <nav>
        <a href="/" class="logo">kòntakts</a>
        <form action="" class="search-bar">
            <input type="text" name="" placeholder="Search..." />
        </form>
        <div></div>
    </nav>
    <div class="dashboard">
        <aside>
            <button class="add-contact" data-toggle="modal" data-target="#addContactModal">
                + New contact
            </button>
            <p>Hello {{auth()->user()->name}}</p>
            <a href="{{route('logout')}}">Logout</a>
        </aside>
        <section>
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    <p>{{ Session::get('msg') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($contacts)
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{$contact->name ?? ''}}</td>
                            <td>{{$contact->email ?? ''}}</td>
                            <td>{{$contact->phone_number ?? ''}}</td>
                            <td>{{$contact->address ?? ''}}</td>
                            <td><i class="fa fa-edit" data-toggle="modal" data-target="#editContactModal{{$contact->id}}"></i><a href="{{route('contact.delete', ['contact' => $contact->id])}}"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        {{-- Edit Contact Modal --}}
                        <div class="modal fade" id="editContactModal{{$contact->id}}" tabindex="-1" aria-labelledby="editContactModalLabel{{$contact->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title text-center" id="editContactModalLabel{{$contact->id}}">Edit Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form method="POST" action="{{route('contact.put', ['contact' => $contact->id])}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="contact-name" class="col-form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="contact-name" value="{{$contact->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact-email" class="col-form-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="contact-email"  value="{{$contact->email}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact-phoneno" class="col-form-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" id="contact-phoneno" value="{{$contact->phone_number ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{$contact->address ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="group" class="col-form-label">Group</label>
                                            <input type="text" name="group" class="form-control" id="group" value="{{$contact->group ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn bg-primary btn-primary">Update Contact</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </div>

    {{-- Add contact modal --}}
    <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center" id="addContactModalLabel">Create Contact</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="{{route('contact.post')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group wrapper" title="Upload Avatar">
                        <div class="file-upload">
                            <input type="file" name="avatar" class="form-control" id="contact-avatar">
                            <i class="fa fa-arrow-up"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="contact-name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email" class="col-form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="contact-email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-phoneno" class="col-form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="contact-phoneno">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-form-label">Group</label>
                        <input type="text" name="group" class="form-control" id="group">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary btn-primary">Add Contact</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
