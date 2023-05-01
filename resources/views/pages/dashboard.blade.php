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
            <button class="add-contact">
                + New contact
            </button>
        </aside>
        <section>
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
                    <tr>
                        <td>A Dammy</td>
                        <td>kemi@yahoo.com</td>
                        <td>09049423109</td>
                        <td>No.10 Bubu Street</td>
                        <td><i class="fa fa-eye"></i><i class="fa fa-edit"></i><i class="fa fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td>A Dammy</td>
                        <td>kemi@yahoo.com</td>
                        <td>09049423109</td>
                        <td>No.10 Bubu Street</td>
                        <td><i class="fa fa-eye"></i><i class="fa fa-edit"></i><i class="fa fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td>A Dammy</td>
                        <td>kemi@yahoo.com</td>
                        <td>09049423109</td>
                        <td>No.10 Bubu Street</td>
                        <td><i class="fa fa-eye"></i><i class="fa fa-edit"></i><i class="fa fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td>A Dammy</td>
                        <td>kemi@yahoo.com</td>
                        <td>09049423109</td>
                        <td>No.10 Bubu Street</td>
                        <td><i class="fa fa-eye"></i><i class="fa fa-edit"></i><i class="fa fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td>A Dammy</td>
                        <td>kemi@yahoo.com</td>
                        <td>09049423109</td>
                        <td>No.10 Bubu Street</td>
                        <td><i class="fa fa-eye"></i><i class="fa fa-edit"></i><i class="fa fa-trash"></i></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
