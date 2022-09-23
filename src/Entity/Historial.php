<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historial
 *
 * @ORM\Table(name="historial")
 * @ORM\Entity
 */
class Historial
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_historial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistorial;

    /**
     * @var string
     *
     * @ORM\Column(name="servicio", type="string", length=45, nullable=false)
     */
    private $servicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="importe", type="integer", nullable=false)
     */
    private $importe;


}
