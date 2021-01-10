{{-- <div class="item-single mb-30">
    <div class="image">
        <img src="{{ $vehicle->getDefaultImage() }}" alt="Vehicle Image" title="Vehicle Image">
    </div>
    <div class="content">
        <div class="review">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <span>39 Review</span>
        </div>
        <div class="text-white">
            {{ $vehicle->route_from }} - {{ $vehicle->route_to }}
        </div>
        <div class="title">
            <h3>
                <a href="tours.html">{{ $vehicle->name }}</a>
            </h3>
            <span>$2000</span>
        </div>
        <ul class="list">
            <li>
                <button class="btn btn-primary brn-sm">Select</button>
            </li>
            <li><i class='bx bx-group'></i>60+</li>
            <li>{{ $vehicle->getPrice() }}</li>
        </ul>
    </div>
    <div class="discount">
        <span>Discount</span>
        <span>30%</span>
    </div>
</div> --}}

<div class="item-single mb-30">
    <div class="image">
        <img src="{{ $vehicle->getDefaultImage() }}" alt="Vehicle Image" title="Vehicle Image">
    </div>
    <div class="content">
        <span class="location">
            <i class='bx bx-map'></i>
            {{ $vehicle->route_from }} - {{ $vehicle->route_to }}
        </span>
        <h3>
            <a href="destination-details.html">{{ $vehicle->name }}</a>
        </h3>
        <div class="d-flex justify-content-between">
            <div class="company">
                {{ $vehicle->route_to }}
            </div>
            <div class="review">
                <span><i class='bx bx-group'></i>160+</span>
            </div>
        </div>
        <p>
            A wonderful little cottage right on the seashore - perfect for exploring.
        </p>
        <hr>
        <ul class="list">
            <li>
                <a href="{{ $vehicle->getBookingUrl() }}" class="btn btn-primary btn-sm">Select</a>
            </li>
            {{-- <li><i class='bx bx-group'></i>160+</li> --}}
            <li>{{ $vehicle->getPrice() }}</li>
        </ul>
        <div class="discount">
            <span>Rating</span>
            <span>4.5</span>
        </div>
    </div>
    <div class="spacer"></div>
</div>
