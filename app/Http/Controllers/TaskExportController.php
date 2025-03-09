<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TaskExportController extends Controller
{
    public function exportPendingTasks()
    {
        // Obtener tareas pendientes
        $tasks = Task::where('status', 'pendiente')
             ->where('user_id', Auth::id()) // Filtra solo las tareas del usuario autenticado
             ->get();

        // Crear nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Título');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Fecha de Vencimiento');
        $sheet->setCellValue('E1', 'Estado');

        // Estilo de encabezados
        $sheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Agregar datos de las tareas
        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->id);
            $sheet->setCellValue('B' . $row, $task->title);
            $sheet->setCellValue('C' . $row, $task->description);

            // Exportar la fecha como texto
            $sheet->setCellValue('D' . $row, (string)$task->due_date); // Convertir a texto

            $sheet->setCellValue('E' . $row, $task->status);
            $row++;
        }

        // Ajustar ancho de columnas
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Agregar bordes a las celdas
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:E' . ($row - 1))->applyFromArray($styleArray);

        // Preparar respuesta para descargar el archivo
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Tareas_Pendientes.xlsx';

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'. $fileName .'"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportCompletedTasks()
    {
        // Obtener tareas pendientes
        $tasks = Task::where('status', 'completada')
        ->where('user_id', Auth::id()) // Filtra solo las tareas del usuario autenticado
        ->get();

        // Crear nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Título');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Fecha de Vencimiento');
        $sheet->setCellValue('E1', 'Estado');

        // Estilo de encabezados
        $sheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Agregar datos de las tareas
        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->id);
            $sheet->setCellValue('B' . $row, $task->title);
            $sheet->setCellValue('C' . $row, $task->description);

            // Exportar la fecha como texto
            $sheet->setCellValue('D' . $row, (string)$task->due_date); // Convertir a texto

            $sheet->setCellValue('E' . $row, $task->status);
            $row++;
        }

        // Ajustar ancho de columnas
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Agregar bordes a las celdas
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:E' . ($row - 1))->applyFromArray($styleArray);

        // Preparar respuesta para descargar el archivo
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Tareas_Completadas.xlsx';

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'. $fileName .'"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportProgressTasks()
    {
        // Obtener tareas pendientes
        $tasks = Task::where('status', 'en progreso')->where('user_id', Auth::id()) // Filtra solo las tareas del usuario autenticado
        ->get();


        // Crear nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Título');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Fecha de Vencimiento');
        $sheet->setCellValue('E1', 'Estado');

        // Estilo de encabezados
        $sheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Agregar datos de las tareas
        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->id);
            $sheet->setCellValue('B' . $row, $task->title);
            $sheet->setCellValue('C' . $row, $task->description);

            // Exportar la fecha como texto
            $sheet->setCellValue('D' . $row, (string)$task->due_date); // Convertir a texto

            $sheet->setCellValue('E' . $row, $task->status);
            $row++;
        }

        // Ajustar ancho de columnas
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Agregar bordes a las celdas
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:E' . ($row - 1))->applyFromArray($styleArray);

        // Preparar respuesta para descargar el archivo
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Tareas_En_Progeso.xlsx';

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'. $fileName .'"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportAllTasks()
    {
        // Obtener tareas pendientes
        $tasks = Task::where('user_id', Auth::id())->get();

        // Crear nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Título');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Fecha de Vencimiento');
        $sheet->setCellValue('E1', 'Estado');

        // Estilo de encabezados
        $sheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Agregar datos de las tareas
        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->id);
            $sheet->setCellValue('B' . $row, $task->title);
            $sheet->setCellValue('C' . $row, $task->description);

            // Exportar la fecha como texto
            $sheet->setCellValue('D' . $row, (string)$task->due_date); // Convertir a texto

            $sheet->setCellValue('E' . $row, $task->status);
            $row++;
        }

        // Ajustar ancho de columnas
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Agregar bordes a las celdas
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:E' . ($row - 1))->applyFromArray($styleArray);

        // Preparar respuesta para descargar el archivo
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Todas_Las_Tareas.xlsx';

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'. $fileName .'"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
