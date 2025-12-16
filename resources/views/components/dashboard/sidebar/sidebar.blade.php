<div class="w-[20rem] pt-5 pl-5 pb-5 sticky top-0">
    <div class="bg-white rounded-2xl p-5">
        <div class="flex justify-center">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="" class="h-15">
        </div>
        <ul class="mt-8 space-y-3">
            <li>
                <a href="{{ route('dashboard.overview') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/overview') ? 'bg-[#AEEF8B] hover:bg-[#AEEF8B]/70' : 'hover:bg-gray-100' }}">
                    <img src="{{ asset('assets/icon/overview.svg') }}" alt="Overview">
                    <span>Overview</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.facility') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/facility') ? 'bg-[#AEEF8B] hover:bg-[#AEEF8B]/70' : 'hover:bg-gray-100' }}">
                    <img src="{{ asset('assets/icon/facility.svg') }}" alt="Facility">
                    <span>Fasilitas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.calendar') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/calendar') || Request::is('dashboard/calendar-mini-soccer') ? 'bg-[#AEEF8B] hover:bg-[#AEEF8B]/70' : 'hover:bg-gray-100' }}">
                    <img src="{{ asset('assets/icon/calendar.svg') }}" alt="Calendar">
                    <span>Kalender</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.gallery') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/gallery') ? 'bg-[#AEEF8B] hover:bg-[#AEEF8B]/70' : 'hover:bg-gray-100' }}">
                    <img src="{{ asset('assets/icon/gallery.svg') }}" alt="Gallery">
                    <span>Update Galeri</span>
                </a>
            </li>
            <!-- <li>
                <a href="{{ route('dashboard.promotion') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/promotion') ? 'bg-[#AEEF8B] hover:bg-[#AEEF8B]/70' : 'hover:bg-gray-100' }}">
                    <img src="{{ asset('assets/icon/coupon.svg') }}" alt="Coupon">
                    <span>Kode Promo</span>
                </a>
            </li> -->
            <li>
                <button
                    type="button"
                    onclick="logout()"
                    class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 hover:bg-gray-100 w-full text-left">
                    <img src="{{ asset('assets/icon/profile.svg') }}" alt="Profile">
                    <span>Logout</span>
                </button>
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

@push('scripts')
<script>
    function logout() {
        // hapus status login
        localStorage.removeItem("isLoggedIn");
        localStorage.removeItem("username");

        // redirect ke login
        window.location.href = "{{ route('login') }}";
    }
</script>
@endpush