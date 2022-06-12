<?php

namespace App\Entity;

use App\Repository\KlienciRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlienciRepository::class)]
class Klienci
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Imie;

    #[ORM\Column(type: 'string', length: 255)]
    private $RodzajUslugi;

    #[ORM\Column(type: 'datetime')]
    private $DataGodzina;

    #[ORM\Column(type: 'integer')]
    private $NumerTelefonu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImie(): ?string
    {
        return $this->Imie;
    }

    public function setImie(string $Imie): self
    {
        $this->Imie = $Imie;

        return $this;
    }

    public function getRodzajUslugi(): ?string
    {
        return $this->RodzajUslugi;
    }

    public function setRodzajUslugi(string $RodzajUslugi): self
    {
        $this->RodzajUslugi = $RodzajUslugi;

        return $this;
    }

    public function getDataGodzina(): ?\DateTimeInterface
    {
        return $this->DataGodzina;
    }

    public function setDataGodzina(\DateTimeInterface $DataGodzina): self
    {
        $this->DataGodzina = $DataGodzina;

        return $this;
    }

    public function getNumerTelefonu(): ?int
    {
        return $this->NumerTelefonu;
    }

    public function setNumerTelefonu(int $NumerTelefonu): self
    {
        $this->NumerTelefonu = $NumerTelefonu;

        return $this;
    }
}
