<?php

namespace App\Entity;

use App\Entity\Tablahij;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tablamae
 *
 * @ORM\Table(name="tablamae")
 * @ORM\Entity
 */
class Tablamae
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    protected $nombre;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tablahij", mappedBy="idMae", cascade={"persist"})
     */
    protected $hijos;

    public function __construct()
    {
        $this->hijos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Tablahij[]
     */
    public function getHijos(): Collection
    {
        return $this->hijos;
    }

    public function addHijo(Tablahij $hijo): self
    {
        if (!$this->hijos->contains($hijo)) {
            $this->hijos[] = $hijo;
            $hijo->setIdMae($this);
        }

        return $this;
    }

    public function removeHijo(Tablahij $hijo): self
    {
        if ($this->hijos->contains($hijo)) {
            $this->hijos->removeElement($hijo);
            // set the owning side to null (unless already changed)
            if ($hijo->getIdMae() === $this) {
                $hijo->setIdMae(null);
            }
        }

        return $this;
    }

}
