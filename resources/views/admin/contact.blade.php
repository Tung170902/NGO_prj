@extends('layouts.admin')
@section('title', 'Contact')
@section('content')
<h1 class="page-header">
    Contacts <small>page manage contacts</small>
</h1>

<div class="d-flex justify-content-between align-items-center">
    <div>
        <button onclick="window.location.href='/admin/contact'" type="button" class="btn btn-sm btn-success me-1">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <form id="form-search" action="{{ route('admin.contact') }}" method="GET">
            <div class="input-group flex-nowrap">
                <input name="q" value="{{$q}}" type="text" class="form-control" placeholder="search ..." />
                <span onclick="search()" class="input-group-text" id="addon-wrapping">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </div>
        </form>
    </div>
</div>

<!-- LIST  -->

@if ($errors->any())
<div class="mt-4">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@if(session()->has('success'))
<div class="mt-4">
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
</div>
@endif

@if(session()->has('error'))
<div class="mt-4">
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
</div>
@endif

<div class="mt-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th class="text-center" scope="col">Created at</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>
                    {{ $contact->name }}
                </td>
                <td style="width: 50px;" class="text-center">
                    @if($contact->status)
                    <i class="fas fa-lg fa-fw me-2 fa-check-square" style="color: green;"></i>
                    @else
                    <i class="fas fa-lg fa-fw me-2 fa-window-close" style="color: orange"></i>
                    @endif
                </td>
                <td style="width: 100px;" class="text-center">
                    {{ date("d/m/Y", strtotime($contact->created_at)) }}
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$contact->id}}">
                        <i class="far fa-lg fa-fw fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$contact->id}}">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


<div class="d-flex justify-content-end mt-5">
    {{$contacts->links('pagination.default')}}
</div>

<!-- UPDATE  -->
@foreach ($contacts as $contact)
<div class="modal fade" id="modal-edit-{{$contact->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.contact.edit',$contact->id) }}" method="POST">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input name="name" required type="text" class="form-control" id="exampleFormControlInput1" value="{{$contact->name}}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Phone</label>
                        <input name="phone" required type="text" class="form-control" id="exampleFormControlInput1" value="{{$contact->phone}}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Address</label>
                        <input name="address" required type="text" class="form-control" id="exampleFormControlInput1"  value="{{$contact->address}}">
                    </div>
                    <div class="form-group mb-3">
                        <input name="status" class="form-check-input me-2" type="checkbox" {{$contact->status ? 'checked' : ''}} id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1">Viewed</label>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Content</label>
                        <textarea class="form-control" name="content">
                        {{$contact->content}}
                        </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- DELETE  -->
@foreach ($contacts as $contact)
<div class="modal" id="modal-delete-{{$contact->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.contact.delete',$contact->id) }}" method="post">
                <div class="modal-body">
                    @method('DELETE')
                    @csrf
                    <p> Do you want to delete ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
@section('script')

<script>
    function search() {
        const formSearchEle = document.querySelector('#form-search');
        formSearchEle.submit();
    }
</script>
@endsection