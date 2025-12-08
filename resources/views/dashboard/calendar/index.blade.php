@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
@include('dashboard.calendar.reservasi')
@include('dashboard.calendar.mini-soccer')
@endsection

@section('script')
<script>
    // const tabID = "reservasi";
    // $(`#${tabID}`).hide();
    // $(`script[data-script="${tabID}"]`).attr("type", "hidden");
</script>
@endsection