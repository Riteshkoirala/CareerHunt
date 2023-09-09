@extends('dashboard.dashboard')
@section('content')
<div class="w-full mb-1 mt-1 bg-light" >

    <div class="container mt-1 w-full p-3 d-flex flex-wrap" >
        <div class="d-flex  mt-2 mb-3">
            <h3>Contact Messages</h3>
        </div>
        <div class="w-100 mb-3">
            <form action="{{ route('contact.index') }}" method="get">
                <div class="d-flex w-100">
                <div class="d-flex flex-wrap w-100">
                <label>
                    Search Contact:
                </label><input type="text" name="search" value="{{ request('search') }}" class="form-control"></div>
                    <div class="d-flex flex-wrap mx-3 w-100">
                        <label>Contact Status:</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" {{ request('status') == '0' ? 'selected' : '' }}>Read</option>
                            <option value="0" {{ request('status') == '1' ? 'selected' : '' }}>Unread</option>
                        </select>

                    </div>
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="w-100">
            <p>List of all contact messages sent.</p>
            <table class="table table-hover">
                <thead class="table-bordered">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Message</th>
                    <th scope="col">Mark as Read</th>

                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $key=>$contact)
                <tr>
                    <td>{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration}}</td>
                    <td>{{$contact->contact_fullname}}</td>
                    <td>{{ $contact->contact_email }}</td>
                    <td>{{ $contact->contact_numbers }}</td>
                    <td>{{ $contact->contact_message }}</td>
                    <td><div style="margin-top: -20px">@if($contact->is_read == 1)
                            <a href="{{ route('contact.up', $contact->id) }}" class="btn btn-danger" onclick="return confirm('Are you Sure u want to mark as read')">Unread</a>
                        @else
                            <a href="#" class="btn btn-primary">Read</a>
                        @endif</div></td>
                </tr>
                @endforeach
                </tbody>

            </table>
            <div class="d-flex justify-content-center">
                {!! $contacts->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
