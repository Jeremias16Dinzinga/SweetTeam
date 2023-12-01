<?php
class Message
{
    private $id_message;
    private $title;
    private $content;
    private $id_sender;
    private $id_destin;
    private $status;
    private $created_date;
    private $update_date;

    // Getter e Setter para id_message
    public function getIdMessage()
    {
        return $this->id_message;
    }

    public function setIdMessage($id_message)
    {
        $this->id_message = $id_message;
    }

    // Getter e Setter para title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter e Setter para content
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // Getter e Setter para id_sender
    public function getIdSender()
    {
        return $this->id_sender;
    }

    public function setIdSender($id_sender)
    {
        $this->id_sender = $id_sender;
    }

    // Getter e Setter para id_destin
    public function getIdDestin()
    {
        return $this->id_destin;
    }

    public function setIdDestin($id_destin)
    {
        $this->id_destin = $id_destin;
    }

    // Getter e Setter para status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter e Setter para created_date
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    public function setCreatedDate($created_date)
    {
        $this->created_date = $created_date;
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