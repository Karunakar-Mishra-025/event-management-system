<x-admin-layout title="Edit Event">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Edit Event</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Event Details</h4>
          <form class="forms-sample" action="{{route("admin.updateEvent")}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$event->id}}">
            <div class="form-group">
              <label for="Title">Event Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $event->title }}"
                id="title" name="title" placeholder="Enter Event Title" required>
              @error('title')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="description">Event Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" rows="4" placeholder="Enter Event Description"
                required>{{ $event->description }}</textarea>
              @error('description')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="venue">Event Venue</label>
              <input type="text" class="form-control @error('venue') is-invalid @enderror" value="{{ $event->venue }}"
                id="venue" name="venue" placeholder="Enter Event Venue" required>
              @error('venue')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="event_date">Event Date</label>
              <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                value="{{ $event->event_date }}" id="event_date" name="event_date"
                min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" required>
              @error('event_date')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="member_amount">Event Member Amount</label>
              <input type="number" class="form-control @error('member_amount') is-invalid @enderror"
                value="{{ $event->member_amount }}" id="member_amount" name="member_amount"
                placeholder="Enter Member Amount" required>
              @error('member_amount')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
            </div>
            <div class="form-group">
              <label for="nonmember_amount">Event Non-Member Amount</label>
              <input type="number" class="form-control @error('nonmember_amount') is-invalid @enderror"
                value="{{ $event->nonmember_amount }}" id="nonmember_amount" name="nonmember_amount"
                placeholder="Enter Member Non-Amount" required>
              @error('nonmember_amount')
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