<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Create new billing </x-slot>
        <x-slot name="breadCrumbPage"> create </x-slot>
        <a href=" {{ route('billing.index') }} " class="btn btn-secondary ml-3"> 
            <i class="material-icons">arrow_back</i>
            Back
        </a>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1 class="card-title text-uppercase">&nbsp;</h1>
                        <div class="ml-auto">
                            <a href="{{ route('billing.index') }}" type="button" class="btn btn-block bg-secondary btn-sm">
                                <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('billing.store') }}" method="POST">
                            @csrf
                            @include("billing.partials._form")
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    @section('customcss')
        <style>
            table.table-billing-item tbody.billing-input tr:first-child td button {
                display: none;
            }
            .select2.is-invalid + span > span > span {
                border-color: #dc3545;
            }
        </style>
    @endsection
    @section('customscript')
        <script>
            $(document).ready(function() {
                var $tableBody = $('.table-billing-item tbody.billing-input');
                var $tbodyTrLength = $tableBody.find('tr').length;
                $('.select2').select2({
                    width: '100%',
                });

                $('.add-billing-item').on('click', function(event) {
                    event.preventDefault();
                    $('select.select2').select2('destroy');
                    var $newTableRow = $tableBody.find('tr:last').clone();
                    $newTableRow.find('td:nth-of-type(2) select').prop({
                        name: 'billing_items['+$tbodyTrLength+'][category_id]',
                        class: 'select2 form-control form-control-sm',
                        val: ''
                    });
                    $newTableRow.find('td:nth-of-type(3) input[type="text"]').prop({
                        name: 'billing_items['+$tbodyTrLength+'][description]',
                        value: '',
                    });
                    $newTableRow.find('td:nth-of-type(4) input[type="text"]').prop({
                        name: 'billing_items['+$tbodyTrLength+'][amount]',
                        value: ''
                    });
                     $newTableRow.find('td:nth-of-type(5) select').prop({
                        name: 'billing_items['+$tbodyTrLength+'][account_id]',
                        class: 'select2 form-control form-control-sm'
                    });

                    $newTableRow.appendTo($tableBody).hide().fadeIn('fast');;
                     $('.select2').select2({
                        width: '100%'
                     });
                    $tbodyTrLength++;
                });

                $('.table-billing-item').on('click', '.remove-item',  function() {
                    $(this).parent().parent().fadeOut('fast', function() {
                        $(this).remove();
                    });
                });
            });
        </script>
    @endsection
</x-app>

