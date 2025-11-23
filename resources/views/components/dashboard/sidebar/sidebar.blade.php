<div class="w-[20rem] p-5 sticky top-0">
    <div class="bg-white rounded-2xl p-5">
        <div class="flex justify-center">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="" class="h-15">
        </div>
        <ul class="mt-8 space-y-3">
            <li>
               <a href="{{ route('dashboard.overview') }}" class="flex item-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/overview') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/overview.svg') }}" alt="Overview">
                    <span>Overview</span>
                </a> 
            </li>
            <li>
               <a href="{{ route('dashboard.facility') }}" class="flex item-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/facility') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/facility.svg') }}" alt="Facility">
                    <span>Fasilitas</span>
                </a> 
            </li>
            <li>
               <a href="{{ route('dashboard.calendar') }}" class="flex item-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/calendar') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/calendar.svg') }}" alt="Calendar">
                    <span>Kalender</span>
                </a> 
            </li>
            <li>
               <a href="{{ route('dashboard.promotion-code') }}" class="flex item-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/promotion-code') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/coupon.svg') }}" alt="Coupon">
                    <span>Kode Promo</span>
                </a> 
            </li>
            <li>
               <div class="flex item-center gap-3 w-full border rounded-xl px-4 py-4">
                    <img src="{{ asset('assets/icon/profile.svg') }}" alt="Profile">
                    <span>Logout</span>
                </div> 
            </li>
        </ul>
    </div>
    <div class="bg-white rounded-2xl p-5 mt-5">
        <div class="bg-[#E54F4F] rounded-xl py-3 text-center">
            <span class="text-white text-2xl">PENTING!</span>
        </div>
        <div class="mt-2">
            <p>Data pada dashboard dilarang disebarluaskan, kecuali untuk kebutuhan laporan internal</p>
        </div>
    </div>
</div>