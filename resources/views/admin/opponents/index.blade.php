@extends('admin.layouts.master')

@section('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-baseline">
          <h4 class="card-title mr-auto">News</h4>
          
          <a href="{{ route('opponent-clubs.create') }}" class="btn btn-primary btn-fw mr-2">
            Add Opponent
          </a>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Opponents</li>
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
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Stadium</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($opponents as $index => $opp)
                      <tr>
                          <td>{{ $index+1 }}</td>
                          <td></td>
                          <td>{{ $opp->name }}</td>
                          <td>{{ $opp->stadium }}</td>
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
            {{ $opponents->appends($_GET)->links() }}
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