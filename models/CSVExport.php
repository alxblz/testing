<?php
/**
 * Created by PhpStorm.
 * User: Сабзиро
 * Date: 26.05.2015
 * Time: 11:11
 */

namespace app\models;

class CsvExport {

    public static function export($data)
    {
        $fileName = 'static/temporary/file.csv';
        $fp = fopen($fileName,'w');
        fwrite($fp,"\xEF\xBB\xBF" ) ;
        foreach ($data as $row) {
            $array = array($row->id, $row->header, $row->content, $row->img, $row->author, $row->date);
            fputcsv($fp, $array);
        }
        fclose($fp);


    }
}