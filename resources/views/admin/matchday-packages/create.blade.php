@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add Ticket Info</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('match-day-packages.index') }}">Ticket Infos</a>
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
                            <label for="">Upload Cover Image*</label>
                            <input type="file" name="cover_image" required class="form-control">
                        </div>

                        <!-- Background Image -->
                        <div class="form-group {{ $errors->has('bg_image') ? 'has-error' : '' }} mb-4">
                            <label for="">Upload Background Image*</label>
                            <input type="file" name="bg_image" required class="form-control">
                        </div>

                        <!-- Information Types -->
                        {{-- @component('components.selectbox-with-object')
                        @slot('title', 'Choose Information Type*')
                        @slot('name', 'ticket_type_id')
                        @slot('objects', $ticketInfoTypes)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent --}}

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
                        @slot('title', 'description*')
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