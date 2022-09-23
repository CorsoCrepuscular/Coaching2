<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="servicio", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombreServicio"}), @ORM\UniqueConstraint(name="descripcion_UNIQUE", columns={"descripcionServicio"}), @ORM\UniqueConstraint(name="id_servicio_UNIQUE", columns={"idServicio"})}, indexes={@ORM\Index(name="fk_servicio_carro1_idx", columns={"carro_idCarro"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ServicioRepository")
 */
class Servicio
{
    /**
     * @var int
     *
     * @ORM\Column(name="idServicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idservicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreServicio", type="string", length=45, nullable=false)
     */
    private $nombreservicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionServicio", type="string", length=70, nullable=false)
     */
    private $descripcionservicio;

    /**
     * @var int
     *
     * @ORM\Column(name="precioServicio", type="integer", nullable=false)
     */
    private $precioservicio;

    /**
     * @var \Carro|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Carro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carro_idCarro", referencedColumnName="idCarro")
     * })
     */
    private $carroIdcarro;

    public function getIdservicio(): ?int
    {
        return $this->idservicio;
    }

    public function getNombreservicio(): ?string
    {
        return $this->nombreservicio;
    }

    public function setNombreservicio(string $nombreservicio): self
    {
        $this->nombreservicio = $nombreservicio;

        return $this;
    }

    public function getDescripcionservicio(): ?string
    {
        return $this->descripcionservicio;
    }

    public function setDescripcionservicio(string $descripcionservicio): self
    {
        $this->descripcionservicio = $descripcionservicio;

        return $this;
    }

    public function getPrecioservicio(): ?int
    {
        return $this->precioservicio;
    }

    public function setPrecioservicio(int $precioservicio): self
    {
        $this->precioservicio = $precioservicio;

        return $this;
    }

    public function getCarroIdcarro(): ?Carro
    {
        return $this->carroIdcarro;
    }

    public function setCarroIdcarro(?Carro $carroIdcarro): self
    {
        $this->carroIdcarro = $carroIdcarro;

        return $this;
    }


}
