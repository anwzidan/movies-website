<?php
namespace PROJECT\Models;

class MovieModel extends AbstractModel
{

    public $MovieID;
    public $Name;
    public $Simple_desc;
    public $Full_desc;
    public $Movie_Path;
    public $Cover_Path;

    protected static $tableName = 'Movies';

    protected static $tableSchema = array(
        'Name'              => self::DATA_TYPE_STR,
        'Simple_desc'       => self::DATA_TYPE_STR,
        'Full_desc'         => self::DATA_TYPE_STR,
        'Movie_Path'        => self::DATA_TYPE_STR,
        'Cover_Path'        => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'MovieID';

}