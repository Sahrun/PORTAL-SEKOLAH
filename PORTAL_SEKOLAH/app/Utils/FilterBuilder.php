<?php

namespace App\Utils;


class FilterBuilder
{

public $sparator = "/";

 public function filterBuilder($data,$filterUri,$search){
     $data = $data->newQuery();

     if(isset($filterUri->search)){
        $data->where($search,'like',$filterUri->search."%");
     }
     if(isset($filterUri->filter))
     {
       $filter  = explode(",",$filterUri->filter);

       if(count($filter) !== 0){

        $data->where($this->generateFilter($filter));

       }
     }

     if(isset($filterUri->order_by) && isset($filterUri->order))
     {
        $data->orderBy($filterUri->order_by,$filterUri->order);
     }

     if(isset($filterUri->page)  && $filterUri->page > 0)
     {
       $page = $filterUri->page - 1;
       if(isset($filterUri->show) && $page > 0)
       {
        $data->offset(($filterUri->show * $page));
       }
       
     }

     if(isset($filterUri->show))
     {
       $data->limit($filterUri->show);
     }
    
     return $data->get();    
 }

 public function generateFilter($filters){
    $filterResult = array();

    foreach($filters as $key => $value)
    {
            $filter = array();
            if(isset($value)){

              $row = explode($this->sparator,$value);
              array_push($filter,$row[0]);
              array_push($filter,$this->operation($row[1]));
              array_push($filter,$row[1] == "like" ? $row[2]."%":$row[2]);
          
             array_push($filterResult,$filter);
           }
    } 
  return $filterResult;
} 
   
public function operation($oprt) {

  $result = "";
  
  switch ($oprt) {
    case "equal":
      $result = "=";
    break;
    case "like":
      $result = "like";
    break;
    default:
    $result = "=";
  }

  return $result;

}

}