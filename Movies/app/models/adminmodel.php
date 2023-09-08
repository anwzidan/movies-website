<?php
namespace PROJECT\Models;


class AdminModel extends AbstractModel
{

    public $Username;
    public $Password;
   

    protected static $tableName = 'Login';

    protected static $tableSchema = array(
        'Username'              => self::DATA_TYPE_STR,
        'Password'       => self::DATA_TYPE_STR,
        
    );

    protected static $primaryKey = 'Username';

}