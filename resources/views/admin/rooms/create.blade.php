@extends('layouts.admin')

@section('title', 'Create Room')

@section('css')
<link href="{{asset('admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Room Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="1">Single</option>
                        <option value="2">Double</option>
                        <option value="3">Triple</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="7" required></textarea>
                </div>
                <div class="form-group">
                    <div id="fuMultipleFile" class="col-lg-12 layout-spacing px-0">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Images</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple name="images[]">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>

@endsection

@section('js')
<script src="{{asset('admin/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection
