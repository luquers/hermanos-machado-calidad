@extends('layouts.contentLayoutMaster')

@section('title', __('global.document') . ' ' . $document->name . ' - ' . __('global.version_list'))

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')

@endsection

@section('content')
    @include('includes.notifications')

    <section class="version-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">


                        <div class="row">
                            @if (!Auth::user()->hasRole('user'))
                                <a class="btn btn-xs btn-info m-2" href="{{route('version.create', $document)}}">{{__("global.add_version")}}</a>
                            @endif
                                @include('version.filters')
                        </div>


                    <div class="table-responsive">
                        {{ $dataTable->table() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{ $dataTable->scripts() }}

    <script>
        $('#revision, #user').donetyping(function() {
            window.LaravelDataTables['version-table'].draw();
        });

        $('#version-table').on('click', '.delete-version', function () {

            let url = $(this).data('href');

            Swal.fire({
                title: '{{ __('global.confirm-question') }}',
                text: "{{ __('global.confirm-notice') }}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('global.continue') }}',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                cancelButtonText: '{{ __('global.cancel') }}',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    shortPost(url, { _method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content') }, true);
                }
            })
        });


    </script>
@endsection
