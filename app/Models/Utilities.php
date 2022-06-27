<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Utilities extends Model
{

    public static function getFeatherIcons(){
        return [
            'Edit' => 'edit-2',
            'Delete' => 'trash',
            'Approve' => 'check',
            'Default' => 'thumbs-up',
        ];
    }

    public function actionDropdown($dropdowns){
        $html = '<div class="dropdown">
                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">';
        $icons = static::getFeatherIcons();
        foreach($dropdowns as $action){
            $type =   array_key_exists('type', $action) ? $action['type'] : 'modal_button';
            $title =   array_key_exists('title', $action) ? $action['title'] : '';
            $html .=' <a class="dropdown-item '. $type .'" href="#" data-title="'. $title .'" data-action="'. $action['route'] . '">
                          <i data-feather="'. $icons[$action['name']] .'" class="me-50"></i>
                          <span>'. $action['name'] .'</span>
                       </a>';
        }
        $html .= '</div></div>';
        return $html;
    }

    public function actions($actions){
        $html = '';
        $icons = static::getFeatherIcons();
        foreach($actions as $action){
            $type =   array_key_exists('type', $action) ? $action['type'] : 'modal_button';
            $title =   array_key_exists('title', $action) ? $action['title'] : '';
            $html .=  '<a href="#" class="ms-1 '. $type .'"  data-action="'. $action['route'] . '" data-bs-toggle="tooltip" title="'. $action['name'] .'">
                <i data-feather="'. $icons[$action['name']] .'"></i>
              </a>';
        }
        return $html;
    }
}
