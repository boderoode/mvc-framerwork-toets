<ul>
    <li>
        <a href="<?= URLROOT; ?>/landingpages/index">Ga terug naar de hoofdpagina!</a>
    </li>
</ul>

<h1><?= $data['title'] ?> <br></h1>
<h4><?= $data['description']?></h4>

<a href="<?= URLROOT ?>/countries/create">Nieuw record</a>

<table>
    <thead>
        <th>Id</th>
        <th>Naam</th>
        <th>Hoofdstad</th>
        <th>Continent</th>
        <th>Aantal Inwoners</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

<h1><?= $data['onzin']?></h1>
