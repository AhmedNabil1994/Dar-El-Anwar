@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Add Page') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Page') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">سجل حركة منتج</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stores.movement.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="movement_type">نوع الحركة:</label>
                                <select class="form-control" id="movement_type" name="movement_type" required>
                                    <option value="expense">صادر من مخزن لمخزن</option>
                                    <option value="income">وارد من مخزن لمخزن</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_name">اسم الصنف:</label>
                                <select class="form-select" id="product_id" name="product_id" required>
                                    <option value="">اختر الصنف</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">الكمية:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>

                            <div class="form-group">
                                <label for="supplier">المورد:</label>
                                <input type="text" class="form-control" id="supplier" name="supplier">
                            </div>

                            <div class="form-group">
                                <label for="receiver">المستلم:</label>
                                <input type="text" class="form-control" id="receiver" name="receiver">
                            </div>

                            <div class="form-group">
                                <label for="notes">البيان:</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary">سجل الحركة <i class="fa fa-exchange"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('image').addEventListener('change', function() {
            const previewImg = document.getElementById('previewImg');
            const imagePreview = document.getElementById('imagePreview');

            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(this.files[0]);
            } else {
                previewImg.style.display = 'none';
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endpush
