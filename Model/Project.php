<?php

class Project
{
    private $id_project;
    private $description;
    private $scope;
    private $deadline;
    private $id_leader;
    private $status;
    private $create_date;
    private $update_date;

    // Getter e Setter para $id_project
    public function getIdProject()
    {
        return $this->id_project;
    }

    public function setIdProject($id_project)
    {
        $this->id_project = $id_project;
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

    // Getter e Setter para $scope
    public function getScope()
    {
        return $this->scope;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
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

    // Getter e Setter para $id_leader
    public function getIdLeader()
    {
        return $this->id_leader;
    }

    public function setIdLeader($id_leader)
    {
        $this->id_leader = $id_leader;
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