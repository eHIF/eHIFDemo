<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 10:14 μμ

 */

class ReferralTypesController extends BaseController {

    public function api_index(){
        return ReferralType::all();
    }
} 