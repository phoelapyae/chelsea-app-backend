@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add Team</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('chelsea-teams.index') }}">Teams</a>
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

                <form action="{{ route('chelsea-teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <!-- Image -->
                        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }} mb-4">
                            <label for="">Upload Image*</label>
                            <input type="file" name="avatar" required class="form-control">
                        </div>

                        <!-- Full Name -->
                        @component('components.textbox')
                        @slot('title', 'Full Name*')
                        @slot('option', '(required)')
                        @slot('name', 'name')
                        @slot('placeholder', 'Enter Full Name')
                        @slot('value', isset($team) ? $team->name : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Number -->
                        @component('components.textbox')
                        @slot('title', 'Number*')
                        @slot('option', '(required)')
                        @slot('name', 'number')
                        @slot('placeholder', 'Enter Number')
                        @slot('value', isset($team) ? $team->number : '')
                        @slot('autofocus', 'autofocus')
                        @slot('type', 'number')
                        @endcomponent

                        <!-- Height -->
                        @component('components.textbox')
                        @slot('title', 'Height')
                        @slot('option', '')
                        @slot('name', 'height')
                        @slot('placeholder', 'Enter Height')
                        @slot('value', isset($team) ? $team->height : '')
                        @slot('autofocus', 'autofocus')
                        @endcomponent

                        <!-- Weight -->
                        @component('components.textbox')
                        @slot('title', 'Weight')
                        @slot('option', '')
                        @slot('name', 'weight')
                        @slot('placeholder', 'Enter Weight')
                        @slot('value', isset($team) ? $team->weight : '')
                        @slot('autofocus', 'autofocus')
                        @endcomponent

                        <!-- Birthplace -->
                        @component('components.textbox')
                        @slot('title', 'Birthplace*')
                        @slot('option', '')
                        @slot('name', 'birthplace')
                        @slot('placeholder', 'Enter Birthplace')
                        @slot('value', isset($team) ? $team->birthplace : '')
                        @slot('autofocus', 'autofocus')
                        @endcomponent

                        <div class="form-group">
                            <label>Date of birth</label>
                            <input type="date" name="date_of_birth" class="form-control">
                        </div>

                        <!-- Nation -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Nation*')
                        @slot('name', 'nation_id')
                        @slot('objects', $nations)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <!-- Positions -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Position*')
                        @slot('name', 'position_id')
                        @slot('objects', $positions)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <!-- Team Types -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Team Type*')
                        @slot('name', 'team_type_id')
                        @slot('objects', $team_types)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <!-- Work Types -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Work Type*')
                        @slot('name', 'work_type_id')
                        @slot('objects', $work_types)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <!-- Biography -->
                        @component('components.textareabox')
                        @slot('title', 'Biography')
                        @slot('name', 'biography')
                        @slot('value', isset($team) ? $team->biography : '')
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
        var ckeditor = CKEDITOR.replace('biography',{
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