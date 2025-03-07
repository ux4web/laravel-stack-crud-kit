<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
{
    public $title = '';
    public $author = '';
    public $content = '';
    public $status = 'Active';

    public function save() {

        $this->validate([
            'title' => 'required|min:5',
            'author' => 'required|min:5'
        ]);

        $article = new Article();
        $article->title = $this->title;
        $article->author = $this->author;
        $article->content = $this->content;
        $article->status = $this->status;
        $article->save();

        session()->flash('success', 'Article added successfully.');

        $this->redirect('/articles');
    }

    public function render()
    {        
        return view('livewire.articles.create-article');
    }
}
