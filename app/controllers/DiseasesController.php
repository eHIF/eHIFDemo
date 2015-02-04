<?php

class DiseasesController extends BaseController {


    public function api_search($term = ""){
        $diseases = Disease::where("code", "LIKE", "%$term%")->orWhere("title", "LIKE", "%$term%")->orderBy("title")->get();

        return $diseases;//->lists("title","code");
    }


}
