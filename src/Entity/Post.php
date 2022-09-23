<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", uniqueConstraints={@ORM\UniqueConstraint(name="body_UNIQUE", columns={"bodyPost"}), @ORM\UniqueConstraint(name="id_post_UNIQUE", columns={"idPost"}), @ORM\UniqueConstraint(name="titulo_UNIQUE", columns={"tituloPost"})}, indexes={@ORM\Index(name="fk_post_admin1_idx", columns={"admin_emailAdmin"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPost", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlPost", type="string", length=45, nullable=true)
     */
    private $urlpost;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloPost", type="string", length=45, nullable=false)
     */
    private $titulopost;

    /**
     * @var string
     *
     * @ORM\Column(name="bodyPost", type="text", length=65535, nullable=false)
     */
    private $bodypost;

    /**
     * @var \Admin|null
     *
     * @ORM\ManyToOne(targetEntity="Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="admin_emailAdmin", referencedColumnName="emailAdmin")
     * })
     */
    private $adminEmailadmin;

    public function getIdpost(): ?int
    {
        return $this->idpost;
    }

    public function getUrlpost(): ?string
    {
        return $this->urlpost;
    }

    public function setUrlpost(?string $urlpost): self
    {
        $this->urlpost = $urlpost;

        return $this;
    }

    public function getTitulopost(): ?string
    {
        return $this->titulopost;
    }

    public function setTitulopost(string $titulopost): self
    {
        $this->titulopost = $titulopost;

        return $this;
    }

    public function getBodypost(): ?string
    {
        return $this->bodypost;
    }

    public function setBodypost(string $bodypost): self
    {
        $this->bodypost = $bodypost;

        return $this;
    }

    public function getAdminEmailadmin(): ?Admin
    {
        return $this->adminEmailadmin;
    }

    public function setAdminEmailadmin(?Admin $adminEmailadmin): self
    {
        $this->adminEmailadmin = $adminEmailadmin;

        return $this;
    }


}
