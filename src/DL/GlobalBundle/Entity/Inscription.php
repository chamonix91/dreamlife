<?php
/**
 * Created by PhpStorm.
 * User: chamseddin
 * Date: 24/10/2017
 * Time: 20:39
 */

namespace DL\GlobalBundle\Entity;


class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="address_id", type="integer", nullable=true)
     */
    private $addressId;

    /**
     * @var integer
     *
     * @ORM\Column(name="picture_id", type="integer", nullable=true)
     */
    private $pictureId;

    /**
     * @var integer
     *
     * @ORM\Column(name="recruiter_id", type="integer", nullable=true)
     */
    private $recruiterId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at",type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="tmp_password", type="string", length=255, nullable=true)
     */
    private $tmpPassword;


    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="string", length=20, nullable=true)
     */
    private $mobilePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=30, nullable=true)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="role_label", type="string", length=100, nullable=true)
     */
    private $roleLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=5, nullable=false)
     */
    private $locale = 'fr';

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=20, nullable=false)
     */
    private $gender = '';


    /**
     * @var boolean
     *
     * @ORM\Column(name="expired", type="boolean", nullable=false)
     */
    private $expired = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    private $locked = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="credentials_expired", type="boolean", nullable=false)
     */
    private $credentialsExpired = false;


    /**
     * @var \DateTime()
     *
     * @ORM\Column(name="validate_date", type="datetime", nullable=true)
     */
    private $validateDate;


    /**
     * @var boolean
     *
     * @ORM\Column(name="phone_validated", type="boolean", nullable=false)
     */
    private $phoneValidated = false;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_code", type="string", length=255, nullable=true)
     */
    private $phoneCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="phone_request_at", type="datetime", nullable=true)
     */
    private $phoneRequestAt;

    /**
     * @var string
     *
     * @ORM\Column(name="random_key", type="string", length=255, nullable=false)
     */
    private $randomKey;

    /**
     * @var string
     *
     * @ORM\Column(name="commercial_name", type="string", length=255, nullable=true)
     */
    private $commercialName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="document_type", type="string", length=255, nullable=true)
     */
    private $documentType;

    /**
     * @var string
     *
     * @ORM\Column(name="document_number", type="string", length=255, nullable=true)
     */
    private $documentNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=255, nullable=true)
     */
    private $rib;

    /**
     * @var string
     *
     * @ORM\Column(name="transfer_type", type="string", length=255, nullable=true)
     */
    private $transferType;

    /**
     * @var string
     *
     * @ORM\Column(name="promotion_code", type="string", length=255, nullable=true)
     */
    private $promotionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="chosen_tree_direction", type="string", length=255, nullable=true)
     */
    private $chosenTreeDirection;

    /**
     * @var string
     *
     * @ORM\Column(name="last_tree_direction", type="string", length=255, nullable=true)
     */
    private $lastTreeDirection;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=255, nullable=true)
     */
    private $siret;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="joined_at", type="datetime", nullable=true)
     */
    private $joinedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=255, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="document", type="string", length=255, nullable=true)
     */
    private $document;

    /**
     * @var string
     *
     * @ORM\Column(name="rib_document", type="string", length=255, nullable=true)
     */
    private $ribDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="invalid_email", type="string", length=255, nullable=true)
     */
    private $invalidEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="check_status", type="string", length=255, nullable=true)
     */
    private $checkStatus = 'status_partner';

    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;


    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255, nullable=true)
     */
    private $complement;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param int $addressId
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;
    }

    /**
     * @return int
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * @param int $pictureId
     */
    public function setPictureId($pictureId)
    {
        $this->pictureId = $pictureId;
    }

    /**
     * @return int
     */
    public function getRecruiterId()
    {
        return $this->recruiterId;
    }

    /**
     * @param int $recruiterId
     */
    public function setRecruiterId($recruiterId)
    {
        $this->recruiterId = $recruiterId;
    }

    /**
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getTmpPassword()
    {
        return $this->tmpPassword;
    }

    /**
     * @param string $tmpPassword
     */
    public function setTmpPassword($tmpPassword)
    {
        $this->tmpPassword = $tmpPassword;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param string $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getRoleLabel()
    {
        return $this->roleLabel;
    }

    /**
     * @param string $roleLabel
     */
    public function setRoleLabel($roleLabel)
    {
        $this->roleLabel = $roleLabel;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return boolean
     */
    public function isExpired()
    {
        return $this->expired;
    }

    /**
     * @param boolean $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @return boolean
     */
    public function isCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * @param boolean $credentialsExpired
     */
    public function setCredentialsExpired($credentialsExpired)
    {
        $this->credentialsExpired = $credentialsExpired;
    }

    /**
     * @return \DateTime
     */
    public function getValidateDate()
    {
        return $this->validateDate;
    }

    /**
     * @param \DateTime $validateDate
     */
    public function setValidateDate($validateDate)
    {
        $this->validateDate = $validateDate;
    }

    /**
     * @return boolean
     */
    public function isPhoneValidated()
    {
        return $this->phoneValidated;
    }

    /**
     * @param boolean $phoneValidated
     */
    public function setPhoneValidated($phoneValidated)
    {
        $this->phoneValidated = $phoneValidated;
    }

    /**
     * @return string
     */
    public function getPhoneCode()
    {
        return $this->phoneCode;
    }

    /**
     * @param string $phoneCode
     */
    public function setPhoneCode($phoneCode)
    {
        $this->phoneCode = $phoneCode;
    }

    /**
     * @return \DateTime
     */
    public function getPhoneRequestAt()
    {
        return $this->phoneRequestAt;
    }

    /**
     * @param \DateTime $phoneRequestAt
     */
    public function setPhoneRequestAt($phoneRequestAt)
    {
        $this->phoneRequestAt = $phoneRequestAt;
    }

    /**
     * @return string
     */
    public function getRandomKey()
    {
        return $this->randomKey;
    }

    /**
     * @param string $randomKey
     */
    public function setRandomKey($randomKey)
    {
        $this->randomKey = $randomKey;
    }

    /**
     * @return string
     */
    public function getCommercialName()
    {
        return $this->commercialName;
    }

    /**
     * @param string $commercialName
     */
    public function setCommercialName($commercialName)
    {
        $this->commercialName = $commercialName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param string $documentType
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
    }

    /**
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param string $documentNumber
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param string $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * @param string $rib
     */
    public function setRib($rib)
    {
        $this->rib = $rib;
    }

    /**
     * @return string
     */
    public function getTransferType()
    {
        return $this->transferType;
    }

    /**
     * @param string $transferType
     */
    public function setTransferType($transferType)
    {
        $this->transferType = $transferType;
    }

    /**
     * @return string
     */
    public function getPromotionCode()
    {
        return $this->promotionCode;
    }

    /**
     * @param string $promotionCode
     */
    public function setPromotionCode($promotionCode)
    {
        $this->promotionCode = $promotionCode;
    }

    /**
     * @return string
     */
    public function getChosenTreeDirection()
    {
        return $this->chosenTreeDirection;
    }

    /**
     * @param string $chosenTreeDirection
     */
    public function setChosenTreeDirection($chosenTreeDirection)
    {
        $this->chosenTreeDirection = $chosenTreeDirection;
    }

    /**
     * @return string
     */
    public function getLastTreeDirection()
    {
        return $this->lastTreeDirection;
    }

    /**
     * @param string $lastTreeDirection
     */
    public function setLastTreeDirection($lastTreeDirection)
    {
        $this->lastTreeDirection = $lastTreeDirection;
    }

    /**
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param string $siret
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    }

    /**
     * @return \DateTime
     */
    public function getJoinedAt()
    {
        return $this->joinedAt;
    }

    /**
     * @param \DateTime $joinedAt
     */
    public function setJoinedAt($joinedAt)
    {
        $this->joinedAt = $joinedAt;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function getRibDocument()
    {
        return $this->ribDocument;
    }

    /**
     * @param string $ribDocument
     */
    public function setRibDocument($ribDocument)
    {
        $this->ribDocument = $ribDocument;
    }

    /**
     * @return string
     */
    public function getInvalidEmail()
    {
        return $this->invalidEmail;
    }

    /**
     * @param string $invalidEmail
     */
    public function setInvalidEmail($invalidEmail)
    {
        $this->invalidEmail = $invalidEmail;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getCheckStatus()
    {
        return $this->checkStatus;
    }

    /**
     * @param string $checkStatus
     */
    public function setCheckStatus($checkStatus)
    {
        $this->checkStatus = $checkStatus;
    }

    /**
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param string $complement
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }


}