<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class EditArticle extends Component
{
    public $id;
    public $title;
    public $author;
    public $content;
    public $status;

    public function mount($id)
    {
        $article = Article::findOrFail($id);
        $this->id = $article->id;
        $this->title = $article->title;
        $this->author = $article->author;
        $this->content = $article->content;
        $this->status = $article->status;
    }

    public function update()
    {

        $this->validate([
            'title' => 'required|min:5',
            'author' => 'required|min:5'
        ]);

        $article = Article::find($this->id);
        $article->title = $this->title;
        $article->author = $this->author;
        $article->content = $this->content;
        $article->status = $this->status;
        $article->save();

        session()->flash('success', 'Article updated successfully.');

        $this->redirect('/articles');
    }

    public function render()
    {
        return view('livewire.articles.edit-article');
    }
}
