<?php
namespace App\Helpers;
Class UnderConstruction {
    
    public static function WIPsection($colspan)
    {
        $div = '';
        $div .= '<div class="col-md-'.$colspan.' ">';
        $div .= '<div class="offset-2 border p-3 ">';
        $div .= '<h3>Under Construction</h3>';
        $div .= '<p>This section is currently under construction, come back later.</p>';
        $div .= '<a href="#">Dummy Link</a>';
        $div .= '</div>';
        $div .= '</div>';
        return $div;
    }
    
    
}