<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner_type;

class Practitioner_typeDAO extends DAO
{
    /**
     * Returns the list of all practitioner_types, sorted by name.
     *
     * @return array The list of all practitioner_types.
     */
    public function findAll() {
        $sql = "select * from practitioner_type order by practitioner_type_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioner_types = array();
        foreach ($result as $row) {
            $practitioner_typeId = $row['practitioner_type_id'];
            $practitioner_types[$practitioner_typeId] = $this->buildDomainObject($row);
        }
        return $practitioner_types;
    }

    /**
     * Returns the practitioner_type matching the given id.
     *
     * @param integer $id The practitioner_type id.
     *
     * @return \GSB\Domain\Practitioner_type|throws an exception if no practitioner_type is found.
     */
    public function find($id) {
        $sql = "select * from practitioner_type where practitioner_type_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner_type found for id " . $id);
    }

    /**
     * Creates a Practitioner_type instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Practitioner_type
     */
    protected function buildDomainObject($row) {
        $practitioner_type = new Practitioner_type();
        $practitioner_type->setId($row['practitioner_type_id']);
        $practitioner_type->setName($row['practitioner_type_name']);
        $practitioner_type->setPlace($row['practitioner_type_place']);
        return $practitioner_type;
    }
}