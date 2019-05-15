<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsReports extends Model
{
    //

    public function newsCategoryRecords()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function newsImageRecords()
    {
        return $this->hasMany(NewsImages::class, 'news_report_id');
    }

    public function newsAuthorRecords()
    {
        return $this->belongsTo(NewsAuthor::class, 'author_id');
    }
}
