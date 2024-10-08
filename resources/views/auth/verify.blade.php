@extends("layouts.app")

@section("content")
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            {{ __("passwords.verify_email_address") }}
          </div>

          <div class="card-body">
            @if (session("resent"))
              <div class="alert alert-success" role="alert">
                {{ __("passwords.email_verification") }}
              </div>
            @endif

            {{ __("passwords.email_verification_warning") }}
            {{ __("passwords.not_receive_email") }},
            <form
              class="d-inline"
              method="POST"
              action="{{ route("verification.resend") }}"
            >
              @csrf
              <button type="submit" class="btn btn-link m-0 p-0 align-baseline">
                {{ __("passwords.request_another") }}
              </button>
              .
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
