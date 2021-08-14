@extends('admin.layouts.app')

@section('content')
    {{-- Nav Bar  --}}
    @include('admin.layouts.navbar')
    <div class="container-fluid">
      <div class="row">
        {{-- Sidebar  --}}
        @include('admin.layouts.sidebar')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="" style="margin-bottom: 800px;">
            @yield('container')
          </div>
        </main>
      </div>
    </div>
@endsection