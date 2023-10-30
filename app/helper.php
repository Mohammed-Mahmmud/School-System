<?php


use App\Models\Dashboard\Section;
use Illuminate\Support\Facades\App;


if (!function_exists('getSectionName')) {

    function getSectionName($id)
    {
        if($id){
            $section = Section::where('id',$id)->first('name');
            $name = json_decode($section, true);
            $section_name = $name['name'][App::getLocale()];
            }else{
            $section_name = 'Null';
        }
        return $section_name;
    }
}