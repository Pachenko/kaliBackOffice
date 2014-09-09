<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ThemeRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class Theme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     * @Groups({"Default"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image_slider_1", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $imageSliderFirst;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image_slider_2", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $imageSliderSecond;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image_slider_3", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $imageSliderThird;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_slider_1", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $urlSliderFirst;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_slider_2", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $urlSliderSecond;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_slider_3", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $urlSliderThird;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="type")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
    	$this->logo 		= '';
    	$this->slogan 		= '';
    	$this->titre 		= '';
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Theme
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     * @return Theme
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Theme
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }
    
    public function getUser() {
    	return $this->user;
    }
    
    public function setUser($user) {
    	$this->user = $user;
    }

    /**
     * Set imageSliderFirst
     *
     * @param string $imageSliderFirst
     * @return Theme
     */
    public function setImageSliderFirst($imageSliderFirst)
    {
        $this->imageSliderFirst = $imageSliderFirst;

        return $this;
    }

    /**
     * Get imageSliderFirst
     *
     * @return string 
     */
    public function getImageSliderFirst()
    {
        return $this->imageSliderFirst;
    }
    
    /**
     * Set imageSliderSecond
     *
     * @param string $imageSliderSecond
     * @return Theme
     */
    public function setImageSliderSecond($imageSliderSecond)
    {
    	$this->imageSliderSecond = $imageSliderSecond;
    
    	return $this;
    }
    
    /**
     * Get imageSliderSecond
     *
     * @return string
     */
    public function getImageSliderSecond()
    {
    	return $this->imageSliderSecond;
    }
    
    /**
     * Set imageSliderThird
     *
     * @param string $imageSliderThird
     * @return Theme
     */
    public function setImageSliderThird($imageSliderThird)
    {
    	$this->imageSliderThird = $imageSliderThird;
    
    	return $this;
    }
    
    /**
     * Get imageSliderThird
     *
     * @return string
     */
    public function getImageSliderThird()
    {
    	return $this->imageSliderThird;
    }
    
    /**
     * Set urlSliderFirst
     *
     * @param string $urlSliderFirst
     * @return Theme
     */
    public function setUrlSliderFirst($urlSliderFirst)
    {
    	$this->urlSliderFirst = $urlSliderFirst;
    
    	return $this;
    }
    
    /**
     * Get urlSliderFirst
     *
     * @return string
     */
    public function getUrlSliderFirst()
    {
    	return $this->urlSliderFirst;
    }
    
    /**
     * Set urlSliderSecond
     *
     * @param string $urlSliderSecond
     * @return Theme
     */
    public function setUrlSliderSecond($urlSliderSecond)
    {
    	$this->urlSliderSecond = $urlSliderSecond;
    
    	return $this;
    }
    
    /**
     * Get urlSliderSecond
     *
     * @return string
     */
    public function getUrlSliderSecond()
    {
    	return $this->urlSliderSecond;
    }
    
    /**
     * Set urlSliderThird
     *
     * @param string $urlSliderThird
     * @return Theme
     */
    public function setUrlSliderThird($urlSliderThird)
    {
    	$this->urlSliderThird = $urlSliderThird;
    
    	return $this;
    }
    
    /**
     * Get urlSliderThird
     *
     * @return string
     */
    public function getUrlSliderThird()
    {
    	return $this->urlSliderThird;
    }
    
    public function setLogoUpload($logoUpload) {
    	$this->logoUpload = $logoUpload;
    }
    
    public function getLogoUpload() {
    	return $this->logoUpload;
    }
    
    public function setSliderFirstUpload($sliderFirstUpload) {
    	$this->sliderFirstUpload = $sliderFirstUpload;
    }
    
    public function getSliderFirstUpload() {
    	return $this->sliderFirstUpload;
    }
    
    public function setSliderSecondUpload($sliderSecondUpload) {
    	$this->sliderSecondUpload = $sliderSecondUpload;
    }
    
    public function getSliderSecondUpload() {
    	return $this->sliderSecondUpload;
    }
    
    public function setSliderThirdUpload($sliderThirdUpload) {
    	$this->sliderThirdUpload = $sliderThirdUpload;
    }
    
    public function getSliderThirdUpload() {
    	return $this->sliderThirdUpload;
    }
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $logoUpload;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $sliderFirstUpload;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $sliderSecondUpload;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $sliderThirdUpload;
    
    public function getAbsoluteLogo()
    {
    	return null === $this->logo ? null : $this->getUploadRootDir() . '/' . $this->logo;
    }
    
    public function getWebLogo()
    {
    	return null === $this->logo ? null : $this->getUploadDir() . '/' . $this->logo;
    }
    
    public function getAbsoluteImageSliderFirst()
    {
    	return null === $this->imageSliderFirst ? null : $this->getUploadRootDir() . '/' . $this->imageSliderFirst;
    }
    
    public function getWebImageSliderFirst()
    {
    	return null === $this->imageSliderFirst ? null : $this->getUploadDir() . '/' . $this->imageSliderFirst;
    }
    
    public function getAbsoluteImageSliderSecond()
    {
    	return null === $this->imageSliderSecond ? null : $this->getUploadRootDir() . '/' . $this->imageSliderSecond;
    }
    
    public function getWebImageSliderSecond()
    {
    	return null === $this->imageSliderSecond ? null : $this->getUploadDir() . '/' . $this->imageSliderSecond;
    }
    
    public function getAbsoluteImageSliderThird()
    {
    	return null === $this->imageSliderThird ? null : $this->getUploadRootDir() . '/' . $this->imageSliderThird;
    }
    
    public function getWebImageSliderThird()
    {
    	return null === $this->imageSliderThird ? null : $this->getUploadDir() . '/' . $this->imageSliderThird;
    }
    
    protected function getUploadRootDir()
    {
    	return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	return 'uploads/themes';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
    	if(null !== $this->logoUpload) {
    		$this->logo = 'logo_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->logoUpload->guessExtension();
    	}
    	if(null !== $this->sliderFirstUpload) {
    		$this->imageSliderFirst = 'slider_1_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->sliderFirstUpload->guessExtension();
    	}
    	if(null !== $this->sliderSecondUpload) {
    		$this->imageSliderSecond = 'slider_2_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->sliderSecondUpload->guessExtension();
    	}
    	if(null !== $this->sliderThirdUpload) {
    		$this->imageSliderThird = 'slider_3_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->sliderThirdUpload->guessExtension();
    	}
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadFiles()
    {
    	if(null !== $this->logoUpload) {
    		$this->logoUpload->move($this->getUploadRootDir(), $this->logo);
    
    		unset($this->logoUpload);
    	}
    	if(null !== $this->sliderFirstUpload) {
    		$this->sliderFirstUpload->move($this->getUploadRootDir(), $this->imageSliderFirst);
    	
    		unset($this->sliderFirstUpload);
    	}
    	if(null !== $this->sliderSecondUpload) {
    		$this->sliderSecondUpload->move($this->getUploadRootDir(), $this->imageSliderSecond);
    	
    		unset($this->sliderSecondUpload);
    	}
    	if(null !== $this->sliderThirdUpload) {
    		$this->sliderThirdUpload->move($this->getUploadRootDir(), $this->imageSliderThird);
    	
    		unset($this->sliderThirdUpload);
    	}
    }
    
}
