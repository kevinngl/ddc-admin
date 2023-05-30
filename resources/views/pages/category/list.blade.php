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
                                data-bs-toggle="dropdown" aria-expanded="false"
                                onclick="handle_open_modal('{{ route('category.edit', $item['id']) }}','#ModalCreateCategory','#contentCategoryModal');">
                                Ubah
                            </button>
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
