<?php
class Notice
{
    private $id_notice;
    private $title;
    private $content;
    private $id_destin;
    private $status;
    private $create_date;

    // Getter e Setter para $id_notice
    public function getIdNotice()
    {
        return $this->id_notice;
    }

    public function setIdNotice($id_notice)
    {
        $this->id_notice = $id_notice;
    }

    // Getter e Setter para $title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter e Setter para $content
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // Getter e Setter para $id_destin
    public function getIdDestin()
    {
        return $this->id_destin;
    }

    public function setIdDestin($id_destin)
    {
        $this->id_destin = $id_destin;
    }

    // Getter e Setter para $status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter e Setter para $create_date
    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }
}
?>