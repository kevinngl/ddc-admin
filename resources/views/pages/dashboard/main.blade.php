<x-office-layout title="Dashboard">

    <div class="container bg-white "
        style="display:flex; gap:20px; align-items: center; justify-content: center; padding:200px">
        <div class="container">
            <a href="{{ route('donation.index') }}" class="btn btn-success"
                style="padding-left:50px; padding:20px 100px 20px 100px; font-weight:bold; font-size:30px;">Donasi
                Tunai</a>
        </div>
        <div class="container">
            <a href="{{ route('campaign.index') }}" class="btn btn-primary"
                style="padding-left:50px; padding:20px 100px 20px 100px; font-weight:bold; font-size:30px;">Program
                Donasi</a>
        </div>
        <div class="container">
            <a href="{{ route('category.list') }}" class="btn btn-warning"
                style="padding-left:50px; padding:20px 100px 20px 100px; font-weight:bold; font-size:30px;">Kategori
                Donasi</a>
        </div>
    </div>
</x-office-layout>
