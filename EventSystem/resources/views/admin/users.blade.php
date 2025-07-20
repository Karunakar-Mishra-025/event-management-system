<x-admin-layout title="View Users">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Users</h4>

          {{-- Search Form --}}
          <form action="{{ route('admin.users') }}" method="GET" class="mb-3">
            <div class="input-group">
              <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search users...">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>

          {{-- Table --}}
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td><a href="edit_user/{{ $user->id }}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="delete_user/{{ $user->id }}" method="post">@csrf <button type="submit"
              class="btn btn-danger">Delete</button> </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7">No Users Found</td>
          </tr>
        @endforelse
              </tbody>
            </table>
          </div>

          {{-- Pagination --}}
          <div class="mt-3">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>