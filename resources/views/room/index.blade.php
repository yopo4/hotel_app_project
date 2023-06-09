@extends('template.master')
@section('title', 'Room')
@section('head')
    <style>
        .text {
            display: block;
            width: 150px;
            height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('generate') }}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add automatically</h5>
                        <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa-solid fa-xmark" style="color: #000000;"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="number-room" class="form-label">Number of rooms</label>
                        <select id="number-room" name="number-room"
                            class="form-select @error('error') is-invalid @enderror">
                            <option value="5" @if (old('number-room') == 5) selected @endif>5</option>
                            <option value="10" @if (old('number-room') == 10) selected @endif>10</option>
                            <option value="20" @if (old('number-room') == 20) selected @endif>20</option>
                        </select>
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="number" class="form-control" name="capacity" value="1" min="1"
                            placeholder="Capacity">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="700" placeholder="Price">
                        @if (auth()->user()->role == 'Super')
                            <label for="hotel_id" class="form-label">Hotel</label>
                            {{-- <input type="number" class="form-control" name="hotel_id" placeholder="Hotel ID"> --}}
                            <select name="hotel" id="" class="form-control">
                                @forelse ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" @if (old('hotel') == $hotel->id) selected @endif>{{ $hotel->name }}</option>
                                @empty
                                    <option value="0" selected></option>
                                    <option value="0">No IDs</option>
                                @endforelse
                            </select>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2 mb-2">
                <div class="col-lg-12 mb-2">
                    <div class="d-grid gap-2 d-md-block">
                        <button id="add-button" type="button" class="btn btn-sm shadow-sm myBtn border rounded">
                            <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Add automatically
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="room-table" class="table table-sm table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Number</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Capacity</th>
                                            <th scope="col">Price / Day</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($rooms as $room)
                                            <tr>
                                                <td scope="col">{{ $room->number }}</td>
                                                <td scope="col">{{ $room->type }}</td>
                                                <td scope="col">{{ $room->capacity }}</td>
                                                <td scope="col">{{ $room->price }}</td>
                                                <td scope="col">{{ $room->room_status_id }}</td>
                                                <td scope="col">
                                                    <button class="btn btn-light btn-sm rounded shadow-sm border"
                                                        data-action="edit-room" data-room-id="{{ $room->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit room">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form class="btn btn-sm delete-room" method="POST"
                                                        id="delete-room-form-{{ $room->id }}"
                                                        action="{{ route('room.destroy', ['room' => $room->id]) }}">
                                                        <button type="submit"
                                                            class="btn btn-light btn-sm rounded shadow-sm border delete"
                                                            room-id="{{ $room->id }}" room-role="room" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete room">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    <a class="btn btn-light btn-sm rounded shadow-sm border"
                                                        href="/room/{{ $room->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Room detail">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h3>Room</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
