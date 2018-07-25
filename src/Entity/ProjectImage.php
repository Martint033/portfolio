<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectImageRepository")
 */
class ProjectImage
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
    private $id_image;

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

    public function getIdImage(): ?int
    {
        return $this->id_image;
    }

    public function setIdImage(int $id_image): self
    {
        $this->id_image = $id_image;

        return $this;
    }
}
