@extends("layouts.app")
@section("content")
@if (session("success"))
    <x-alert :message="session('success')" />
@endif

@if (session("error"))
    <x-alert :message="session('error')" />
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"></div>
            </div>
        </div>
    </div>
  </div>
@endsection
