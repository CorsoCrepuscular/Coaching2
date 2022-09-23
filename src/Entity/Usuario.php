<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"emailUsuario"}), @ORM\UniqueConstraint(name="keyword_UNIQUE", columns={"keywordUsuario"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="emailUsuario", type="string", length=40, nullable=false)
     * @ORM\Id

     */
    private $emailusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="keywordUsuario", type="string", length=10, nullable=false)
     */
    public $keywordusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="rolUsuario", type="string", length=10, nullable=false)
     */
    public $rolusuario;

    public function getEmailusuario(): ?string
    {
        return $this->emailusuario;
    }

    public function setEmailusuario(string $emailusuario): self
    {
        $this->emailusuario = $emailusuario;

        return $this;
    }

    public function getKeywordusuario(): ?string
    {
        return $this->keywordusuario;
    }

    public function setKeywordusuario(string $keywordusuario): self
    {
        $this->keywordusuario = $keywordusuario;

        return $this;
    }

    public function getRolusuario(): ?string
    {
        return $this->rolusuario;
    }

    public function setRolusuario(string $rolusuario): self
    {
        $this->rolusuario = $rolusuario;

        return $this;
    }
}

