<?php

namespace app;

use App\Eloquent\Model;

class Config extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'config';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // $fillable属性和$guarded
    protected $fillable = [
         'sitename',
         'siteurl',
         'siteurl_wap',
         'hotsearch',
         'header',
         'logo1',
         'logo2',
         'img1',
         'file',
         'webqq',
         'link1', 'link2', 'link3', 'link4', 'link5',
         'phone',
         'tel',
         'email',
         'fax',
         'address',
         'filetype', 'filesize', 'pictype', 'picsize',
         'seotitle', 'keywords', 'description',
         'indexabout',
         'indexcontact',
         'copyright',
         'icpcode',
         'isStatic',
         'isPseudoStatic',
         'isstate',
         'showinfo',
         'appid', 'appsecret', 'access_token', 'jsapi_ticket', 'oauth',

    ];

    public function features()
    {
        // return $this->hasMany('App\CompanyFeatures');
    }
}
