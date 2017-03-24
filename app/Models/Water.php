<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Water
 * @package App\Models
 * @property string $name
 * @property string $description
 * @property string $location
 * @property Fish[] $fish
 * @property WaterType $type
 * @property Region $region
 * 
 */
class Water extends Model
{
    protected $fillable = ['name', 'region_id', 'watertype_id', 'description', 'location', 'fish','watertype'];

    protected $geofields = array('location');


    public function setLocationAttribute($value) {
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

    public function getLocationAttribute($value){

        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);

        return substr($loc,0,-1);
    }

    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach($this->geofields as $column){
            $raw .= ' astext('.$column.') as '.$column.' ';
        }

        return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
    }

    public function scopeDistance($query,$dist,$location)
    {
        return $query->whereRaw('st_distance(location,POINT('.$location.')) < '.$dist);

    }

    public function scopeShowDistance ($query, $location)
    {
        return $query->select(array('id','name', DB::raw('astext(location) as location'), DB::raw('round(ST_Distance(location, POINT('.$location.'))*69,2) as dist')))->orderBy('dist');

    }

    public function region ()
    {
        return $this->belongsTo(Region::class);
    }

    public function watertype()
    {
        return $this->belongsTo(WaterType::class);
    }

    public function fishs()
    {
        return $this->belongsToMany(Fish::class, 'water_fish', 'water_id', 'fish_id');
    }

}
