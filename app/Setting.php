<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['user_id', 'name', 'value'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function byName($name){
        if(count($name) > 1){
            $settings = self::whereIn('name', $name)->get();

            if($settings){
                $settings->each(function($data){
                    $data['value'] = json_decode($data['value']);
                });
                return $settings;
            }
        } else {
            $settings = self::whereIn('name', $name)->get()->first();

            if($settings){
                $settings['value'] = json_decode($settings['value']);
                return $settings;
            }
        }

        return false;
    }

    public static function getValueSpecific($data){
        /**
         * 'name' => 'parent data',
         * 'list' => 'name in list'
         */

        $setting = self::where('name', $data['name'])->get()->first();

        if($setting){
            $setting->value = json_decode($setting->value);

            foreach($setting->value as $value){
                if($value->name == $data['list']){
                    return $value;
                }
            }

            return false;
        }

        return false;
    }

    public static function deleteValueSpecific($data){
        /**
         * 'name' => 'parent data',
         * 'list' => 'name in list'
         */

        $setting = self::getValueSpecific($data); //check is have value
        $result = [];

        if($setting){
            $setting = self::where('name', $data['name'])->get()->first();

            $setting->value = json_decode($setting->value);

            foreach($setting->value as $value){
                if($value->name != $data['list']){
                    $result[] = $value;
                }
            }

            return $result;
        }

        return false;
    }
}
