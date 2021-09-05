@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add New Matchday Package</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('match-day-packages.index') }}">Matchday Packages</a>
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

                <form action="{{ route('match-day-packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <!-- Cover Image -->
                        <div class="form-group {{ $errors->has('cover_image') ? 'has-error' : '' }} mb-4">
                            <label for="cover_image">Upload Cover Image*</label>
                            <input type="file" name="cover_image" required class="form-control">
                        </div>

                        <!-- Background Image -->
                        <div class="form-group {{ $errors->has('bg_image') ? 'has-error' : '' }} mb-4">
                            <label for="bg_image">Upload Background Image*</label>
                            <input type="file" name="bg_image" required class="form-control">
                        </div>

                        <!-- Package Images -->
                        <div class="form-group {{ $errors->has('package_images') ? 'has-error' : '' }} mb-4">
                            <label for="package_images">Upload Package Images*</label>
                            <input type="file" name="package_images[]" required class="form-control" multiple>
                        </div>

                        <!-- Choose Match -->
                        <div class="form-group {{ $errors->has('matches') ? 'has-error' : '' }}">
                            <label for="matches">Choose Football Matches*</label>
                            <select name="matches_id[]" id="" class="form-control" multiple>
                                @foreach ($matches as $match)
                                    <option value="{{$match->id}}">Chelsea vs {{$match->opponent->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name -->
                        @component('components.textbox')
                        @slot('title', 'Name*')
                        @slot('option', '(required)')
                        @slot('name', 'name')
                        @slot('placeholder', 'Enter Name')
                        @slot('value', '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Price -->
                        @component('components.textbox')
                        @slot('title', 'Price(£)*')
                        @slot('option', '(required)')
                        @slot('name', 'price')
                        @slot('placeholder', 'Enter Price')
                        @slot('value', '')
                        @slot('type','number')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Limit Count -->
                        @component('components.textbox')
                        @slot('title', 'Limit Count*')
                        @slot('option', '(required)')
                        @slot('name', 'limit_count')
                        @slot('placeholder', 'Enter Limit Count')
                        @slot('value', '')
                        @slot('type','number')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Title -->
                        @component('components.textbox')
                        @slot('title', 'Title*')
                        @slot('option', '(required)')
                        @slot('name', 'title')
                        @slot('placeholder', 'Enter Title')
                        @slot('value', '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Short description -->
                        @component('components.textareabox')
                        @slot('title', 'Short Description*')
                        @slot('name', 'short_description')
                        @slot('value', '')
                        @endcomponent

                        <!-- description -->
                        @component('components.textareabox')
                        @slot('title', 'Description*')
                        @slot('name', 'description')
                        @slot('value', '')
                        @endcomponent

                        <input class="btn btn-primary" type="submit" value="Save">
                        <a class="btn btn-danger pull-right" href="">Cancel</a>
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

@section('custom-js')
<script>
$(function(){
    var ckeditor = CKEDITOR.replace('description',{
        toolbar : 'Page',
        height: 300,
        filebrowserUploadMethod : 'form',
        extraPlugins: 'embed,autoembed,image2',
        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
        filebrowserUploadUrl: "",
        on: {
            instanceReady: function() {
                this.document.appendStyleSheet('<?php echo asset('plugins/ckeditor/ckeditor.css?time()'); ?>');
            }
        }
    });
})
</script>
@endsection