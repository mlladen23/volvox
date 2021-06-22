<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EstateAd extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estate_ad';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_ad';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getAdByName($name)
    {
        return  EstateAd::where('estate_ad.deleted', '=', 0)
            ->where('ad_title', 'like', '%' . $name . '%')
            ->select([
                'id_ad',
                'ad_title',
                'street',
                'price',
                'surface',
                'city_languages.name AS ad_city',
                'hood.name AS ad_hood',
                'estate_type_languages.name AS ad_type'
            ])
            ->leftJoin('city_languages', 'estate_ad.id_city', '=', 'city_languages.id_city')
            ->leftJoin('hood', 'estate_ad.id_hood', '=', 'hood.id_hood')
            ->leftJoin('estate_type_languages', 'estate_ad.id_type', '=', 'estate_type_languages.id_type')
            ->limit(10)
            ->get();
        
    }
}
