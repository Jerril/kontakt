@if(!auth()->user())
    {{redirect('/login')}}
@endif

@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <div class="sidebar">
            <div>
                <a href="/" class="logo">kòntakts</a>

                <button class="add-contact" data-toggle="modal" data-target="#addContactModal">
                    + Add contact
                </button>

                <div class="groups">
                    <p>Groups <span title="Create group" data-toggle="modal" data-target="#addGroupModal">+</span></p>

                    @if(!$groups->isEmpty())
                    <ul>
                        @foreach ($groups as $index => $group)
                        <li><a title="Delete group" href="{{route('group.delete', ['group' => $group->id])}}"><i class="fa fa-trash-alt"></i></a> &nbsp; {{$group->name}}</li>
                        @endforeach
                    </ul>
                    @else
                        <p style="font-size:14px; font-weight:500" class="bg-yellow-100 rounded text-black text-center my-3 py-1">No groups created yet</p>
                    @endif
                </div>
            </div>

            <div>
            </div>

            <div>
                <p class="profile"><span></span>Hello! {{auth()->user()->name}}</p>
                <a href="{{route('logout')}}" class="logout"><i class="fas fa-arrow-right"></i> Logout</a>
            </div>
        </div>

        <div class="main">
            <div class="heading">
                <div class="search">
                    <form method="GET" action="{{route('dashboard')}}" class="search-bar">
                        <input type="text" class="rounded-s" name="s" placeholder="Type here..."/>
                        <div class="btns">
                            <input class="submit rounded-e" type="submit" value="Search" />
                            {{-- <a class="reset" href="{{route('dashboard')}}">Reset</a> --}}
                        </div>

                    </form>
                </div>
                <div class="export" title='Export'>
                    <i class="fas fa-print"></i>
                </div>
            </div>
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
                @if(!$contacts->isEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Group</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="contact-name">
                                    <div class="img">
                                    @if($contact->avatar)
                                        <img src="{{asset('storage/'.$contact->avatar) ?? ''}}" alt="">
                                    @endif
                                    </div>
                                    <p>{{$contact->name ?? ''}}</p>
                                </td>
                                <td>{{$contact->email ?? ''}}</td>
                                <td>{{$contact->phone_number ?? '---'}}</td>
                                <td>{{$contact->address ?? '---'}}</td>
                                <td>
                                    @if($contact->group)
                                    <span style="font-size:11px; font-weight:700" class="bg-green-500 text-white px-2 py-1 rounded">{{$contact->group->name}}</span>
                                    @else
                                    ---
                                    @endif
                                </td>
                                <td><i class="fa fa-edit" data-toggle="modal" data-target="#editContactModal{{$contact->id}}"></i><a href="{{route('contact.delete', ['contact' => $contact->id])}}"><i class="fa fa-trash-alt"></i></a></td>
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
                                                <label for="group" class="col-form-label">Select group</label>
                                                <select name="group_id" id="group">
                                                    <option value="">pick one...</option>
                                                    @if(!$groups->isEmpty())
                                                        @foreach ($groups as $group)
                                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
                    </tbody>
                </table>
                @else
                    <div role="alert" class="w-1/2 bg-yellow-100 text-center text-black rounded px-4 py-2 mt-4 mx-auto">
                        <p style="font-weight:500" class="text-center">No contacts created yet</p>
                    </div>
                @endif
            </section>
        </div>
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
            <form method="POST" action="{{route('contact.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
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
                        <label for="avatar" class="col-form-label">Upload Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-form-label">Select group</label>
                        <select name="group_id" id="group">
                            <option value="">pick one...</option>
                            @if(!$groups->isEmpty())
                                @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary btn-primary">Add Contact</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    {{-- Add group modal --}}
    <div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center" id="addGroupModalLabel">Create Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="{{route('group.post')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="group-name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="group-name" required>
                    </div>
                    <div class="form-group">
                        <label for="group-description" class="col-form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="group-description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary btn-primary">Add Group</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
