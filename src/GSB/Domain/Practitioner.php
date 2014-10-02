<?php

namespace GSB\Domain;

class Practitioner 
{
    /**
     * Practitioner id.
     *
     * @var integer
     */
    private $id;

    /**
     * practitioner name.
     *
     * @var string
     */
    private $name;

    /**
     * First name.
     *
     * @var string
     */
    private $firstName;

    /**
     * Address.
     *
     * @var string
     */
    private $address;

    /**
     * zip code.
     *
     * @var string
     */
    private $zipCode;

    /**
     * City.
     *
     * @var string
     */
    private $city;

    /**
     * Notoriety coefficient.
     *
     * @var float
     */
    private $notorietyCoef;

    /**
     * practitioner type.
     *
     * @var \GSB\Domaine\Family
     */
    private $practitioner_type;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getNotorietyCoef() {
        return $this->notorietyCoef;
    }

    public function setNotorietyCoef($notorietyCoef) {
        $this->notorietyCoef = $notorietyCoef;
    }

    public function getPractitioner_type() {
        return $this->practitioner_type;
    }

    public function setPractitioner_type($practitioner_type) {
        $this->practitioner_type = $practitioner_type;
    }
}