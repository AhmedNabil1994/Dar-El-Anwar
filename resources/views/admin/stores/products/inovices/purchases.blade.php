@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('كل الصفحات') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('أضف صفحة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>إنشاء فاتورة مشتريات جديدة</h2>

                    <form method="POST" action="{{ route('admin.product.invoices.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="supplier_name">اسم المورد:</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="store_name">اسم المخزن:</label>
                                <input type="text" class="form-control" id="store_name" name="store_name" required>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="purchase_date">التاريخ:</label>
                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="receiver">المستلم:</label>
                                <input type="text" class="form-control" id="receiver" name="receiver" required>
                            </div>
                        </div>

                            <table class="table table-bordered">
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
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <button class="btn buttons-style" type="button" id="addRowBtn"> أضف صف</button>
                                    <button class="btn btn-danger" type="button" id="deleteRowBtn">أزل صف</button>
                                </div>
                            </div>
                        <button type="submit" class="btn buttons-style">إنشاء فاتورة</button>
                    </form>

                    <!-- <table class="table table-bordered">
                        <thead>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table> -->
                </div>
                <div class="row">
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
@endpush
