<?php

interface InterfaceSeparationDatabaseQueries{
    static public function selectFetch($sql, $value=null, $param=null);
    static public function selectFetchAll($sql, $value=null, $param=null);
    static public function updateFetch($sql, $value=null, $param=null);
    static public function insertFetch($sql, $value=null, $param=null);
    static public function deleteFetch($sql, $value=null, $param=null);
    static public function obsugaBledow($b=null);
}
