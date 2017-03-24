<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Water;

class WaterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getWaterData ()
    {
        return array("name"=>$this->get('name'), "region_id"=>$this->get('region'));
    }

    /**
     * @return Water
     */
    public function  getWater ()
    {
        $water = new Water();
        $water->name = $this->get('name');
        $water->location = $this->get('location');
        $water->region()->associate($this->get('region'));
        $water->watertype()->associate($this->get('watertype'));

        return $water;
    }
}
