@extends('layouts.app')

@section('title', 'Pay Now')

@section('content')
    <div class="main-content">
        <div class="d-flex flex-wrap align-items-center mb-4">
            <div class="search w-100">
                <input placeholder="Search..." type="text" class="form-control">
                <!--  <button type="submit" class="btn btn-primary mt-2">Go</button> -->
            </div>
        </div>
        <hr style="border-top: 20px solid #006eff; margin: 15px 0;">

        <!-- Finance Area -->
        <div class="container mt-4">
            <h3 class="mb-4">Finance</h3>
            <hr style="border-top: 20px solid #006eff; margin: 15px 0;">
            <div class="row">
                <!-- Finance Payment Box -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p><strong>Payment History:</strong></p>
                            <h5 class="card-title">To Pay:</h5>
                            <ol class="list-group list-group-numbered">
                                @foreach ($finances as $finance)
                                    @if ($finance->status == 'Pending')
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $finance->payment_name }}</div>
                                                {{ $finance->description ?? 'No description available' }}
                                            </div>
                                            <span class="badge text-bg-primary rounded-pill">₱
                                                {{ number_format($finance->amount, 2) }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                            <h5 class="card-title">Payment History:</h5>
                            <ol class="list-group list-group-numbered">
                                @foreach ($finances as $finance)
                                    @if ($finance->status == 'Pending-Approval' || $finance->status == 'Approved')
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $finance->payment_name }}</div>
                                                {{ $finance->description ?? 'No description available' }}
                                            </div>
                                            <span
                                                class="badge
                                            {{ $finance->status == 'Pending-Approval' ? 'text-bg-warning' : 'text-bg-success' }}
                                            rounded-pill">
                                                {{ $finance->status }}
                                            </span>
                                        </li>
                                    @endif
                                @endforeach

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Payment Gateway</h5>
                            <form id="paymentForm">
                                @csrf
                                <div class="row gx-3">
                                    <div class="col">
                                        <label for="paymentAmount" class="form-label">Amount</label>
                                        <input type="text" id="paymentAmount" class="form-control" placeholder="100"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="paymentPurpose" class="form-label">Purpose</label>
                                        <select class="form-select" id="paymentPurpose" aria-label="Default select example">
                                            <option selected>Select Purpose</option>
                                            @foreach ($finances as $finance)
                                                @if ($finance->status == 'Pending')
                                                    <option value="{{ $finance->id }}">{{ $finance->payment_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method</label>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/gcash.png') }}" alt="GCash Logo"
                                            style="width: 30px; height: 30px; margin-right: 10px;">
                                        <span>GCash or Pay through the Treasurer</span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-blue-round" data-bs-toggle="modal"
                                    data-bs-target="#miniTabModal" id="continueButton">Continue</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- First Modal (Payment Details) -->
                <div class="modal fade" id="miniTabModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content shadow-lg rounded-4 border-0">
                            <div class="modal-header bg-primary text-white rounded-top">
                                <img src="{{ asset('images/gcash.png') }}" alt="GCash Logo" class="modal-logo"
                                    style="width: 30px; margin-right: 10px;">
                                <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 bg-light">
                                <p><strong>Compesa:</strong> Himamat Event</p>
                                <p><strong>Amount:</strong> <span id="modalAmount"></span></p>
                                <p><strong>Purpose:</strong> <span id="modalPurpose"></span></p>
                                <p><strong>GCash Number:</strong></p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary rounded-start">+63</span>
                                    <input type="text" id="gcashNumber" class="form-control border-primary rounded-end"
                                        placeholder="Enter your GCash Number" required>
                                </div>
                            </div>
                            <div class="modal-footer rounded-bottom bg-primary text-white rounded-top">
                                <button type="button" class="btn btn-primary px-4 py-2 rounded-pill border-2 border-white"
                                    data-bs-target="#qrModal" data-bs-toggle="modal">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Modal (QR Code Confirmation) -->
                <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content shadow-lg rounded-4 border-0">
                            <div class="modal-header bg-primary text-white rounded-top">
                                <h5 class="modal-title" id="qrModalLabel">QR Code for Payment</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 bg-light">
                                <p>Please scan the QR code below to complete your payment.</p>
                                <img src="{{ asset('images/qr-code.png') }}" alt="QR Code" class="img-fluid"
                                    style="max-width: 100%; border-radius: 10px; display: block; margin-left: auto; margin-right: auto;">
                            </div>
                            <p style="text-align: center;">Note: If scan is successful, please click Confirm.</p>
                            <div class="modal-footer rounded-bottom bg-primary text-white rounded-top">
                                <button type="button"
                                    class="btn btn-primary px-4 py-2 rounded-pill border-2 border-white"
                                    id="confirmPayment">
                                    Finish Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
