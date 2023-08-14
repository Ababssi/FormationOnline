<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizz')]
    private ?Lesson $lesson = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private array $questions = [];

    #[ORM\Column(nullable: true)]
    private ?array $questionsAndAnswers = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'quizz', targetEntity: StudentResponse::class)]
    private Collection $studentResponses;

    public function __construct()
    {
        $this->studentResponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): static
    {
        $this->lesson = $lesson;

        return $this;
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

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): static
    {
        $this->questions = $questions;

        return $this;
    }

    public function getQuestionsAndAnswers(): ?array
    {
        return $this->questionsAndAnswers;
    }

    public function setQuestionsAndAnswers(?array $questionsAndAnswers): static
    {
        $this->questionsAndAnswers = $questionsAndAnswers;

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
            $studentResponse->setQuizz($this);
        }

        return $this;
    }

    public function removeStudentResponse(StudentResponse $studentResponse): static
    {
        if ($this->studentResponses->removeElement($studentResponse)) {
            // set the owning side to null (unless already changed)
            if ($studentResponse->getQuizz() === $this) {
                $studentResponse->setQuizz(null);
            }
        }

        return $this;
    }
}
