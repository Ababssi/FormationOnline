<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Enum\UserRole;
use App\Entity\Enum\UserStatus;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\Table(name: '`users`')]
#[ApiResource]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'string',length: 255, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(type: 'string',length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bio = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $status = UserStatus::PENDING->value;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CourseFeedback::class, orphanRemoval: true)]
    private Collection $courseFeedbacks;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: LessonFeedback::class)]
    private Collection $lessonFeedbacks;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: StudentResult::class)]
    private Collection $studentResults;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: StudentResponse::class)]
    private Collection $studentResponses;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Certificate::class)]
    private Collection $certificates;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Enrollments::class)]
    private Collection $enrollments;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Notification::class)]
    private Collection $notifications;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: InstructorCourse::class)]
    private Collection $instructorCourses;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable('now');
        $this->courseFeedbacks = new ArrayCollection();
        $this->lessonFeedbacks = new ArrayCollection();
        $this->studentResults = new ArrayCollection();
        $this->studentResponses = new ArrayCollection();
        $this->certificates = new ArrayCollection();
        $this->enrollments = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        $this->instructorCourses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    public function getUserentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     * @return array<UserRole>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = UserRole::ROLE_GUEST->value;

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCreated(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreated(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getStatus(): UserStatus
    {
        return $this->status;
    }

    public function setStatus(UserStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, CourseFeedback>
     */
    public function getCourseFeedbacks(): Collection
    {
        return $this->courseFeedbacks;
    }

    public function addCourseFeedback(CourseFeedback $courseFeedback): static
    {
        if (!$this->courseFeedbacks->contains($courseFeedback)) {
            $this->courseFeedbacks->add($courseFeedback);
            $courseFeedback->setUser($this);
        }

        return $this;
    }

    public function removeCourseFeedback(CourseFeedback $courseFeedback): static
    {
        if ($this->courseFeedbacks->removeElement($courseFeedback)) {
            // set the owning side to null (unless already changed)
            if ($courseFeedback->getUser() === $this) {
                $courseFeedback->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LessonFeedback>
     */
    public function getLessonFeedbacks(): Collection
    {
        return $this->lessonFeedbacks;
    }

    public function addLessonFeedback(LessonFeedback $lessonFeedback): static
    {
        if (!$this->lessonFeedbacks->contains($lessonFeedback)) {
            $this->lessonFeedbacks->add($lessonFeedback);
            $lessonFeedback->setUser($this);
        }

        return $this;
    }

    public function removeLessonFeedback(LessonFeedback $lessonFeedback): static
    {
        if ($this->lessonFeedbacks->removeElement($lessonFeedback)) {
            // set the owning side to null (unless already changed)
            if ($lessonFeedback->getUser() === $this) {
                $lessonFeedback->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StudentResult>
     */
    public function getStudentResults(): Collection
    {
        return $this->studentResults;
    }

    public function addStudentResult(StudentResult $studentResult): static
    {
        if (!$this->studentResults->contains($studentResult)) {
            $this->studentResults->add($studentResult);
            $studentResult->setUser($this);
        }

        return $this;
    }

    public function removeStudentResult(StudentResult $studentResult): static
    {
        if ($this->studentResults->removeElement($studentResult)) {
            // set the owning side to null (unless already changed)
            if ($studentResult->getUser() === $this) {
                $studentResult->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StudentResponse>
     */
    public function getStudentResponses(): Collection
    {
        return $this->studentResponses;
    }

    public function addStudentResponse(StudentResponse $studentResponse): static
    {
        if (!$this->studentResponses->contains($studentResponse)) {
            $this->studentResponses->add($studentResponse);
            $studentResponse->setUser($this);
        }

        return $this;
    }

    public function removeStudentResponse(StudentResponse $studentResponse): static
    {
        if ($this->studentResponses->removeElement($studentResponse)) {
            // set the owning side to null (unless already changed)
            if ($studentResponse->getUser() === $this) {
                $studentResponse->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Certificate>
     */
    public function getCertificates(): Collection
    {
        return $this->certificates;
    }

    public function addCertificate(Certificate $certificate): static
    {
        if (!$this->certificates->contains($certificate)) {
            $this->certificates->add($certificate);
            $certificate->setUser($this);
        }

        return $this;
    }

    public function removeCertificate(Certificate $certificate): static
    {
        if ($this->certificates->removeElement($certificate)) {
            // set the owning side to null (unless already changed)
            if ($certificate->getUser() === $this) {
                $certificate->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Enrollments>
     */
    public function getEnrollments(): Collection
    {
        return $this->enrollments;
    }

    public function addEnrollment(Enrollments $enrollment): static
    {
        if (!$this->enrollments->contains($enrollment)) {
            $this->enrollments->add($enrollment);
            $enrollment->setUser($this);
        }

        return $this;
    }

    public function removeEnrollment(Enrollments $enrollment): static
    {
        if ($this->enrollments->removeElement($enrollment)) {
            // set the owning side to null (unless already changed)
            if ($enrollment->getUser() === $this) {
                $enrollment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Notification>
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): static
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications->add($notification);
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InstructorCourse>
     */
    public function getInstructorCourses(): Collection
    {
        return $this->instructorCourses;
    }

    public function addInstructorCourse(InstructorCourse $instructorCourse): static
    {
        if (!$this->instructorCourses->contains($instructorCourse)) {
            $this->instructorCourses->add($instructorCourse);
            $instructorCourse->setUser($this);
        }

        return $this;
    }

    public function removeInstructorCourse(InstructorCourse $instructorCourse): static
    {
        if ($this->instructorCourses->removeElement($instructorCourse)) {
            // set the owning side to null (unless already changed)
            if ($instructorCourse->getUser() === $this) {
                $instructorCourse->setUser(null);
            }
        }

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->firstname ?? $this->email;
    }

}
