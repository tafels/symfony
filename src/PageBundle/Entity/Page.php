<?php

namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="PageBundle\Repository\PageRepository")
 */
class Page
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createddate", type="datetime")
     */
    private $createddate;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryBundle\Entity\Category", inversedBy="pages")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="CommentBundle\Entity\Comment", mappedBy="pages")
     */
    private $comments;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Page
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createddate
     *
     * @param \DateTime $createddate
     *
     * @return Page
     */
    public function setCreateddate($createddate)
    {
        $this->createddate = $createddate;

        return $this;
    }

    /**
     * Get createddate
     *
     * @return \DateTime
     */
    public function getCreateddate()
    {
        return $this->createddate;
    }

    /**
     * Set category
     *
     * @param \CategoryBundle\Entity\Category $category
     *
     * @return Page
     */
    public function setCategory(\CategoryBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \CategoryBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \CommentBundle\Entity\Comment $comment
     *
     * @return Page
     */
    public function addComment(\CommentBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->addPage($this);

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \CommentBundle\Entity\Comment $comment
     */
    public function removeComment(\CommentBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
