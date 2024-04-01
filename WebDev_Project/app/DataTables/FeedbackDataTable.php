<?php

namespace App\DataTables;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FeedbackDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($feedbacks) {
                $editUrl = route('feedbacks.edit', $feedbacks->id);
                $deleteUrl = route('feedbacks.destroy', $feedbacks->id);
                $restoreUrl = route('feedbacks.restore', $feedbacks->id);

                $editButton = '<a href="' . $editUrl . '" class="btn btn-primary">Edit</a>';
                $deleteButton = '<form action="' . $deleteUrl . '" method="POST" style="display: inline;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>
                                </form>';

                $restoreButton = '<a href="' . $restoreUrl . '" class="btn btn-success">Restore</a>';

                if ($feedbacks->deleted_at == null) {
                    return $editButton . ' ' . $deleteButton;
                } else {
                    return $editButton . ' ' . $restoreButton;
                }
            })
            ->addColumn('images', function ($feedback) {
                $images = '';
                $imagePaths = explode(',', $feedback->images);
                foreach ($imagePaths as $imagePath) {
                    // Remove duplicate 'storage/images/' part
                    $imagePath = str_replace('storage/images/', '', trim($imagePath));
                    $images .= '<img src="' . asset('storage/images/' . $imagePath) . '" alt="Product Image" class="img-thumbnail mr-1" style="max-width:100px;">';
                }
                return $images;
            })

            ->rawColumns(['action', 'images'])
            ->setRowId('id_product'); // Assuming 'id_product' is the primary key column name
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Feedback $model): QueryBuilder
    {
        return $model->newQuery()->withTrashed();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('id')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['export', 'print', 'reset', 'reload'],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('username'),
            Column::make('rating')->title('Rating'),
            Column::computed('images')
                ->title('Images')
                ->orderable(false)
                ->searchable(false)
                ->width(200),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('deleted_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Feedback_' . date('YmdHis');
    }
}
