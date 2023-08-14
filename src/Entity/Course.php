<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $price = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: CourseFeedback::class, orphanRemoval: true)]
    private Collection $courseFeedback;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: CourseCategory::class)]
    private Collection $category;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Section::class)]
    private Collection $sections;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Enrollments::class)]
    private Collection $enrollments;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: InstructorCourse::class)]
    private Collection $instructorCourses;

    public function __construct()
    {
        $this->courseFeedbacks = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->sections = new ArrayCollection();
        $this->enrollments = new ArrayCollection();
        $this->instructorCourses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

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
            $courseFeedback->setCourse($this);
        }

        return $this;
    }

    public function removeCourseFeedback(CourseFeedback $courseFeedback): static
    {
        if ($this->courseFeedbacks->removeElement($courseFeedback)) {
            // set the owning side to null (unless already changed)
            if ($courseFeedback->getCourse() === $this) {
                $courseFeedback->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CourseCategory>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(CourseCategory $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setCourse($this);
        }

        return $this;
    }

    public function removeCategory(CourseCategory $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCourse() === $this) {
                $category->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): static
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
            $section->setCourse($this);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getCourse() === $this) {
                $section->setCourse(null);
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
            $enrollment->setCourse($this);
        }

        return $this;
    }

    public function removeEnrollment(Enrollments $enrollment): static
    {
        if ($this->enrollments->removeElement($enrollment)) {
            // set the owning side to null (unless already changed)
            if ($enrollment->getCourse() === $this) {
                $enrollment->setCourse(null);
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
            $instructorCourse->setCourse($this);
        }

        return $this;
    }

    public function removeInstructorCourse(InstructorCourse $instructorCourse): static
    {
        if ($this->instructorCourses->removeElement($instructorCourse)) {
            // set the owning side to null (unless already changed)
            if ($instructorCourse->getCourse() === $this) {
                $instructorCourse->setCourse(null);
            }
        }

        return $this;
    }
}
