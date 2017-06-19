<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @var integer
     *
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     * @Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string
     * @Column(name="password", type="string", length=32)
     */
    protected $password;

    // Define setters/getters for all properties...

    public function getId(){
	return $this->id;
    }

    public function getName(){
	return $this->name;
    }

    public function getEmail(){
	return $this->email;
    }

    public function getPassword(){
	return $this->password;
    }
}

