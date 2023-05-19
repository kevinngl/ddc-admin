    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_category">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">Nama Kategori</th>
                <th class="min-w-125px">Deskripsi</th>
                {{-- <th class="min-w-125px">Dibuat Oleh</th> --}}
                {{-- <th class="min-w-125px">Dibuat pada</th>
                <th class="min-w-125px">Diubah pada</th> --}}
                <th class="min-w-125px">Actions</th>

            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            <!--begin::Table row-->
            @foreach ($data as $item)
                <tr>
                    <!--begin::Role=-->
                    <td>{{ $item['name'] }}</td>
                    <td> {{ $item['description'] }} </td>
                    {{-- <td> {{ $item['pic_name'] }} </td> --}}
                    {{-- <td>{{ $item['createdAt'] }}</td>
                    <td>{{ $item['updatedAt'] }}</td> --}}
                    <!--begin::Action=-->
                    <td>
                        <div class="btn-group" role="group">
                            <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </button>
                            <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                aria-labelledby="aksi">
                                <div class="menu-item px-3">
                                    <a href="javascript:;"
                                        onclick="handle_open_modal('{{ route('category.edit', $item['id']) }}','#ModalCreateCategory','#contentCategoryModal');"
                                        class="menu-link px-3">Ubah</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('category.destroy', $item['name']) }}');"
                                        class="menu-link px-3">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            <!--end::Table row-->
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
    <div class="row">
        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
            <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                <ul class="pagination">
                    <li class="page-item {{ $data->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                    </li>

                    @php
                        $currentPage = $data->currentPage();
                        $lastPage = $data->lastPage();
                        $startPage = max($currentPage - 1, 1);
                        $endPage = min($currentPage + 1, $lastPage);
                    @endphp

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    <li class="page-item {{ $data->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
