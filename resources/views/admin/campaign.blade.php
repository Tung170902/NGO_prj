@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<h1 class="page-header">
    CAMPAIGNS <small>page manage campaigns</small>
</h1>

<div class="d-flex justify-content-between align-items-center">
    <div>
        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalXl">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>

        <button onclick="window.location.href='/admin/campaign'" type="button" class="btn btn-sm btn-success me-1">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <form id="form-search" action="{{ route('admin.campaign') }}" method="GET">
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
                <th scope="col">Title</th>
                <th scope="col">Total donate</th>
                <th scope="col">Status</th>
                <th class="text-center" scope="col">Created at</th>
                <th scope="col">Author</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td style="min-width: 150px">
                    {{ strlen($post->title) >= 50 ? substr($post->title,0,50) . " ..." : $post->title }}
                </td>
                <th scope="row">{{$post->total_donate}}</th>
                <td style="width: 50px;" class="text-center">
                    @if($post->active)
                    <i class="fas fa-lg fa-fw me-2 fa-check-square" style="color: green;"></i>
                    @else
                    <i class="fas fa-lg fa-fw me-2 fa-window-close" style="color: orange"></i>
                    @endif
                </td>
                <td style="width: 100px;" class="text-center">
                    {{ date("d/m/Y", strtotime($post->created_at)) }}
                </td>
                <td>
                    {{ $post->user->name }}
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$post->id}}">
                        <i class="far fa-lg fa-fw fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$post->id}}">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


<div class="d-flex justify-content-end mt-5">
    {{$campaigns->links('pagination.default')}}
</div>

<!-- CREATE  -->

<div class="modal fade" id="modalXl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CREATE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.campaign.create') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Title</label>
                        <input name="title" required type="text" class="form-control" id="exampleFormControlInput1">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="total">Total</label>
                        <input name="total" required type="number" class="form-control" id="exampleFormControlInput2">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="content">Content</label>
                        <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <input name="thumbnail" type='file' onchange="readURL(this);" />
                        <img style="width: 100px;" id="thumbnail" src="https://place-hold.it/200" alt="your image" />
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
@foreach ($campaigns as $post)
<div class="modal fade" id="modal-edit-{{$post->id}}" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.campaign.edit',$post->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Title</label>
                        <input value="{{$post->title}}" name="title" required type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="form-group mb-3">
                        <input name="active" class="form-check-input me-2" type="checkbox" {{$post->active ? 'checked' : ''}} id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1">Active</label>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="total">Total</label>
                        <input value="{{$post->total}}" name="total" required type="number" class="form-control" id="exampleFormControlInput2">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description">
                        {{ $post->description }}
                        </textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="content">Content</label>
                        <textarea class="ckeditor form-control" name="wysiwyg-editor">
                        {!! $post->content !!}
                        </textarea>
                    </div>

                    <div class="form-group mb-3">
                        <input name="thumbnail" type='file' onchange="readURL(this);" />
                        <img style="width: 100px;" id="thumbnail" src="{{$post->thumbnail}}" alt="your image" />
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
@foreach ($campaigns as $post)
<div class="modal" id="modal-delete-{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.campaign.delete',$post->id) }}" method="post">
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbnail')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
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