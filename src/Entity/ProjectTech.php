<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectTechRepository")
 */
class ProjectTech
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_project;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_techno;

    public function getId()
    {
        return $this->id;
    }

    public function getIdProject(): ?int
    {
        return $this->id_project;
    }

    public function setIdProject(int $id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }

    public function getIdTechno(): ?int
    {
        return $this->id_techno;
    }

    public function setIdTechno(int $id_techno): self
    {
        $this->id_techno = $id_techno;

        return $this;
    }
}
