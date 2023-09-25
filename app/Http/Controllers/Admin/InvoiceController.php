<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Invoice;
use App\Models\Student;
use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $childName = $request->child_name;
        $class = $request->class;

        $paidInvoices = Invoice::query()->orderBy('id','DESC');

        $paidInvoices->where(function ($query) use ($childName,$class) {
            if (!empty($childName)) {
                $query->whereHas('student', function ($userQuery) use ($childName) {
                    $userQuery->where('name', $childName);
                });
            }

            if (!empty($class)) {
                $query->whereHas('class_room', function ($userQuery) use ($class) {
                    $userQuery->where('id', $class);
                });
            }
        });

        $data['subjects'] = Subject::all();
        $data['departs'] = Department::where('status',1)->get();
        $data['students'] = \App\Models\Student::where('status',1)->get();
        $data['classes'] = \App\Models\ClassRoom::all();
        $data['levels'] = \App\Models\Level::all();
        $paidInvoices = $paidInvoices->paginate(25);
        return view('admin.subscription.invoices.index', $data, compact('paidInvoices'));
    }

    public function printInvoice(Invoice $paidInvoice)
    {
        // Logic for creating invoices
        $data = ['title' => 'الفاتورة','invoice' => $paidInvoice];
        $pdf = Pdf::loadView('admin.subscription.pdf.sample', $data);

        return view('admin.subscription.pdf.sample', $data);
    }

    public function downloadInvoice(Invoice $paidInvoice)
    {
        // Logic for storing invoices
        $data = ['title' => 'الفاتورة','invoice' => $paidInvoice];
        $pdf = Pdf::loadView('admin.subscription.pdf.sample', $data);

        return $pdf->download('invoice.pdf');
    }

    public function markAsPaid(Invoice $invoice)
    {
        $invoice->update(['paid_at' => now()]);

        return redirect()->route('invoices.index');
    }


}
