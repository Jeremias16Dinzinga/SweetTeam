<?php
class Task
{
    private $id_task;
    private $description;
    private $status;
    private $id_project;
    private $id_collaborator;
    private $deadline;
    private $create_date;
    private $update_date;

    // Getter e Setter para $id_task
    public function getIdTask()
    {
        return $this->id_task;
    }

    public function setIdTask($id_task)
    {
        $this->id_task = $id_task;
    }

    // Getter e Setter para $description
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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

    // Getter e Setter para $id_project
    public function getIdProject()
    {
        return $this->id_project;
    }

    public function setIdProject($id_project)
    {
        $this->id_project = $id_project;
    }

    // Getter e Setter para $id_collaborator
    public function getIdCollaborator()
    {
        return $this->id_collaborator;
    }

    public function setIdCollaborator($id_collaborator)
    {
        $this->id_collaborator = $id_collaborator;
    }

    // Getter e Setter para $deadline
    public function getDeadline()
    {
        return $this->deadline;
    }

    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
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

    // Getter e Setter para $update_date
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