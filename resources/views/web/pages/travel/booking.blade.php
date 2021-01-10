@extends('web.layouts.app' , ['title' => "Home"])
@section('content')


    <section class="booking-section ptb-100 bg-light">
        <div class="container">



            <div class="row">
                <div class="col-lg-8">

                    <div class="row" id="seatList"></div>

                    <div class="booking-form">
                        <form>
                            <div class="content">
                                <h3>Personal Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="text" class="form-control" required
                                                placeholder="First Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="text" class="form-control" required
                                                placeholder="Last Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required
                                                placeholder="Date of Birth" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="text" class="form-control" required
                                                placeholder="Country" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" required
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" name="name" class="form-control" required
                                                placeholder="Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" required
                                                placeholder="Address" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h3>Payment Information</h3>
                                <div class="payment-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" href="#tab-credit-card"
                                                data-toggle="tab"> Via Credit Card</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab-paypal" data-toggle="tab">Via
                                                Paypal</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-credit-card" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="select-box">
                                                        <select class="form-control">
                                                            <option data-display='Card Type'>Card Type</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" name="text" class="form-control" required
                                                            placeholder="Card Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="text" class="form-control" required
                                                            placeholder="Card Holder Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="text" class="form-control" required
                                                            placeholder="CVC" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="select-box">
                                                        <select class="form-control">
                                                            <option data-display='Expiry Month'>Expiry Month</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="select-box">
                                                        <select class="form-control">
                                                            <option data-display='Expiry Date'>Expiry Date</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-paypal" class="tab-pane">
                                            <div class="paypal-text">
                                                <p>To make the payment process secure and complete you will be
                                                    redirected to Paypal Website .</p>
                                                <a href="#" class="btn btn-default btn-lightgrey">Checkout via
                                                    Paypal<span><i class="fa fa-angle-double-right"></i></span></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="row align-items-start mb-30">
                                        <div class="col-lg-12">
                                            <div class="checkbox">
                                                <input type="checkbox" id="agreement">
                                                <label for="agreement">I agreed Jaunt <a href="terms-of-service.html">Terms
                                                        of Services</a> and <a href="privacy-policy.html">Privacy
                                                        Policy</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-primary">
                                        Confirm Booking
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12">
                                <div class="item-single mb-30">
                                    <div class="image">
                                        <img src="{{ $web_source }}/img/destination7.jpg" alt="Demo Image">
                                    </div>
                                    <div class="content">
                                        <span class="location"><i class='bx bx-map'></i>95 Fleet St, London</span>
                                        <h3>
                                            <a href="destination-details.html">Venice The Dream Place</a>
                                        </h3>
                                        <div class="review">
                                            <i class='bx bx-smile'></i>
                                            <span>9</span>
                                            <span>Superb</span>
                                        </div>
                                        <p>
                                            Two short getaway breaks in the Greece together and one mini caravan
                                            holiday.
                                        </p>
                                        <hr>
                                        <ul class="list">
                                            <li><i class='bx bx-time'></i>7 Days</li>
                                            <li><i class='bx bx-group'></i>65+</li>
                                            <li>$2000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-content">
                            <h3 class="sub-title">Some Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-map-alt'></i>
                                        <h6><span>Country :</span> Oia, Greece</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-book-reader'></i>
                                        <h6><span>Language Spoken :</span> English</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-notepad'></i>
                                        <h6><span>Visa Requirments :</span> Yes</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-area'></i>
                                        <h6><span>Area (km2) :</span> 1770.80 km2</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-user'></i>
                                        <h6><span>Per Person :</span> $1200</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class='bx bx-group'></i>
                                        <h6><span>Guide :</span> Local Guide Available</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seat_width" value="{{ optional($vehicle->seatStyle)->width }}" required>
    <input type="hidden" id="seat_length" value="{{ optional($vehicle->seatStyle)->length }}" required>
    <input type="hidden" value="{{ optional($vehicle->seatStyle)->empty_seats }}" id="availableSeatsInput">
    <input type="hidden" value="{{ optional($vehicle->seatStyle)->empty_seats }}" id="blankSeatsInput">
    <input type="hidden" value="{{ optional($vehicle->seatStyle)->empty_seats }}" id="selectedSeatsInput">
    <input type="hidden" value="{{ optional($vehicle->seatStyle)->empty_seats }}" id="takenSeatsInput">

@stop


@section('script')
    <script>
        let globalSeats = [];
        let available_seats = [$("#availableSeatsInput").val()];
        let blank_seats = [$("#blankSeatsInput").val()];
        let selected_seats = [$("#selectedSeatsInput").val()];
        let taken_seats = [$("#takenSeatsInput").val()];
        let seatWidth = parseInt($("#seat_width").val());
        let seatLength = parseInt($("#seat_length").val());



        function markSeatAsEmpty(index) {
            selected_seats = [];
            $(".seat_item").each(function() {
                let seat = $(this);
                updateSeatHtml(seat);
            });
            $("#selectedSeatsInput").val(selected_seats);
        }

        $(document).ready(function() {
            generateSeats();
        });

        $("#seat_width, #seat_length").on("change", function() {
            generateSeats();
        });


        $(document).on("click", ".seat_item", function() {
            $(this).toggleClass("selected_seat");
            markSeatAsEmpty($(this).attr("id"));
        });

        function generateSeats() {
            let seats = [];
            let count = seatWidth * seatLength;
            for (let i = 0; i < count; i++) {
                seats.push(buildSIngleSeat(i));
            }
            globalSeats = seats;
            generateSeatsHtml();
        }

        function generateSeatsHtml() {
            let seatsList = $("#seatList");
            seatsList.empty()
            for (let i = 0; i < globalSeats.length; i++) {
                seatsList.append(
                    globalSeats[i]["html"]
                );
            }
        }

        function updateSeatHtml(seat) {
            let id = seat.attr("id");
            let available = seat.find(".available");
            let selected = seat.find(".selected");
            let taken = seat.find(".taken");
            let blank = seat.find(".blank");
            let buildSeat = buildSIngleSeat(id);

            if (!buildSeat["isDriver"]) {

                if (buildSeat["isAvailable"]) {

                    if (!buildSeat["isSelected"]) {
                        blank.addClass("d-none");
                        available.addClass("d-none");
                        taken.addClass("d-none");
                        selected.removeClass("d-none");
                        selected_seats.push(id);
                    } else {
                        blank.addClass("d-none");
                        selected.addClass("d-none");
                        taken.addClass("d-none");
                        available.removeClass("d-none");
                    }

                } else if (buildSeat["isBlank"]) {
                    selected.addClass("d-none");
                    available.addClass("d-none");
                    taken.addClass("d-none");
                    blank.removeClass("d-none");
                } else {
                    selected.addClass("d-none");
                    available.addClass("d-none");
                    blank.addClass("d-none");
                    taken.removeClass("d-none");
                }
            }
        }

        function buildSIngleSeat(index) {
            let isDriver = false;
            if (index == 0) {
                isDriver = true;
            }

            let isBlank = inArray(index, blank_seats);
            let isAvailable = inArray(index, available_seats);
            let isSelected = inArray(index, selected_seats);
            let isTaken = inArray(index, taken_seats);

            let body = {
                "id": index,
                "label": isDriver ? "Driver`s Seat" : "Seat No. " + index,
                "isDriver": isDriver,
                "isSelected": isSelected,
                "isAvailable": isAvailable,
                "isTaken": isTaken,
                "isBlank": isBlank,
            };
            available = body["isAvailable"] ? 'available_seat' : '';
            body["html"] = '<div class="seat_item ' + available + '" id="' + body["id"] + '" style="width: ' + (100 /
                    seatWidth) +
                '%">' +
                '<div class="card m-1 pl-3 pt-2 pb-2  mb-3">' +
                '<i class="fa fa-user"></i>' +
                '<span class="available">' + body["label"] + '</span>' +
                '<span class="selected d-none">Selected</span>' +
                '<span class="taken d-none">Taken</span>' +
                '<span class="blank d-none"></span>' +
                '</div>' +
                '</div>';
            return body;
        }

        function inArray(value = '', array = []) {
            for (let i = 0; i < array.length; i++) {
                if (array[i] == value) {
                    return true;
                }
            }
            return false;
        }

    </script>
@endsection
