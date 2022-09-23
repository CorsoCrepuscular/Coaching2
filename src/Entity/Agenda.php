<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda", uniqueConstraints={@ORM\UniqueConstraint(name="id_agenda_UNIQUE", columns={"idAgenda"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AgendaRepository")
 */
class Agenda
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAgenda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreAgenda", type="string", length=45, nullable=false)
     */
    private $nombreagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaAgenda", type="string", length=10, nullable=false)
     */
    private $fechaagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="horaAgenda", type="string", length=5, nullable=false)
     */
    private $horaagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="calleAgenda", type="string", length=45, nullable=false)
     */
    private $calleagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroAgenda", type="string", length=10, nullable=false)
     */
    private $numeroagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="localidadAgenda", type="string", length=45, nullable=false)
     */
    private $localidadagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="provinciaAgenda", type="string", length=45, nullable=false)
     */
    private $provinciaagenda;

    /**
     * @var string
     *
     * @ORM\Column(name="paisAgenda", type="string", length=45, nullable=false)
     */
    private $paisagenda;

    public function getIdagenda(): ?int
    {
        return $this->idagenda;
    }

    public function getNombreagenda(): ?string
    {
        return $this->nombreagenda;
    }

    public function setNombreagenda(string $nombreagenda): self
    {
        $this->nombreagenda = $nombreagenda;

        return $this;
    }

    public function getFechaagenda(): ?string
    {
        return $this->fechaagenda;
    }

    public function setFechaagenda(string $fechaagenda): self
    {
        $this->fechaagenda = $fechaagenda;

        return $this;
    }

    public function getHoraagenda(): ?string
    {
        return $this->horaagenda;
    }

    public function setHoraagenda(string $horaagenda): self
    {
        $this->horaagenda = $horaagenda;

        return $this;
    }

    public function getCalleagenda(): ?string
    {
        return $this->calleagenda;
    }

    public function setCalleagenda(string $calleagenda): self
    {
        $this->calleagenda = $calleagenda;

        return $this;
    }

    public function getNumeroagenda(): ?string
    {
        return $this->numeroagenda;
    }

    public function setNumeroagenda(string $numeroagenda): self
    {
        $this->numeroagenda = $numeroagenda;

        return $this;
    }

    public function getLocalidadagenda(): ?string
    {
        return $this->localidadagenda;
    }

    public function setLocalidadagenda(string $localidadagenda): self
    {
        $this->localidadagenda = $localidadagenda;

        return $this;
    }

    public function getProvinciaagenda(): ?string
    {
        return $this->provinciaagenda;
    }

    public function setProvinciaagenda(string $provinciaagenda): self
    {
        $this->provinciaagenda = $provinciaagenda;

        return $this;
    }

    public function getPaisagenda(): ?string
    {
        return $this->paisagenda;
    }

    public function setPaisagenda(string $paisagenda): self
    {
        $this->paisagenda = $paisagenda;

        return $this;
    }


}
