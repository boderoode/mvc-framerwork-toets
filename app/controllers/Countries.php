<?php

class Countries extends Controller
{
    //properties
    private $countryModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->countryModel = $this->model('Country');
    }

    public function index($land = 'Nederland', $age = 67)
    {
        $records = $this->countryModel->getCountries();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Name</td>
                        <td>$items->CapitalCity</td>
                        <td>$items->Continent</td>
                        <td>$items->Population</td>
                        <td><a href='" . URLROOT . "/countries/update/$items->Id'>Update</a></td>
                        <td><a href='" . URLROOT . "/countries/delete/$items->Id'>Delete</a></td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht landen",
            'rows' => $rows,
            'Hallo' => "Hallo",
            'description' => "Hier kan je een overzicht van informatie vinden van allemaal verschillende landen,<br> Je kan hier de populatie, hoofdstad en land vinden. <br> Zo kan je meer informatie opdoen over andere landen",
            'onzin' => "Dit is een onzinnig stukje tekst"
        ];
        $this->view('countries/index', $data);
    }


    public function update($id = null)
    {

        //Controleer of er gepost wordt vanuit de view update.php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Maak het $_POST array schoon
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->countryModel->updateCountry($_POST);

            header("Location: " . URLROOT . "/country/index");
        }


        $record = $this->countryModel->getCountry($id);
        var_dump($record);


        $data = [
                'title' => 'Update Landen',
                'Id' => $record->Id,
                'name'=> $record->Name,
                'CapitalCity'=> $record->CapitalCity,
                'Continent'=> $record->Continent,
                'Population'=> $record->Population
        ];
        
        $this->view('countries/update', $data);
    }

    public function delete($id)
    {
        $result = $this->countryModel->deleteCountry($id);
        //var_dump($result);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/countries/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/countries/index");
        }
    }

    public function create()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //$_POST array schoonmaken
            filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->countryModel->createCountry($_POST);

            if($result){
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" .URLROOT . "/countries/index");
            } else{
                echo"Het invoeren is niet gelukt";
                header("Refresh:3; URL=" .URLROOT . "/countries/index");
            }
        }

        $data = [
            'title' => 'Voeg een nieuw land toe'
        ];
        $this->view('countries/create', $data);
    }

}



