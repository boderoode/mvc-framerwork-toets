<h3><?= $data['title']?></h3>

<form action="<?= URLROOT; ?>/countries/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>Land:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Hoofdstad</td>
                <td><input type="text" name="CapitalCity" id="capitalCity"></td>
            </tr>
            <tr>
                <td>Continent</td>
                <td><input type="text" name="Continent" id="continent"></td>
            </tr>
            <tr>
                <td>Population</td>
                <td><input type="text" name="population" id="population"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </tbody>



    </table>




</form>