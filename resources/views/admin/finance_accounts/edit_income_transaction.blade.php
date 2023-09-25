@extends('layouts.admin')

@section('content')
<div class="page-content">
    <div class="container-fluid">
            <div class="row">    
                <div class="customers__area bg-style mb-30">    
                <div class="col-md-12">    
        <h1>إضافة حركة وارد (قبض)</h1>
        <form action="{{ route('accounts.updateTransaction',$financialAccount) }}" method="POST">
            @csrf
            <input type="hidden" name="transaction_type" value="income">
            <div class="form-group">
                <label for="date">التاريخ:</label>
                <input type="date" name="date" value="{{\Carbon\Carbon::parse($financialAccount->date)->toDateString()}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">اسم الحركة:</label>
                <input type="text" name="name" class="form-control" value="{{$financialAccount->name}}">
            </div>
            <div class="form-group">
                <label for="amount">المبلغ:</label>
                <input type="number" name="amount" class="form-control" value="{{$financialAccount->amount}}">
            </div>
            <div class="form-group">
                <label for="description">البيان:</label>
                <textarea name="description" class="form-control">{{$financialAccount->description}}</textarea>
            </div>

            <button type="submit" class="btn buttons-style mt-2">حفظ</button>
        </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
