<x-admin-layout title="View Events">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Events</h4>

          {{-- Search Form --}}
          <form action="{{ route('admin.events') }}" method="GET" class="mb-3">
            <div class="input-group">
              <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search events...">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>

          {{-- Table --}}
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Venue</th>
                  <th>Event Date</th>
                  <th>Member Amount</th>
                  <th>Non-Member Amount</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse($events as $event)
          <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->venue }}</td>
            <td>{{ $event->event_date }}</td>
            <td>{{ $event->member_amount }}</td>
            <td>{{ $event->nonmember_amount }}</td>
            <td><a href="edit_event/{{ $event->id }}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="delete_event/{{ $event->id }}" method="post">@csrf <button type="submit"
              class="btn btn-danger">Delete</button> </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7">No Events Found</td>
          </tr>
        @endforelse
              </tbody>
            </table>
          </div>

          {{-- Pagination --}}
          <div class="mt-3">
            {{ $events->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>