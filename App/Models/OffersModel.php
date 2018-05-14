<?php

namespace App\Models;

use System\Model;

class OffersModel extends Model
{

    /*
    * define table name 
    *
    * @var string    
    */
    
    protected $table = 'offers';
    
    /**
    * insert new offer
    *
    * @param offers data
    */
    
    public function insertOffer($Price, $money_type, $duration_type, $duration_num)
    {
        $this->data([
            "price" => $Price,
            "money_type" => $money_type,
            "duration_type" => $duration_type,
            "duration_num" => $duration_num,
        ])->insert($this->table);
    }
    
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchOffers()
    {
        $offers = $this->select('*')->fetchAll($this->table);
        
        $allOffers ="";
        
        foreach($offers as $offer)
        {
      
         $allOffers .= "<tr>
                          <th class= 'price'>". $offer->price ."</th>
                          <td class= 'money_type'>". $offer->money_type ."</td>
                          <td class= 'duration_num'>". $offer->duration_num."</td>
                          <td class= 'duration_type'>". $offer->duration_type."</td>
                          <td class= 'actions'><i class='fas fa-pen-square fa-2x pl-2 update-offer' data-id=" . $offer->id . "></i><i class='far fa-trash-alt fa-2x pl-2 delete-ajx' data-res = 'ajx-content' data-action='" . url('/hmzd/offers/deleteOffers') . "' data-id =" . $offer->id . "></i></td>
                        </tr>";

        }
        
        return $allOffers;
    }
    
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchOffersFront()
    {
        $offers = $this->select('*')->fetchAll($this->table);
        
        $allOffers ="";
        
        $offerslangsValues = $this->lang->load("home");
        
        foreach($offers as $offer)    
        {
      
         $allOffers .= "<div class='tv-card rounded d-flex flex-column p-3 mt-3 mb-3 col-10 col-md-3 m-3'>
                            <h2 class='text-center head col0'><strong class='col5'>". $offer->duration_num."</strong> ". ucfirst($offer->duration_type)."</h2>
                            <h1 class='text-center col0 border-bottom pb-3'><strong class='col5'>". $offer->price ."</strong> ". $offer->money_type ."</h1>
                            <div class='frezz d-flex justify-content-center'>
                                <small class='text-center b-col3 rounded col0 mb-2 w-75'>". $offerslangsValues["No_Freeze"] ."</small>
                            </div>    
                            <p class=''><i class='fas fa-check fa-2x pr-2 col0'></i>". $offerslangsValues["All_IPTV"] ."<strong> ". $offerslangsValues["devices"] ."</strong></p>
                            <p class=''><i class='fas fa-check fa-2x pr-2 col0'></i>". $offerslangsValues["No_Broken"] ."<strong> ". $offerslangsValues["links"] ."</strong></p>
                            <p class=''><i class='fas fa-check fa-2x pr-2 col0'></i>". $offerslangsValues["No_Buffering"] ."<strong> ". $offerslangsValues["Channels"] ."</strong></p>
                            <p class=''><i class='fas fa-check fa-2x pr-2 col0'></i>". $offerslangsValues['VOD'] ."</p>
                            <p class=''><i class='fas fa-check fa-2x pr-2 col0'></i>". $offerslangsValues["Free_Updates"] ."</p>
                            <button type='button' data-bay = '" . $offer->duration_num . " " . $offer->duration_type . "'class='btn-bay btn rounded text-uppercase  b-col0 colWrH' data-toggle='modal' data-target='#bay_now'>". $offerslangsValues["order_now"] ."<?php echo $ ?></button>
                        </div>"  ;

        } 

        return $allOffers;
    }
    
    
    /**
    * update offer
    *
    * return void
    */
    
    public function updateOffer($id, $Price, $money_type, $duration_type, $duration_num)
    {
        $this->data([
            "price" => $Price,
            "money_type" => $money_type,
            "duration_type" => $duration_type,
            "duration_num" => $duration_num,
        ])->where("id = ?", $id)->update($this->table);
    }
    
    
    /**
    * update offer
    *
    * return void
    */
    
    public function deleteOffer($id)
    {
        $this->where("id = ?", $id)->delete($this->table);
    }
}


?>