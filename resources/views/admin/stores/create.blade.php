@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('إضافة منتج') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('اضفة منتج') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
            </div>
            <div class="row">
            <div class="customers__area bg-style mb-30">
            <div class="col-md-12">
            <div class="">
                    <h2 class="card-header">إضافة منتج جديد</h2>
                    <div class="card-body">
                        <form class="row" method="POST" action="{{ route('stores.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="sku">كود المنتج (SKU):</label>
                                    <input type="text" class="form-control" id="sku" name="sku" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="description">وصف المنتج:</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="parcode">باركود المنتج:</label>
                                <input type="text" class="form-control" id="parcode" name="parcode" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="name">اسم المنتج:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="price">meta address:</label>
                                <input type="text" class="form-control" id="price" name="price"  required>
                            </div>

                            <div class="form-group col-6">
                                <label for="department">القسم:</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <option value="">اختر القسم</option>
                                    @foreach($departs as $depart)
                                        <option value="{{$depart->id}}">{{$depart->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="quantity">description :</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="arrival_date">مسمي الوحدة:</label>
                                <select id="unit" name="unit" class="form-select">
                                    <option value="قطعة">قطعة</option>
                                    <option value="كيلوجرام (كجم)">كيلوجرام (كجم)</option>
                                    <option value="لتر (لتر)">لتر (لتر)</option>
                                    <option value="متر (م)">متر (م)</option>
                                    <option value="صندوق">صندوق</option>
                                    <option value="عبوة">عبوة</option>
                                    <option value="لتر (جالون)">لتر (جالون)</option>
                                    <option value="كرتون">كرتون</option>
                                    <option value="متر مربع (م^2)">متر مربع (م^2)</option>
                                    <option value="طن (طن)">طن (طن)</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="arrival_date">slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="arrival_date">tags:</label>
                                <input type="text" class="form-control" id="tags" name="tags" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="arrival_date">canonical:</label>
                                <input type="text" class="form-control" id="canonical" name="canonical" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="rating">السعر:</label>
                                <input type="number" class="form-control" id="price" name="price" min="1" max="5">
                            </div>

                            <div class="form-group col-6">
                                <label for="image">صورة المنتج:</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <div id="imagePreview">
                                <img id="previewImg" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                            </div>

                            <div class="form-group col-6">
                                <label for="quantity">الكمية:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
{{--
                            <div class="form-group col-6">
                                <label for="supplier">المورد:</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="receiver">المورد:</label>
                                <input type="text" class="form-control" id="receiver" name="receiver" required>
                            </div>--}}

                            <div class="form-group mt-4">
                                <button type="submit" class="btn buttons-style">إضافة المنتج</button>
                            </div>
                        </form>
                    </div>
                </div>
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
