<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id',];

    public static $rules = array(
        'title' => 'required',
        'author' => 'required',
        'publisherName' => 'required',
    );

    public function setAllDataAttribute(Array $value)
    {
        $this->attributes['title'] = $value['title'];
        // $this->attributes['titleKana'] = $value['titleKana'];
        // $this->attributes['subTitle'] = $value['subTitle'];
        // $this->attributes['subTitleKana'] = $value['subTitleKana'];
        // $this->attributes['seriesName'] = $value['seriesName'];
        // $this->attributes['seriesNameKana'] = $value['seriesNameKana'];
        // $this->attributes['contents'] = $value['contents'];
        $this->attributes['author'] = $value['author'];
        // $this->attributes['authorKana'] = $value['authorKana'];
        $this->attributes['publisherName'] = $value['publisherName'];
        // $this->attributes['size'] = $value['size'];
        // $this->attributes['isbn'] = $value['isbn'];
        // $this->attributes['itemCaption'] = $value['itemCaption'];
        // $date = DateTime::createFromFormat('Y年m月d日', $value['salesDate']);
        // $this->attributes['salesDate'] = $date->format('Y-m-d');
        // $this->attributes['itemPrice'] = $value['itemPrice'];
    }
}