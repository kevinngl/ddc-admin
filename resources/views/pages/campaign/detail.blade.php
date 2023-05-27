<x-office-layout title="Campaign">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            @include('pages.campaign.sidebar')
            <!--end::Sidebar-->
            <!--begin::Content-->
            @include('pages.campaign.donationList')
            <!--end::Content-->
        </div>
        @include('pages.campaign.modalUpdateCampaign')
        @include('pages.campaign.modalReviseCampaign')
        @include('pages.campaign.modalDonation')
    </div>
    <!--end::Container-->
</x-office-layout>
<script>
    ribuan('donationTarget');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    ribuan('amount');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    $("#kt_daterangepicker_2").flatpickr({
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
    });
</script>
