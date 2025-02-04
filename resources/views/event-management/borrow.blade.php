@extends('layouts.app')

@section('title', 'Borrow Tools and Equipment')

@section('content')
    <div class="main-content">
        <!-- Search -->
        <div class="d-flex flex-wrap align-items-center mb-4">
            <div class="search w-100">
                <input placeholder="Search..." type="text" class="form-control">
            </div>
        </div>
        <hr style="border-top: 20px solid #006eff; margin: 15px 0;">

        <!-- Hero Section -->
        <div class="hero">
            <div>
                <h3>COMPED</h3>
                <p>Borrowing and Inventory</p>
                <button class="schedule-button btn btn-primary mt-3">View Borrowed and Returned</button>
            </div>
            <div>
                <img src="{{ asset('images/arduino.png') }}" alt="Hero Image">
            </div>
        </div>

        <!-- Borrow Tools Section -->
        <div class="previous-events">
            <h5>Borrow Tools</h5>
            <div class="d-flex flex-wrap">
                @foreach ([['arduinouno.png', 'Microcontrollers'], ['breadboard.png', 'Prototyping Tools'], ['ultrasonic.png', 'Sensors']] as $tool)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/' . $tool[0]) }}" class="borrow-card" alt="{{ $tool[1] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tool[1] }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the content.</p>
                            <a href="#" class="btn btn-primary">View Tools</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Borrowing Form Section -->
        <div class="box-container mt-5 row">
            <div class="col-md-6">
                <div class="borrowing-form-box p-3 border rounded">
                    <h5>Borrowing Form</h5>
                    <hr style="border-top: 20px solid #006eff; margin: 15px 0;">
                    <form method="POST" action="{{ route('borrow.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="borrowerName" class="form-label">Borrower Name</label>
                            <input type="text" class="form-control" name="borrower_name"
                                placeholder="Enter Borrower Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="schoolId" class="form-label">School ID</label>
                            <input type="text" class="form-control" name="school_id" placeholder="Enter School ID"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="dateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" required>
                        </div>
                        <div class="mb-3">
                            <label for="returnDate" class="form-label">Return Date</label>
                            <input type="date" class="form-control" name="return_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="borrowedItem" class="form-label">Borrowed Items</label>
                            <div id="items-container">
                                <div class="d-flex align-items-center mb-2">
                                    <select name="borrowed_item" class="form-control" required>
                                        <option value="Microcontroller">Microcontroller</option>
                                        <option value="Breadboard">Breadboard</option>
                                        <option value="Sensor">Sensor</option>
                                    </select>
                                    <input type="number" name="quantity" class="form-control mx-2" placeholder="Quantity"
                                        min="1" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Borrow</button>
                    </form>
                </div>
            </div>

            <!-- Item Collection Section -->
            <div class="col-md-6">
                <div class="item-collection-box p-3 border rounded">
                    <h5>Item Collection</h5>
                    <hr style="border-top: 20px solid #006eff; margin: 15px 0;">
                    <div class="d-flex flex-wrap">
                        @foreach ([['arduinouno.png', 'Microcontroller'], ['breadboard.png', 'Breadboard'], ['ultrasonic.png', 'Sensor']] as $item)
                            <div class="card" style="width: 10rem;">
                                <img src="{{ asset('images/' . $item[0]) }}" class="borrow-card" alt="{{ $item[1] }}">
                                <div class="card-body">
                                    <p class="card-text">{{ $item[1] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="box-container mt-5 p-4 border rounded">
            <h5>Borrowed and Returned Items</h5>

            <!-- Borrowed Items Table -->
            <div class="mb-4">
                <h6>Borrowed Items</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Borrower Name</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Date Issued</th>
                            <th>Borrowed Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                            @if ($borrow->status == 'Pending') <!-- Only show pending items -->
                                <tr>
                                    <td>{{ $borrow->borrower_name }}</td>
                                    <td>{{ $borrow->borrowed_item }}</td>
                                    <td>{{ $borrow->quantity }}</td>
                                    <td>{{ $borrow->date_issued }}</td>
                                    <td>{{ $borrow->return_date }}</td>
                                    <td>{{ $borrow->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr style="border-top: 20px solid #006eff; margin: 15px 0;">

            <!-- Returned Items Table -->
            <div class="mb-4">
                <h6>Returned Items</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Amount</th>
                            <th>Date Issued</th>
                            <th>Returned Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                            @if ($borrow->status == 'Returned') <!-- Only show returned items -->
                                <tr>
                                    <td>{{ $borrow->borrowed_item }}</td>
                                    <td>{{ $borrow->quantity }}</td>
                                    <td>{{ $borrow->date_issued }}</td>
                                    <td>{{ $borrow->return_date }}</td>
                                    <td>{{ $borrow->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

