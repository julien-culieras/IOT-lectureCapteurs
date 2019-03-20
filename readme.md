<h1>Routes API</h1>


<p>POST <strong>/api/isOnline</strong></p>
<p>Params : </p>
<ul>
    <li>address : string (adresse mac du raspberry)</li>
</ul>
<p>Retour : </p>
<ul>
    <li>success : boolean</li>
    <li>online : boolean</li>
    <li>messageError : string (si !success)</li>
</ul>

<br><br>

<p>POST <strong>/api/ping</strong></p>
<p>Params : </p>
<ul>
    <li>address : string (adresse mac du raspberry)</li>
</ul>
<p>Retour : </p>
<ul>
    <li>success : boolean</li>
    <li>messageError : string (si !success)</li>
    <li>sensors : Sensor[] (liste des capteurs enregistrés pour le raspberry
        <ul>
            <li>id</li>
            <li>address</li>
            <li>type_id</li>
            <li>raspberry_id</li>
            <li>created_at</li>
            <li>updated_at</li>
            <li>name</li>
            <li>refreshInterval</li>
        </ul>
    </li>
</ul>

<br><br>

<p>POST <strong>/api/postRecord</strong></p>
<p>Params : </p>
<ul>
    <li>address : string (adresse mac du raspberry)</li>
    <li>value : string</li>
</ul>
<p>Retour : </p>
<ul>
    <li>success : boolean</li>
    <li>messageError : string (si !success)</li>
</ul>
