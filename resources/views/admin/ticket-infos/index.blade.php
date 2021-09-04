@extends('admin.layouts.master')

@section('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-baseline">
          <h4 class="card-title mr-auto">News</h4>
          
          <a href="{{ route('chelsea-ticket-infos.create') }}" class="btn btn-primary btn-fw mr-2">
            Add Ticket Info
          </a>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Ticket Infos</li>
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
                    <th>Title</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ticketInfos as $index => $info)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $info->title }}</td>
                      <td>{{ $info->ticketType->name }}</td>
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
            {{ $ticketInfos->appends($_GET)->links() }}
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