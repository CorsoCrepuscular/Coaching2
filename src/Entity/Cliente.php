<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="id_cliente_UNIQUE", columns={"dniCliente"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="dniCliente", type="integer", nullable=false)
     * @ORM\Id

     */
    private $dnicliente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreCliente", type="string", length=45, nullable=false)
     */
    private $nombrecliente;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidosCliente", type="string", length=45, nullable=false)
     */
    private $apellidoscliente;

    /**
     * @var string
     *
     * @ORM\Column(name="calleCliente", type="string", length=45, nullable=false)
     */
    private $callecliente;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroCliente", type="integer", nullable=false)
     */
    private $numerocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="localidadCliente", type="string", length=45, nullable=false)
     */
    private $localidadcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="provinciaCliente", type="string", length=45, nullable=false)
     */
    private $provinciacliente;

    /**
     * @var string
     *
     * @ORM\Column(name="paisCliente", type="string", length=45, nullable=false)
     */
    private $paiscliente;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoCliente", type="string", length=12, nullable=false)
     */
    private $telefonocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="emailCliente", type="string", length=45, nullable=false)
     */
    private $emailcliente;

    public function getDnicliente(): ?int
    {
        return $this->dnicliente;
    }

    public function setDnicliente(int $dnicliente): self
    {
        $this->dnicliente = $dnicliente;

        return $this;
    }


    public function getNombrecliente(): ?string
    {
        return $this->nombrecliente;
    }

    public function setNombrecliente(string $nombrecliente): self
    {
        $this->nombrecliente = $nombrecliente;

        return $this;
    }

    public function getApellidoscliente(): ?string
    {
        return $this->apellidoscliente;
    }

    public function setApellidoscliente(string $apellidoscliente): self
    {
        $this->apellidoscliente = $apellidoscliente;

        return $this;
    }

    public function getCallecliente(): ?string
    {
        return $this->callecliente;
    }

    public function setCallecliente(string $callecliente): self
    {
        $this->callecliente = $callecliente;

        return $this;
    }

    public function getNumerocliente(): ?int
    {
        return $this->numerocliente;
    }

    public function setNumerocliente(int $numerocliente): self
    {
        $this->numerocliente = $numerocliente;

        return $this;
    }

    public function getLocalidadcliente(): ?string
    {
        return $this->localidadcliente;
    }

    public function setLocalidadcliente(string $localidadcliente): self
    {
        $this->localidadcliente = $localidadcliente;

        return $this;
    }

    public function getProvinciacliente(): ?string
    {
        return $this->provinciacliente;
    }

    public function setProvinciacliente(string $provinciacliente): self
    {
        $this->provinciacliente = $provinciacliente;

        return $this;
    }

    public function getPaiscliente(): ?string
    {
        return $this->paiscliente;
    }

    public function setPaiscliente(string $paiscliente): self
    {
        $this->paiscliente = $paiscliente;

        return $this;
    }

    public function getTelefonocliente(): ?string
    {
        return $this->telefonocliente;
    }

    public function setTelefonocliente(string $telefonocliente): self
    {
        $this->telefonocliente = $telefonocliente;

        return $this;
    }

    public function getEmailcliente(): ?string
    {
        return $this->emailcliente;
    }

    public function setEmailcliente(string $emailcliente): self
    {
        $this->emailcliente = $emailcliente;

        return $this;
    }


}
