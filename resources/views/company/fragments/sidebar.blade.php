<div class="container card">
    {{-- <div class=" head-title mt-3 mb-4">
        <img src="{{ $logo_img }}" alt="Transfers" width="150"/>
    </div> --}}
        <a href="{{ route("company.dashboard") }}">
            <div class="card  p-3 m-3" >
                <div class="msg_area">
                    Passenger Verification
                </div>
            </div>
        </a>
        <a href="{{ route("company.terminals.index") }}">
            <div class="card  p-3 m-3" {{ $activePage ?? '' == "terminals" ? 'selected_reg' : '' }}>
                <div class="msg_area">
                    Terminals
                </div>
            </div>
        </a>
        <a href="{{ route("company.vehicles.index") }}">
            <div class="card  p-3 m-3" {{ $activePage ?? '' == "vehicles" ? 'selected_reg' : '' }}>
                <div class="msg_area">
                    Vehicles
                </div>
            </div>
        </a>
        <a href="">
            <div class="card  p-3 m-3" >
                <div class="msg_area">
                    Travel History
                </div>
            </div>
        </a>
        <a href="">
            <div class="card  p-3 m-3" >
                <div class="msg_area">
                    Travel Stats
                </div>
            </div>
        </a>
        <a href="">
            <div class="card  p-3 m-3" >
                <div class="msg_area">
                    Inbox
                </div>
            </div>
        </a>
        
        <div class="card p-3 m-3" >
            <div class="msg_area">
                Profile
            </div>
        </div>
</div>