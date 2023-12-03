<?php
class Collaborator
{
    private $id_collaborator;
    private $first_name;
    private $last_name;
    private $phone;
    private $profession;
    private $resume;
    private $photo;
    private $email;
    private $password;
    private $linkdinUrl;
    private $twiterUrl;
    private $githubUrl;
    private $create_date;
    private $update_date;

    // Getter e Setter para id_collaborator
    public function getIdCollaborator()
    {
        return $this->id_collaborator;
    }

    public function setIdCollaborator($id_collaborator)
    {
        $this->id_collaborator = $id_collaborator;
    }

    // Getter e Setter para name
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }

    public function setFirstName($first_name)
    {
        $this->name = $first_name;
    }
    public function setLastName($last_name)
    {
        $this->name = $last_name;
    }

    // Getter e Setter para phone
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    // Getter e Setter para profession
    public function getProfession()
    {
        return $this->profession;
    }

    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    // Getter e Setter para resume
    public function getResume()
    {
        return $this->resume;
    }

    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    // Getter e Setter para photo
    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    // Getter e Setter para email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter e Setter para password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter e Setter para linkdinUrl
    public function getLinkdinUrl()
    {
        return $this->linkdinUrl;
    }

    public function setLinkdinUrl($linkdinUrl)
    {
        $this->linkdinUrl = $linkdinUrl;
    }

    // Getter e Setter para twitterUrl
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    public function setTwitterUrl($twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;
    }

    // Getter e Setter para githubUrl
    public function getGithubUrl()
    {
        return $this->githubUrl;
    }

    public function setGithubUrl($githubUrl)
    {
        $this->githubUrl = $githubUrl;
    }

    // Getter e Setter para create_date
    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    // Getter e Setter para update_date
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }


}

?>