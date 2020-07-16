<?php

namespace App\Widgets;

use App\Category;
use App\Post;
use Arrilot\Widgets\AbstractWidget;
use Jorenvh\Share\ShareFacade;

class Header extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = Category::whereNotIn('id', [1])->get();


        ShareFacade::currentPage()->facebook()->twitter()->pinterest();

        return view('widgets.header',compact('categories'));
    }
}
