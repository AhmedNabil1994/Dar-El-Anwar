@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('أضف صفحة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('كل الصفخات') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('أضف صفحة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="customers__area bg-style mb-30">
                    <div class="item-title d-flex justify-content-between align-items-end">
                        <h2>إنشاء فاتورة مبيعات جديدة</h2>
                    </div>
                    <form method="POST" action="{{ route('admin.product.invoices.sales.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="client_type">نوع العميل:</label>
                                <select class="form-select" id="client_type" name="client_type" required>
                                    <option value="">اختر نوع العميل</option>
                                    <option value="student">طالب</option>
                                    <option value="other_client">عميل خارجي</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 client_code_container">
                                <label for="client_code">كود العميل:</label>
                                <select class="form-select" id="client_code" name="client_code" required>
                                    <option value="">اختر كود العميل</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="client_name">اسم العميل:</label>
                                <select class="form-select" id="client_name" name="client_name" required>
                                    <option value="">اختر اسم العميل</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="supplier_name">اسم المورد:</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="store_id">اسم المخزن:</label>
                               <select class="form-select" id="store_name" name="store_name" required>
                                    <option value="">اختر اسم العميل</option>
                                    <option value="1">مخزن 1</option>
                                    <option value="2">مخزن 2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="purchase_date">التاريخ:</label>
                                <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                            </div>
                        </div>
                            <div class="customers__table ">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>الاجمالي</th>
                                    <th>السعر</th>
                                    <th>الكمية</th>
                                    <th>اسم الصنف</th>
                                    <th>بيان</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input class="form-control sum" type="text" disabled></td>
                                    <td><input class="form-control price" type="number" name="price[]"></td>
                                    <td><input class="form-control quantity" type="number" name="quantity[]"></td>
                                    <td><select class="form-select " name="product_ids[]">
                                            <option value="">اختر صنف</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="form-control" type="text" name="description[]"></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <button class="btn buttons-style" type="button" id="addRowBtn"> أضف صف</button>
                                    <button class="btn btn-danger" type="button" id="deleteRowBtn">أزل صف</button>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="submit" class="btn buttons-style">إنشاء فاتورة</button>
                                </div>
                            </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const addRowBtn = document.getElementById('addRowBtn');
        const deleteRowBtn = document.getElementById('deleteRowBtn');
        const tbody = document.querySelector('tbody');

        addRowBtn.addEventListener('click', () => {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input class="form-control sum" type="text" disabled></td>
                <td><input class="form-control price" type="number" name="price[]"></td>
                <td><input class="form-control quantity" type="number" name="quantity[]"></td>
                <td><select class="form-select" name="product_ids[]">
                        <option value="">اختر صنف</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input class="form-control" type="text" name="description[]"></td>
`;
            tbody.appendChild(newRow);
        });

        deleteRowBtn.addEventListener('click', () => {
            const rows = tbody.querySelectorAll('tr');
            if (rows.length > 1) {
                tbody.removeChild(rows[rows.length - 1]);
            }
        });
    </script>
    <script>
            // Function to calculate and update the total for a row
            function updateTotal(index) {
                const price = parseFloat($('.price').eq(index).val()) || 0;
                const quantity = parseFloat($('.quantity').eq(index).val()) || 0;
                const total = price * quantity;
                $('.sum').eq(index).val(total.toFixed(2)); // Display total with 2 decimal places
            }

            // Attach event listeners using event delegation
            $('tbody').on('input', '.price', function() {
                const index = $('.price').index(this);
                updateTotal(index);
            });

            $('tbody').on('input', '.quantity', function() {
                const index = $('.quantity').index(this);
                updateTotal(index);
            });
    </script>
    <script>
        console.log( $('#client_type'))
        $('#client_type').on('change',function (){
            if($(this).val() === 'student'){

                const client_code = $('<select>')
                    .attr('class', 'form-select js-example-basic-single')
                    .attr('id', 'client_code')
                    .attr('name', 'client_code')
                    .prop('required', true);

                const client_name = $('<select>')
                    .attr('id', 'client_name')
                    .attr('name', 'client_name')
                    .attr('class', 'form-select js-example-basic-single')
                    .prop('required', true);

                $.ajax({
                    url: '{{route('api.students')}}', // Replace with your API endpoint URL
                    method: 'GET',
                    dataType: 'json', // Set the expected data type
                    success: function(data) {
                        data.students.forEach(function(student) {
                            $('#client_code').append(`<option value="${student.id}">${student.code}</option>`)
                            $('#client_name').append(`<option value="${student.id}">${student.name}</option>`)
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the request
                        $('#result').html('Error: ' + status + ' - ' + error);
                    }
                });

                $('#client_code').replaceWith(client_code);

                $('#client_code').nextAll('.select2').remove();

                $('#client_name').replaceWith(client_name);
                $('#client_name').nextAll('.select2').remove();

                $('#client_code').on('change',function (){
                    $.ajax({
                        url:  '{{url('/api/students_by_code/')}}/'+$('#client_code').val(), // Replace with your API endpoint URL
                        method: 'GET',
                        dataType: 'json', // Set the expected data type
                        success: function(data) {
                            console.log(data)
                            $('#client_name').val(data.student.id).trigger("change")
                        },
                        error: function(xhr, status, error) {
                            // Handle any errors that occur during the request
                            $('#result').html('Error: ' + status + ' - ' + error);
                        }
                    });
                })

                $('#client_name').on('change',function (){
                    $.ajax({
                        url: '{{url('/api/students_by_name/')}}/'+$('#client_name').val(), // Replace with your API endpoint URL
                        method: 'GET',
                        dataType: 'json', // Set the expected data type
                        success: function(data) {
                            $('#client_code').val(data.student.id).trigger("change")
                        },
                        error: function(xhr, status, error) {
                            // Handle any errors that occur during the request
                            $('#result').html('Error: ' + status + ' - ' + error);
                        }
                    });
                })
            }
            else{
                const inputElement = $('<input>')
                    .attr('type', 'text')
                    .addClass('form-control')
                    .attr('id', 'client_code')
                    .attr('name', 'client_code')
                    .prop('required', true)
                    .attr('placeholder', 'ادخل كود العميل');
                // Replace the select element with the input element
                $('#client_code').replaceWith(inputElement);
                $('#client_code').nextAll('.select2').remove();

                const inputElement2 = $('<input>')
                    .attr('type', 'text')
                    .addClass('form-control')
                    .attr('id', 'client_name')
                    .attr('name', 'client_name')
                    .prop('required', true)
                    .attr('placeholder', 'ادخل اسم العميل');

                // Replace the select element with the input element
                $('#client_name').replaceWith(inputElement2);
                $('#client_name').nextAll('.select2').remove();
            }

            $(".js-example-basic-single").select2();
        });
    </script>
@endpush
