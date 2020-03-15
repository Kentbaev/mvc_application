<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\MenuModel;


class MapController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $menu = $this->menu->mainMenu();

            $this->pageData = [
                'menu' => $menu ,
                'active' => 'map/index',
                'page_title' => 'Map',
                'title' => 'Карта',
                'required_script' => "<script src=\"https://maps.api.2gis.ru/2.0/loader.js?pkg=full\"></script>",
                'map' => "<script type=\"text/javascript\">
    var map;
    DG.then(function () {
        map = DG.map('map', {
            center: [43.98, 76.89],
            zoom: 7
        });
    });
</script>"

            ];

            $response = $this->view->render('map' ,$this->pageData);
            echo $response;
            die();

    }


}
