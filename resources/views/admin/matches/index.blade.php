@extends('admin.layouts.master')

@section('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-baseline">
          <h4 class="card-title mr-auto">Matches</h4>
          
          <a href="{{ route('matches.create') }}" class="btn btn-primary btn-fw mr-2">
            Add New Match
          </a>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Matches</li>
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
                    <th>Opponent Club</th>
                    <th>Stadium</th>
                    <th>Competition League</th>
                    <th>Place</th>
                    <th>Date and time</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($matches as $index => $match)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $match->opponent->name }}</td>
                          <td>{{ $match->opponent->stadium }}</td>
                          <td>{{ $match->competition->name }}</td>
                          <td>{{ $match->place === 'HOME' ? 'Home' : 'Away' }}</td>
                          <td>{{ $match->play_datetime }}</td>
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
          {{-- <nav class="col-12 d-flex justify-content-end mt-4">
            {{ $matches->appends($_GET)->links() }}
          </nav> --}}
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