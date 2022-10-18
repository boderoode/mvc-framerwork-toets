<?php

class RichestPeoples extends Controller
{
    //properties
    private $richestModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->richestModel = $this->model('RichestPeople');
    }

    public function index()
    {
        $records = $this->richestModel->getRichestPeople();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Name</td>
                        <td>$items->Nettoworth</td>
                        <td>$items->Age</td>
                        <td>$items->Company</td>
                        <td><a href='" . URLROOT . "/RichestPeople/delete/$items->Id'>Delete</a></td>
                      </tr>";
        }

        $data = [
            'title' => "Rijkste mensen",
            'rows' => $rows,
            'Hallo' => "Hallo",
            'description' => "Hier vind je een overzicht van de rijkste mensen van de wereld",
            'onzin' => "Dit is een onzinnig stukje tekst"
        ];
        $this->view('RichestPeople/index', $data);
    }


    public function delete($id)
    {
        $result = $this->richestModel->deleteRichestPeople($id);
        //var_dump($result);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/RichestPeople/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/RichestPeople/index");
        }
    }

    

}



