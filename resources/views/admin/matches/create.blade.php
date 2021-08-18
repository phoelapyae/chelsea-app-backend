@extends('admin.layouts.master')

@section('custom-css')
<style>
   
</style>

@endsection

@section('container')
<div class="d-flex align-items-center justify-content-between">
    <h4 class="card-title">Add Match</h4>

    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('matches.index') }}">Matches</a>
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

                <form action="{{ route('matches.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <!-- Opponents -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Opponent (required)')
                        @slot('name', 'opponent_id')
                        @slot('objects', $opponents)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <!-- Competitions -->
                        @component('components.selectbox-with-object')
                        @slot('title', 'Choose Competition (required)')
                        @slot('name', 'competition_id')
                        @slot('objects', $competitions)
                        @slot('objectName', 'name')
                        @slot('selected', '')
                        @endcomponent

                        <div class="form-group">
                            <label for="">Place</label></label>
                            <select name="place" id="" class="form-control">
                                <option value="HOME">Home</option>
                                <option value="AWAY">Away</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Playing time</label>
                            <input type="text" name="play_datetime" placeholder="yyyy-mm-dd" autocomplete="off" class="form-control" id="datetimepicker" class="date">
                        </div>

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
// Datetimepicker
    $( "#datetimepicker" ).datetimepicker({
      dateFormat: 'yy-mm-dd',
      timeFormat: 'HH:mm:ss'                   
    }); 

</script>
@endsection