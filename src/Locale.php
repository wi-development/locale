<?php

namespace WI\Locale;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
  //protected $table = 'locales';

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    //'name', 'description'
  ];
  /*'locale'     	=> 'nl_NL',
  'languageCode'	=> 'nl',
  'countryCode'	=> 'NL',
  'currencyCode'	=> 'EURO',
  'status'		=> 'main', //main, active?,enabled,disabled
  'domain'   		=> 'domain.nl'
  *




  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    //'password', 'remember_token',
  ];


  public function getEnabled(){
    //$backtrace = debug_backtrace();
    //dc('Mu name is '.$backtrace[1]['function'].', and I have called him! Muahahah!');
    return $this->where('status','<>','disabled')->get();
    return $this->where('status','<>','disabled')->orderBy('identifier','ASC')->get();
  }


  /*
   * Relations
   */

  //Locale hasMany Users
  public function users()
  {
    return $this->hasMany('WI\User', 'locale_id', 'id');
  }

	//Locale hasMany Users
	public function companies()
	{
		return $this->hasMany('WI\Core\Company', 'company_id', 'id');
	}

  public function sitemap(){

    return $this->hasMany('WI\SitemapTranslation', 'locale_id', 'id');
  }
}
