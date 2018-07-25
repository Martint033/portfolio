<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectLanguageRepository")
 */
class ProjectLanguage
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
    private $id_language;

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

    public function getIdLanguage(): ?int
    {
        return $this->id_language;
    }

    public function setIdLanguage(int $id_language): self
    {
        $this->id_language = $id_language;

        return $this;
    }
}
