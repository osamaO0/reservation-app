@extends('layouts.admin')

@section('title', 'Edit Room')

@section('css')
<link href="{{asset('admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/components/custom-carousel.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row layout-top-spacing">
    <div id="custom_carousel" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Room Images</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area style-custom-1">
                <div class="container" style="max-width: 928px;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-5 p-0">
                            <div id="style1" class="carousel slide style-custom-1" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @php $mediaItems = $room->getMedia("images") @endphp
                                    @foreach($mediaItems as $index => $mediaItem)
                                        <li data-target="#style1" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($mediaItems as $index => $mediaItem)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img class="d-block w-100 slide-image" src="{{ $mediaItem->getUrl() }}" alt="Slide {{ $index + 1 }}">
                                            <div class="carousel-caption">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <form action="{{ route('rooms.deleteImage', [$room->id, $mediaItem->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#style1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#style1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Room Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{$room->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required value="{{$room->price}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="1" {{$room->type == 1 ? 'selected' : ''}}>Single</option>
                            <option value="2" {{$room->type == 2 ? 'selected' : ''}}>Double</option>
                            <option value="3" {{$room->type == 3 ? 'selected' : ''}}>Triple</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$room->status == 1 ? 'selected' : ''}}>Available</option>
                            <option value="2" {{$room->status == 2 ? 'selected' : ''}}>Pending</option>
                            <option value="3" {{$room->status == 3 ? 'selected' : ''}}>Booked</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="7" required>{{$room->description}}</textarea>
                </div>
                <div class="form-group">
                    <div id="fuMultipleFile" class="col-lg-12 layout-spacing px-0">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>New Images</h4>
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
<script src="{{asset('admin/assets/js/scrollspyNav.js')}}"></script>
<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection
