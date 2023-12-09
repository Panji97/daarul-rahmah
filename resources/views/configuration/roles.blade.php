@extends('layouts.master')
@push('css')
<link href="{{asset('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{asset('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="main-content">
    <div class="title">
        Roles
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(auth()->user()->can('create role'))
                        <button type="button" class="btn mb-2 btn-sm btn-primary"><i class="ti-plus"></i>Tambah Data</button>
                        @endif
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('')}}vendor/jquery/jquery.min.js"></script>
<script src="{{asset('')}}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('')}}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('')}}vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
{{$dataTable->scripts()}}

<script>
    const modal = new bootstrap.Modal($('#largeModal'))

    $('#role-table').on('click', '.action', function() {
        const data = $(this).data()
        const id = data.id
        const jenis = data.jenis

        $.ajax({
            method: 'get',
            url: `{{ url('configuration/roles/')}}/${id}/edit`,
            success: function(res) {
                $('#largeModal').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })

        function store() {
            $('#formAction').on('submit', function(e) {
                e.preventDefault()
                const _form = this
                const formData = new FormData(_form)

                $.ajax({
                    method: 'put',
                    url: `{{ url('configuration/roles/')}}/${id}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        modal.hide()
                    }
                })
            })
        }

    })
</script>
@endpush