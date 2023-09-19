<?php

// app/Exports/YourExportClass.php

namespace App\Export;

use App\Models\ClassRoom;
use App\Models\Level;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromCollection;

class Export implements FromView
{
    public function view(): View
    {
        $data['title'] = 'All Student';
        $students = Student::query()->orderBy('id','DESC');

        $data['levels'] = Level::whereStatus(1)->get();
        $data['class_rooms'] = ClassRoom::all();
        $data['count'] = Student::count();

        $students = $students->paginate(50);
        return view('admin.student.list', $data, compact('students'));
    }
}

