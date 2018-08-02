<?php
namespace App;

/**
 * Class Ql
 *
 * Связывание адаптера БД Phalcon
 *
 * @package App
 */
class Ql extends \ControllerBase
{

    public  function select($query, $more = null)
    {

        $output_sql=$this->modelsManager->executeQuery($query);

        $output=[];
        $count  = count($output_sql);

        foreach ($output_sql as $st) {
            $cols=(object)'';
            foreach ($st as $k=>$t) {

                $cols->$k=$t;
            }

            if ($count>1 || $more) {
                $output[] = $cols;
            }
            else {
                $output = $cols;
            }

        }
        return $output;
    }


    public  function selectOne($query)
    {
        return $this->select($query);
    }

    public  function selectJoin($query, $join=array())
    {

        $output_sql=$this->modelsManager->executeQuery($query);

        $output = [];
        $count  = count($join);
        foreach ($output_sql as $st) {
          switch($count){
              case 2:
                  $output[] = (object) array_merge (get_object_vars ( $st->{$join[0]} ), get_object_vars ( $st->$join[1] ));
                  break;

              case 3:
                  $output[] = (object) array_merge (get_object_vars ( $st->{$join[0]} ), get_object_vars ( $st->$join[1] ), get_object_vars ( $st->$join[2] ));
                  break;
          }
        }
        return $output;
    }

}
