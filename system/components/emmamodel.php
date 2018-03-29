<?php

abstract class EmmaModel implements IModel
{

    static $instance; // @todo why is this here?

    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * @see IModel::query()
     * @param $query
     * @param null $params
     * @return
     */
    public function query($query, $params = NULL)
    {
        if (DB) {
            if (DEBUG_MODE)
                $this->db->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->db->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $this->db->connection->prepare($query);
            $stmt->execute($params);

            $error = $this->db->connection->errorInfo();

            if (DEBUG_MODE)
                if ($error[0] != "00000")
                    die ($this->db->connection->errorInfo());

        }

        return $this->db->connection->lastInsertId();

    }

    /**
     * @see IModel::fetch()
     * @param $query
     * @param null $params
     * @return bool|DataObject
     */
    public function fetch($query, $params = NULL)
    {

        if (DB) {
            if (DEBUG_MODE)
                $this->db->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->db->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $this->db->connection->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (PRINT_SELECT_QUERY) {
                $stmt->debugDumpParams();
            }
            $stmt->closeCursor();

            $error = $this->db->connection->errorInfo();

            if (DEBUG_MODE)
                if ($error[0] != "00000")
                    die (print_r($this->db->connection->errorInfo()));


            //Send single data object
            return $result
                ? DataObject::getInstance($result)
                : false;

        }

    }

    /**
     * @see IModel::fetchAll()
     * @param $query
     * @param null $params
     * @return array|bool
     */
    public function fetchAll($query, $params = NULL)
    {
        if (DB) {
            if (DEBUG_MODE)
                $this->db->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $stmt = $this->db->connection->prepare($query);
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (PRINT_SELECT_QUERY) {
                $stmt->debugDumpParams();
            }
            $stmt->closeCursor();

            $error = $this->db->connection->errorInfo();

            if (DEBUG_MODE)
                if ($error[0] != "00000")
                    die (print_r($this->db->connection->errorInfo()));

            $dataObjects = array();
            foreach ($results as $result)
                array_push($dataObjects, DataObject::getInstance($result));

            //Send all data objects in an array
            return $results ? $dataObjects : false;

        }

    }

}

