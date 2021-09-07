@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add New Ticket Category</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('ticket-categories.index') }}">Ticket Categories</a>
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

                <form action="{{ route('ticket-categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>

                        <!-- Choose Match -->
                        <div class="form-group {{ $errors->has('matches') ? 'has-error' : '' }}">
                            <label for="matches">Choose Football Matches*</label>
                            <select name="matches_id[]" id="" class="form-control" multiple>
                                @foreach ($matches as $match)
                                    <option value="{{$match->id}}">Chelsea vs {{$match->opponent->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date*</label>
                            <input type="date" name="date" placeholder="yyyy-mm-dd" autocomplete="off" class="form-control">
                        </div>

                        <!-- Ticket Status -->
                        @component('components.selectbox-with-array')
                        @slot('title', 'Ticket Status*')
                        @slot('name', 'status')
                        @slot('objects', $ticket_status)
                        @slot('objectName', 'name')
                        @slot('selected', '')
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