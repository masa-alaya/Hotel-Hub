
    <h1>Book Room {{ $room->title }}</h1>
    <hr>
    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <div class="form-group">
            <label for="booking_start_time">Booking Start Time</label>
            <input type="datetime-local" class="form-control" id="booking_start_time" name="booking_start_time" required>
        </div>
        <div class="form-group">
            <label for="booking_end_time">Booking End Time</label>
            <input type="datetime-local" class="form-control" id="booking_end_time" name="booking_end_time" required>
        </div>
        <div class="form-group">
            <label for="description">Booking Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>

