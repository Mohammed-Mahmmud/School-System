<?php
namespace App\Actions\Sections;

use App\Models\Dashboard\Section;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class UpdateSectionAction
{
    
    public function handle(Section $section,array $data)
    {
        $section->update([
        'name' => ['en' => $data['en_section'],'ar'=> $data['ar_section']],
        'icon'     => $data['icon'],
        'sub_of'     => $data['sub_of'],
        'link'     => $data['link']."index",
        'order'     => $data['order'],
        'trash'     => $data['trash'],
        'type'     => $data['type'],
            ]);
            return $section;
    }
}
