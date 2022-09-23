<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"emailAdmin"}), @ORM\UniqueConstraint(name="keyword_UNIQUE", columns={"keywordAdmin"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @var string
     *
     * @ORM\Column(name="emailAdmin", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="keywordAdmin", type="string", length=10, nullable=false)
     */
    private $keywordadmin;

    public function getEmailadmin(): ?string
    {
        return $this->emailadmin;
    }

    public function getKeywordadmin(): ?string
    {
        return $this->keywordadmin;
    }

    public function setKeywordadmin(string $keywordadmin): self
    {
        $this->keywordadmin = $keywordadmin;

        return $this;
    }


}
