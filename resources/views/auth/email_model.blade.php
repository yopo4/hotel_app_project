<form id="form-send-email" class="row g-3" method="get" action="{{ route('email.send') }}">
    @csrf
    <div class="col-md-12">
        <label for="type_id" class="form-label">Name</label>
        <input type="text" name="" id="" value="{{ auth()->user()->name }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="room_status_id" class="form-label">Your e-mail</label>
        <input type="text" name="" id="" value="{{ auth()->user()->email }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="message" class="form-label">Your message</label>
        <textarea class="form-control" id="message" @error('empty') is-invalid @enderror name="message" rows="3"></textarea>
        @if (\Session::has('empty'))
            <div id="error_message" class="text-danger error">
                {{ \Session::get('empty') }}
            </div>
        @endif
    </div>
    <input type="submit" class="btn btn-primary" value="Send">
</form>
