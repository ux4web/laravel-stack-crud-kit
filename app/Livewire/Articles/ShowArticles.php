<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ShowArticles extends Component
{
    use WithPagination;

    // Include search and sort parameters in the URL only when set.
    protected $queryString = [
        'keyword' => ['except' => ''],
        'sortColumn' => ['except' => null],
        'sortDirection' => ['except' => null],
    ];

    public $keyword = '';
    public $textInput = '';
    public $title = '';
    public $sortColumn = null;   // default: no sort column
    public $sortDirection = null; // default: no sort direction
    public $sortClickCount = 0;  // track click cycle for the current column

    // public function mount()
    // {
    //     if (!in_array($this->sortColumn, ['id', 'title', 'author'])) {
    //         $this->sortColumn = 'id';
    //     } // use for default sort column
    //     if (!in_array($this->sortDirection, ['asc', 'desc'])) {
    //         $this->sortDirection = 'desc';
    //     } // use for default sort direction
    // }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        session()->flash('error', 'Article deleted successfully.');
        return $this->redirect('/articles');
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            if ($this->sortDirection === 'asc') {
                $this->sortDirection = 'desc';
            } elseif ($this->sortDirection === 'desc') {
                $this->resetSorting();
                return;
            }
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function resetSorting()
    {
        $this->sortColumn = null;
        $this->sortDirection = null;
    }


    public function render()
    {
        $articlesQuery = Article::query()
            ->when($this->keyword, function ($query) {
                $query->where('title', 'like', '%' . $this->keyword . '%')
                    ->orWhere('author', 'like', '%' . $this->keyword . '%');
            });

        // Apply sorting only if a column is selected.
        if ($this->sortColumn && $this->sortDirection) {
            $articlesQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        $articles = $articlesQuery->paginate(6);

        return view('livewire.articles.show-articles', compact('articles'));
    }

    public function search()
    {
        $this->keyword = $this->textInput;
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->textInput = '';
        $this->keyword = '';
        $this->resetPage();
    }

    // Method to clear both search and sorting at once.
    public function clearAll()
    {
        $this->clearSearch();
        $this->resetSorting();
    }

}
