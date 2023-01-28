<?php

namespace App\Entity;

use App\Repository\KlienciRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: KlienciRepository::class)]

  /** @UniqueEntity(
  * fields={"DataGodzina"},
  * errorPath="DataGodzina",
  * message="Wybierz inną godzinę ponieważ jest już ktoś zarejestrowany na tą godzinę."
  *)
  */
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
    /**
    * @Assert\GreaterThanOrEqual("today+1days")
    */
 
    private $DataGodzina;
    /**
    * @Assert\Length( 
    *  min=9,
    *  max=11,
    * minMessage = "Numer musi mieć przynajmniej 9 cyfr", 
    * maxMessage = "Numer powinien mieć maxymalnie 11 cyfr",
     * ) 
   */ 
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
