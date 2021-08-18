@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add Opponent</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('opponent-clubs.index') }}">Opponents</a>
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

                <form action="{{ route('opponent-clubs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>

                        <!-- Image -->
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }} mb-4">
                            <label for="">Upload Image*</label>
                            <input type="file" id="image" name="image" required class="form-control">
                        </div>

                        <!-- Name -->
                        @component('components.textbox')
                        @slot('title', 'Name')
                        @slot('option', '(required)')
                        @slot('name', 'name')
                        @slot('placeholder', 'Enter name')
                        @slot('value', isset($opponents) ? $opponents->title : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
                        @endcomponent

                        <!-- Stadium -->
                        @component('components.textbox')
                        @slot('title', 'Stadium')
                        @slot('option', '(required)')
                        @slot('name', 'stadium')
                        @slot('placeholder', 'Enter stadium')
                        @slot('value', isset($opponents) ? $opponents->title : '')
                        @slot('autofocus', 'autofocus')
                        @slot('required', 'required')
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


</script>
@endsection