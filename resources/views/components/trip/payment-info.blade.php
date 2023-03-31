<div class="booking-payment-area">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-tab-1" data-bs-toggle="pill" data-bs-target="#pills-1" type="button"
                role="tab" aria-controls="pills-1" aria-selected="true">
                <div class="payment-card-img">
                    <img src="{{ asset('assets/img/payment/mastercard.svg') }}" alt="">
                    <img src="{{ asset('assets/img/payment/visa.svg') }}" alt="">
                    <img src="{{ asset('assets/img/payment/american-express.svg') }}" alt="">
                    <img src="{{ asset('assets/img/payment/discover.svg') }}" alt="">
                </div>
                <span>Payment With Credit Card</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-tab-2" data-bs-toggle="pill" data-bs-target="#pills-2" type="button"
                role="tab" aria-controls="pills-2" aria-selected="false">
                <div class="booking-payment-img">
                    <img src="{{ asset('assets/img/payment/paypal-2.svg') }}" alt="">
                </div>
                <span>Payment With PayPal</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-tab-3" data-bs-toggle="pill" data-bs-target="#pills-3" type="button"
                role="tab" aria-controls="pills-3" aria-selected="false">
                <div class="booking-payment-img">
                    <img src="{{ asset('assets/img/payment/payoneer.svg') }}" alt="">
                </div>
                <span>Payment With Payoneer</span>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-tab-1"
            tabindex="0">
            <div class="booking-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Card Holder Name</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="Name On Card">
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Card Number</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="Your Card Number">
                                <i class="far fa-credit-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Expire Date</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="Expire">
                                <i class="far fa-calendar-days"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>CCV</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="CVV">
                                <i class="far fa-credit-card"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-tab-2" tabindex="0">
            <div class="booking-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="Email">
                                <i class="far fa-envelopes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="form-group-icon">
                                <input type="password" class="form-control" placeholder="Password">
                                <i class="far fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mt-2">
                            <button type="submit" class="theme-btn">Login Account<i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-tab-3" tabindex="0">
            <div class="booking-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="form-group-icon">
                                <input type="text" class="form-control" placeholder="Email">
                                <i class="far fa-envelopes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="form-group-icon">
                                <input type="password" class="form-control" placeholder="Password">
                                <i class="far fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mt-2">
                            <button type="submit" class="theme-btn">Login Account<i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
