@extends('admin.layouts.master')

@section('plugin-css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<style>
    /* cke_editable cke_editable_themed cke_contents_ltr cke_show_borders */
    
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add New Content</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.contents.index') }}">Contents</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<div class="row grid-margin">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                @include('includes.errors')

                <form method="POST" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>

                        <!-- Image -->
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }} mb-4">
                            <label for="">Upload Image*</label>
                            <img for="image" src="{{url('../img/no-image.png')}}" class="img-responsive uploadImage" style="width: 196px; height: 158px;"><br /><br>
                            <label for="">(LANDSCAPE image size only)</label>
                            <input style="" type="file" id="image" name="image" class="uploadImageFile" required>
                        </div>

                        <div class="form-group">
                            <label for="">Choose Category*</label>
                            <select id="categories" class="form-control js-parent-category-ajax" name="category_id[]" multiple>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Content Types*</label>
                            <select name="content_type_id" id="" class="form-control">
                                @foreach ($contentTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Featured</label>
                            <select name="is_featured" id="" class="form-control">
                                <option value="1">On</option>
                                <option value="0">Off</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Published Date</label>
                            <input type="text" name="published_date" id="datepicker" class="form-control" required autocomplete="off"></p>
                        </div>

                        <!-- Title -->
                        @component('components.textbox')
                        @slot('title', 'Title(English)')
                        @slot('option', '(required)')
                        @slot('name', 'title')
                        @slot('placeholder', 'Enter Title')
                        @slot('value', isset($content) ? $content->title : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Title English -->
                        @component('components.textbox')
                        @slot('title', 'Title(Myanmar)')
                        @slot('option', '(required)')
                        @slot('name', 'title_mm')
                        @slot('placeholder', 'Enter Title')
                        @slot('value', isset($content) ? $content->title_mm : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Short Description -->
                        @component('components.textbox')
                        @slot('title', 'Short Description')
                        @slot('option', '(required)')
                        @slot('name', 'short_description')
                        @slot('placeholder', 'Enter Short Description')
                        @slot('value', isset($content) ? $content->short_description : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- description -->
                        @component('components.textareabox')
                        @slot('title', 'Description(English) (Only max width 400px and max height 300px for image size)')
                        @slot('name', 'description')
                        @slot('value', isset($content) ? $content->description : '')
                        @endcomponent

                        <!-- description -->
                        @component('components.textareabox')
                        @slot('title', 'Description(Myanmar) (Only max width 400px and max height 300px for image size)')
                        @slot('name', 'description_mm')
                        @slot('value', isset($content) ? $content->description_mm : '')
                        @endcomponent

                        <input class="btn btn-primary" type="submit" value="Save">
                        <a class="btn btn-danger pull-right" href="{{route('admin.contents.index')}}">Cancel</a>
                    </fieldset>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('plugin-js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
@endsection

@section('custom-js')

@include('includes.select2-ajax-script', ['id' => '#categories', 'placeholder' => '__ Please Select Category __', 'url' => route('admin.categories.search'), 'multiple' => 'true'])

<script>


</script>
@endsection