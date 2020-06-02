<?php

namespace App\Entity;


use App\Entity\Tablamae;
use Doctrine\ORM\Mapping as ORM;


/**
 * Tablahij
 *
 * @ORM\Table(name="tablahij", indexes={@ORM\Index(name="idMae", columns={"idMae"})})
 * @ORM\Entity
 */
class Tablahij
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $fecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="valor", type="string", length=1000, nullable=true)
     */
    private $valor;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="valorFecha", type="date", nullable=true)
     */
    private $valorfecha;

    /**
     * @var string
     *
     * @ORM\Column(name="Tipo", type="string", length=1, nullable=false, options={"default"="T","fixed"=true})
     */
    private $tipo = 'T';

    /**
     * @var \Tablamae
     *
     * @ORM\ManyToOne(targetEntity="Tablamae", inversedBy="hijos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMae", referencedColumnName="id")
     * })
     */
    private $idmae;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(?string $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getValorfecha(): ?\DateTimeInterface
    {
        return $this->valorfecha;
    }

    public function setValorfecha(?\DateTimeInterface $valorfecha): self
    {
        $this->valorfecha = $valorfecha;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getIdmae(): ?Tablamae
    {
        return $this->idmae;
    }

    public function setIdmae(?Tablamae $idmae): self
    {
        $this->idmae = $idmae;

        return $this;
    }



}
