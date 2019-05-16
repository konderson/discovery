<?php
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, route('category',$category->id));
});
Breadcrumbs::register('detal', function ($breadcrumbs, $category,$dpublish) {
    $breadcrumbs->parent('category',$category);
    $breadcrumbs->push($dpublish->title, route('publish', $dpublish->id));
});