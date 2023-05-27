<div class="modal fade" id="ModalDonation" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="form_donation" enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Catat donasi untuk {{ $data['title'] }}</h2>
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
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="amount" class="required fw-bold fs-6 mb-2">Jumlah Dana (Rp)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" id="amount" name="amount"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukan nominal"
                                    value="" />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="comment" class="required fw-bold fs-6 mb-2">Catatan</label>
                                <!--d::Label-->
                                <!--begin::Input-->
                                <textarea name="comment" id="comment" cols="30" rows="5"
                                    class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
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
                    <div id="kt_modal_revise_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">
                        Discard
                    </div>
                    <button id="tombol_donation"
                        onclick="save_form_modal('#tombol_donation','#form_donation','{{ route('donation.store', $data['id']) }}','#ModalDonation','POST');"
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
