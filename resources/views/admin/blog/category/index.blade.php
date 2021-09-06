@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<h1 class="page-header">
    BLOG CATEGORIES <small>page manage blog categories</small>
</h1>

<div class="d-flex justify-content-between align-items-center">
    <div>
        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalXl">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>

        <button onclick="window.location.href='/admin/blog/category'" type="button" class="btn btn-sm btn-success me-1">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <form id="form-search" action="{{ route('admin.blog.category') }}" method="GET">
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
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>
                    {{ $category->name }}
                </td>
                <td style="width: 50px;" class="text-center">
                    @if($category->active)
                    <i class="fas fa-lg fa-fw me-2 fa-check-square" style="color: green;"></i>
                    @else
                    <i class="fas fa-lg fa-fw me-2 fa-window-close" style="color: orange"></i>
                    @endif
                </td>
                <td style="width: 100px;" class="text-center">
                    {{ date("d/m/Y", strtotime($category->created_at)) }}
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$category->id}}">
                        <i class="far fa-lg fa-fw fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$category->id}}">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


<div class="d-flex justify-content-end mt-5">
    {{$categories->links('pagination.default')}}
</div>

<!-- CREATE  -->

<div class="modal fade" id="modalXl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CREATE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.blog.category.create') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input name="name" required type="text" class="form-control" id="exampleFormControlInput1" placeholder="[ name input ... ]">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
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


<!-- UPDATE  -->
@foreach ($categories as $category)
<div class="modal fade" id="modal-edit-{{$category->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.blog.category.edit',$category->id) }}" method="POST">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input name="name" required type="text" class="form-control" id="exampleFormControlInput1" placeholder="[ name input ... ]" value="{{$category->name}}">
                    </div>
                    <div class="form-group mb-3">
                        <input name="active" class="form-check-input me-2" type="checkbox" {{$category->active ? 'checked' : ''}} id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1">Active</label>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="ckeditor form-control" name="wysiwyg-editor">
                        {{$category->description}}
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
@foreach ($categories as $category)
<div class="modal" id="modal-delete-{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.blog.category.delete',$category->id) }}" method="post">
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
<script src="{{'/libs/ckeditor/ckeditor.js'}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection