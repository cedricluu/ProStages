<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $mission;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseMail;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="stages")
     */
    private $entreprise;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class)
     */
    private $formation;

    public function __construct()
    {
        $this->formation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @return Collection|formation[]
     */
    public function getFormation(): Collection
    {
        return $this->formation;
    }

    public function addFormation(formation $formation): self
    {
        if (!$this->formation->contains($formation)) {
            $this->formation[] = $formation;
        }

        return $this;
    }

    public function removeFormation(formation $formation): self
    {
        $this->formation->removeElement($formation);

        return $this;
    }
}
