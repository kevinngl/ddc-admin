<div class="modal-header pb-0 border-0 justify-content-end">
    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                    fill="#000000">
                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                    <rect fill="#000000" opacity="0.5"
                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                        x="0" y="7" width="16" height="2" rx="1" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
</div>
<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
    <form id="form_create_donation" enctype="multipart/form-data">
        @csrf
        <div class="mb-13 text-center">
            <h1 class="mb-3">Tambah Kampanye</h1>
        </div>

        <div class="fv-row mb-7">
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Pilih Kategori Donasi</label>
            <select class="form-control selectpicker " name="campaignCategoryId" required>
                <option selected disabled>Pilih Kategori</option>
                @foreach ($category as $item)
                    <option value="{{ $item['id'] }}">
                        {{ $item['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="title" class="required fw-bold fs-6 mb-2">Judul Program</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="title" name="title" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan judul program" />
            <!--end::Input-->
        </div>

        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="description" class="required fw-bold fs-6 mb-2">Deskripsi</label>
            <!--d::Label-->
            <!--begin::Input-->
            <textarea name="description" id="description" cols="30" rows="5"
                class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
            <!--end::Input-->
        </div>

        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="donationTarget" class="required fw-bold fs-6 mb-2">Target Dana (Rp)</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="tel" id="donationTarget" name="donationTarget"
                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukan target nominal" />
            <!--end::Input-->
        </div>

        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="duration" class="required fw-bold fs-6 mb-2">Batas Waktu</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input id="kt_daterangepicker_2" name="duration" class="form-control form-control-solid"
                placeholder="Masukan batas waktu" />

            <!--end::Input-->
        </div>

        <div class="fv-row mb-7">
            <label for="#" class="required fw-bold fs-6 mb-2">Gambar</label>
            <br>
            <!--begin::Label-->
            <!--end::Label-->
            <!--begin::Input-->
            <input type="file" class="form-control" name="image" placeholder="Upload gambar"
                aria-label="Upload gambar" class="form-control form-control-solid mb-3 mb-lg-0">
            <!--end::Input-->
        </div>

        @if (session('user')->user->role->name === 'admin')
            <div class="text-center pt-15">
                <div id="kt_modal_update_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">
                    Discard
                </div>
                <button id="tombol_kirim_donation"
                    onclick="upload_form_modal('#tombol_kirim_donation','#form_create_donation','{{ route('campaign.store') }}','#ModalCreatedonation','POST');"
                    class="btn btn-primary">
                    Submit
                </button>
            </div>
        @endif
    </form>
</div>


<script>
    ribuan('donationTarget');
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
