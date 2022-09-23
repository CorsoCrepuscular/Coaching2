<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sesiones
 *
 * @ORM\Table(name="sesiones")
 * @ORM\Entity
 */
class Sesiones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_evento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=45, nullable=false)
     */
    private $lugar;

    /**
     * @var string
     *
     * @ORM\Column(name="horario", type="string", length=45, nullable=false)
     */
    private $horario;


}
