<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Jimmyjs\ReportGenerator\ReportMedia\CSVReport;
use Jimmyjs\ReportGenerator\ReportMedia\ExcelReport;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function generate(Request $request){
        $report = null;
        $queryBuilder = null;
        $validated = $request->validate([
            'report_type' => 'required|string',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date'
        ]);
        $report_type = $validated['report_type'];
        $date_from = $validated['date_from'];
        $date_to = $validated['date_to'];
        switch ($report_type) {
            case 'pdf':
                $report = \PdfReport::class;
                break;
            case 'csv':
                $report = \CSVReport::class;
                break;
            case 'excel':
                $report = \ExcelReport::class;
                break;
            default:
                $report = \PdfReport::class;
                break;
        }
        $queryBuilder = Task::select(['title', 'comment', 'date', 'mins_spent'])
            ->where('user_id', '=', auth()->user()->id);
        if($date_from != null && $date_to != null){
            $queryBuilder = $queryBuilder->whereBetween('date', [$date_from, $date_to]);
        }else if($date_from != null && $date_to == null) {
            $queryBuilder = $queryBuilder->where('date', '>=', $date_from);
        }else if($date_from == null && $date_to != null) {
            $queryBuilder = $queryBuilder->where('date', '<=', $date_to);
        }
        $queryBuilder = $queryBuilder->orderBy('date');

        $report_title = 'User '.auth()->user()->name.' tasks report';
        $dft = $date_from == null ? ' start' : $date_from;
        $dtt = $date_to == null ? ' end' : $date_to;
        $date_range_text = 'From '.$dft.' to '.$dtt;
        $meta = [
            'Date range' => $date_range_text
        ];
        $columns = [
            'Title' => 'title',
            'Comment' => 'comment',
            'Date' => 'date',
            'Time spent' => 'mins_spent'
        ];

        return $report::of($report_title, $meta, $queryBuilder, $columns)
            ->showTotal(['Time spent' => 'minutes'])
            ->editColumn('Date', [
                'displayAs' => function($result){
                    return $result->date->format('Y-M-d');
                }
            ])
            ->editColumn('Time spent', [
                'displayAs' => function($result){
                    return $result->mins_spent.' mins.';
                }
            ])
            ->download('report');
    }
}
