@extends('admin.layouts.master')

@section('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-baseline">
          <h4 class="card-title mr-auto">News</h4>
          
          <a href="{{ route('chelsea-teams.create') }}" class="btn btn-primary btn-fw mr-2">
            Add New Team
          </a>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Teams</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Nationality</th>
                    <th>DOB</th>
                    <th>Birthplace</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $index => $team)
                        <tr>
                            <td>{{ $index+1}}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position->name }}</td>
                            <td>{{ $team->nation->name }}</td>
                            <td>{{ $team->date_of_birth }}</td>
                            <td>{{ $team->birthplace }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.col -->

          <!-- pagination -->
          <nav class="col-12 d-flex justify-content-end mt-4">
            {{ $teams->appends($_GET)->links() }}
          </nav>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
@endsection