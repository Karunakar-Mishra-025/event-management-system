<x-admin-layout title="Edit User">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Edit User</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Details</h4>
          <form class="forms-sample" action="{{route("updateUser")}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"
                id="name" name="name" placeholder="Enter User Name" required>
              @error('name')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="email">User Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}"
                id="email" name="email" placeholder="Enter User Email" required>
              @error('email')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="old_password">Old Password</label>
              <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password"
                name="old_password" placeholder="Enter old password">
              @error('old_password')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                name="new_password" placeholder="Enter New password">
              @error('new_password')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="new_password_confirmation">Confirm New Password</label>
              <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New password">
              @error('new_password_confirmation')
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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const fields = [
        document.getElementById("old_password"),
        document.getElementById("new_password"),
        document.getElementById("new_password_confirmation")
      ];

      function toggleRequired() {
        const anyFilled = fields.some(field => field.value.trim() !== "");

        fields.forEach(field => {
          if (anyFilled) {
            field.setAttribute("required", "required");
          } else {
            field.removeAttribute("required");
          }
        });
      }

      fields.forEach(field => {
        field.addEventListener("input", toggleRequired);
      });
    });
  </script>

</x-admin-layout>