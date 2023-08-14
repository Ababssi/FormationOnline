<?php

namespace App\Entity;

use App\Repository\InstructorCourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstructorCourseRepository::class)]
class InstructorCourse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'instructorCourses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $course = null;

    #[ORM\ManyToOne(inversedBy: 'instructorCourses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'instructorCourse', targetEntity: InstructorFeedback::class)]
    private Collection $instructorFeedbacks;

    public function __construct()
    {
        $this->instructorFeedbacks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, InstructorFeedback>
     */
    public function getInstructorFeedbacks(): Collection
    {
        return $this->instructorFeedbacks;
    }

    public function addInstructorFeedback(InstructorFeedback $instructorFeedback): static
    {
        if (!$this->instructorFeedbacks->contains($instructorFeedback)) {
            $this->instructorFeedbacks->add($instructorFeedback);
            $instructorFeedback->setInstructorCourse($this);
        }

        return $this;
    }

    public function removeInstructorFeedback(InstructorFeedback $instructorFeedback): static
    {
        if ($this->instructorFeedbacks->removeElement($instructorFeedback)) {
            // set the owning side to null (unless already changed)
            if ($instructorFeedback->getInstructorCourse() === $this) {
                $instructorFeedback->setInstructorCourse(null);
            }
        }

        return $this;
    }
}