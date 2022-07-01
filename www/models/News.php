<?php

class News
{

    public static function getNewsItemById($id)
    {

        $id = intval($id);

        if ($id) {
            $db=Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id =' . $id);

              //по дефолту фетч возвращает индекс, кей и валье, в конструкторе можно настраивать индексы в виде номеров колонок или названий(кей)
              //$newsItem = $result->fetch(PDO::FETCH_NUM);
            $newsItem = $result->fetch(PDO::FETCH_ASSOC);

            return $newsItem;
        }

    }


    public static function getNewsList()
    {

//        $host = 'localhost';
//        $dbname = 'my_db';
//        $user = 'bestuser';
//        $password = 'bestuser';
//        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $db=Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id,title,date,short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;

    }

}










