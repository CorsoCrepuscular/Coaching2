<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carro
 *
 * @ORM\Table(name="carro", uniqueConstraints={@ORM\UniqueConstraint(name="id_carro_UNIQUE", columns={"idCarro"})}, indexes={@ORM\Index(name="fk_carro_cliente1_idx", columns={"cliente_idCliente"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CarroRepository")
 */
class Carro
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCarro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcarro;

    /**
     * @var int
     *
     * @ORM\Column(name="importeTotalCarro", type="integer", nullable=false)
     */
    private $importetotalcarro;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaCarro", type="string", length=10, nullable=false)
     */
    private $fechacarro;

    /**
     * @var string
     *
     * @ORM\Column(name="modoPagoCarro", type="string", length=45, nullable=false)
     */
    private $modopagocarro;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaPagoCarro", type="string", length=45, nullable=false)
     */
    private $cuentapagocarro;

    /**
     * @var int
     *
     * @ORM\Column(name="facturaCarro", type="integer", nullable=false)
     */
    private $facturacarro;

    /**
     * @var \Cliente|null
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_idCliente", referencedColumnName="idCliente")
     * })
     */
    private $clienteIdcliente;

    public function getIdcarro(): ?int
    {
        return $this->idcarro;
    }

    public function getImportetotalcarro(): ?int
    {
        return $this->importetotalcarro;
    }

    public function setImportetotalcarro(int $importetotalcarro): self
    {
        $this->importetotalcarro = $importetotalcarro;

        return $this;
    }

    public function getFechacarro(): ?string
    {
        return $this->fechacarro;
    }

    public function setFechacarro(string $fechacarro): self
    {
        $this->fechacarro = $fechacarro;

        return $this;
    }

    public function getModopagocarro(): ?string
    {
        return $this->modopagocarro;
    }

    public function setModopagocarro(string $modopagocarro): self
    {
        $this->modopagocarro = $modopagocarro;

        return $this;
    }

    public function getCuentapagocarro(): ?string
    {
        return $this->cuentapagocarro;
    }

    public function setCuentapagocarro(string $cuentapagocarro): self
    {
        $this->cuentapagocarro = $cuentapagocarro;

        return $this;
    }

    public function getFacturacarro(): ?int
    {
        return $this->facturacarro;
    }

    public function setFacturacarro(int $facturacarro): self
    {
        $this->facturacarro = $facturacarro;

        return $this;
    }

    public function getClienteIdcliente(): ?Cliente
    {
        return $this->clienteIdcliente;
    }

    public function setClienteIdcliente(?Cliente $clienteIdcliente): self
    {
        $this->clienteIdcliente = $clienteIdcliente;

        return $this;
    }
}
