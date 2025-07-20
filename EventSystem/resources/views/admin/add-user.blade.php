<x-admin-layout title="Add User">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Add New User</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Details</h4>
          <form class="forms-sample" action="{{route("storeUser")}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old("name") }}"
                id="name" name="name" placeholder="Enter User Name" required>
              @error('name')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="email">User Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old("email") }}"
                id="email" name="email" placeholder="Enter User Email" required>
              @error('email')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror"
                value="{{ old("password") }}" id="password" name="password" placeholder="Enter User password" required>
              @error('password')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror"
                value="{{ old("password_confirmation") }}" id="password_confirmation" name="password_confirmation"
                placeholder="Enter User password" required>
              @error('password_confirmation')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>

</x-admin-layout>