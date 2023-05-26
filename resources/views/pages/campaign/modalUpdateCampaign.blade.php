<div class="modal fade" id="ModalUpdateCampaign" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="form_update_campaign" enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Ubah Kampanye</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                {{-- KEVIN --}}
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
                        <!--begin::User form-->
                        <div id="kt_modal_update_customer_user_info" class="collapse show">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Ubah Gambar</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Allowed file types: png, jpg, jpeg."></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Image input wrapper-->
                                <div class="mt-1">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url({{ $data['image']['filePath'] ?? 'https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg' }})">
                                        <!--begin::Preview existing image-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ $data['image']['filePath'] ?? 'https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg' }})">
                                        </div>
                                        <!--end::Preview existing image-->
                                        <!--begin::Edit-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" placeholder="Ubah gambar"
                                                aria-label="Ubah gambar">
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel image">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->

                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Image input wrapper-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <label for="nama_users" class="required fw-bold fs-6 mb-2">Pilih Kategori
                                    Donasi</label>
                                <select class="form-control selectpicker " name="campaignCategoryId" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($category as $item)
                                        <option
                                            value="{{ $item['id'] }}"{{ $item['id'] == $data['campaignCategoryId'] ? 'selected' : '' }}>
                                            {{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="title" class="required fw-bold fs-6 mb-2">Judul Program</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Masukan judul program" value="{{ $data['title'] }}" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="duration" class="required fw-bold fs-6 mb-2">Batas Waktu</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="kt_daterangepicker_2" name="duration" class="form-control form-control-solid"
                                    placeholder="Masukan batas waktu"
                                    value="{{ $data['startDate'] . ' to ' . $data['endDate'] }}" />

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="donationTarget" class="required fw-bold fs-6 mb-2">Target Dana
                                    (Rp)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" id="donationTarget" name="donationTarget"
                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Masukan target nominal" value="{{ $data['donationTarget'] }}" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="description" class="required fw-bold fs-6 mb-2">Deskripsi</label>
                                <!--d::Label-->
                                <!--begin::Input-->
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-solid mb-3 mb-lg-0">{{ $data['description'] }}</textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::User form-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <div id="kt_modal_update_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">
                        Discard
                    </div>
                    <button id="tombol_update_campaign"
                        onclick="upload_form_modal('#tombol_update_campaign','#form_update_campaign','{{ route('campaign.update', $data['id']) }}','#ModalUpdateCampaign','PUT');"
                        class="btn btn-primary">
                        Submit
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
