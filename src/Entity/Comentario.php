<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario", uniqueConstraints={@ORM\UniqueConstraint(name="id_comentario_UNIQUE", columns={"idComentario"})}, indexes={@ORM\Index(name="fk_comentario_cliente1_idx", columns={"cliente_idCliente"}), @ORM\Index(name="fk_comentario_post1_idx", columns={"post_idPost"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioRepository")
 */
class Comentario
{
    /**
     * @var int
     *
     * @ORM\Column(name="idComentario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomentario;

    /**
     * @var string
     *
     * @ORM\Column(name="autorComentario", type="string", length=45, nullable=false)
     */
    private $autorcomentario;

    /**
     * @var string
     *
     * @ORM\Column(name="bodyComentario", type="text", length=65535, nullable=false)
     */
    private $bodycomentario;

    /**
     * @var \Cliente|null
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_idCliente", referencedColumnName="idCliente")
     * })
     */
    private $clienteIdcliente;

    /**
     * @var \Post|null
     *
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_idPost", referencedColumnName="idPost")
     * })
     */
    private $postIdpost;

    public function getIdcomentario(): ?int
    {
        return $this->idcomentario;
    }

    public function getAutorcomentario(): ?string
    {
        return $this->autorcomentario;
    }

    public function setAutorcomentario(string $autorcomentario): self
    {
        $this->autorcomentario = $autorcomentario;

        return $this;
    }

    public function getBodycomentario(): ?string
    {
        return $this->bodycomentario;
    }

    public function setBodycomentario(string $bodycomentario): self
    {
        $this->bodycomentario = $bodycomentario;

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

    public function getPostIdpost(): ?Post
    {
        return $this->postIdpost;
    }

    public function setPostIdpost(?Post $postIdpost): self
    {
        $this->postIdpost = $postIdpost;

        return $this;
    }


}
