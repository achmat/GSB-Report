<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    /**
     * @var \GSB\DAO\Practitioner_typeDAO
     */
    private $Practitioner_typeDAO;

    public function setPractitioner_typeDAO($practitioner_typeDAO) {
        $this->Practitioner_typeDAO = $Practitioner_typeDAO;
    }

    /**
     * Returns the list of all practitioners, sorted by trade name.
     *
     * @return array The list of all practitioners.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the list of all practitioners for a given practitioner_type, sorted by trade name.
     *
     * @param integer $practitioner_typeDd The practitioner_type id.
     *
     * @return array The list of practitioners.
     */
    public function findAllByPractitioner_type($practitioner_typeId) {
        $sql = "select * from practitioner where practitioner_type__id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitioner_typeId));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_type_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the practitioner matching a given id.
     *
     * @param integer $id The practitioner id.
     *
     * @return \GSB\Domain\Practitioner|throws an exception if no practitioner is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    /**
     * Creates a Practitioner instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Practitioner
     */
    protected function buildDomainObject($row) {
        $practitioner_typeId = $row['practitioner_type_id'];
        $practitioner_type = $this->practitioner_typeDAO->find($practitioner_typeId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirstName($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZipCode($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setNotorietyCoef($row['notoriety_coefficient']);
        $practitioner->setPractitioner_typeID($practitioner_type_id);
        return $practitioner;
    }
}