<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[UniqueEntity('email')]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
    private ?int $tel_mobile = null;

    #[ORM\Column(nullable: true)]
    private ?int $tel_fixe = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min:2,max:100)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\Length(min:2,max:50)]
    private ?string $ville = null;

    #[ORM\Column(nullable: true)]
    private ?int $code_postale = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email()]
    #[Assert\Length(min:2, max:180)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

      /**
     * Variable $plainpassword pour confirmer mot de passe!
     *
     * @var string
     */
 private ?string $plainPassword = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    
    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    public function __construct() {
        $this->createdAt = new DateTimeImmutable();
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelMobile(): ?int
    {
        return $this->tel_mobile;
    }

    public function setTelMobile(?int $tel_mobile): static
    {
        $this->tel_mobile = $tel_mobile;

        return $this;
    }

    public function getTelFixe(): ?int
    {
        return $this->tel_fixe;
    }

    public function setTelFixe(?int $tel_fixe): static
    {
        $this->tel_fixe = $tel_fixe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostale(): ?int
    {
        return $this->code_postale;
    }

    public function setCodePostale(?int $code_postale): static
    {
        $this->code_postale = $code_postale;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

 /**
  * Get the value of plainPassword
  *
  * @return ?string
  */
 public function getPlainPassword(): ?string
 {
  return $this->plainPassword;
 }

 /**
  * Set the value of plainPassword
  *
  * @param ?string $plainPassword
  *
  * @return self
  */
 public function setPlainPassword(?string $plainPassword): self
 {
  $this->plainPassword = $plainPassword;

  return $this;
 }
}
