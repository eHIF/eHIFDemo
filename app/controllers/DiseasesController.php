<?php

class DiseasesController extends BaseController {


    public function api_search($term = ""){
        $diseases = Disease::where("code", "LIKE", "%$term%")->orWhere("title", "LIKE", "%$term%")->get();

        return $diseases;//->lists("title","code");
    }


}
