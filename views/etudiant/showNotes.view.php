
<main class="table" id="customers_table">
        <section class="table__header">
            <h1>Notes</h1>
            <div class="input-group">
            <input type="search" placeholder="Search Data...">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Matiere <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Prof <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Note <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date d'ajout <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Statut <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                     foreach($result as $row){
                        echo'<tr>';
                        echo '<td>' . htmlspecialchars($row['course']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']) . '</td>';

                        echo '<td>'. htmlspecialchars($row['note']) . '</td>';
                        echo '<td>'. htmlspecialchars($row['date']) . '</td>';
                        if($row['note']>=10){
                            echo '<td>
                            <p class="status delivered">Validé</p>
                        </td>
                        </tr>';
                        }
                        elseif($row['note']<10){
                            echo '<td>
                            <p class="status cancelled">Non Validé</p>
                        </td>
                        </tr>';
                        }
                        else{
                            echo '<td>
                            <p class="status pending">____</p>
                        </td>
                        </tr>';
                        }

                     }  ?>
                </tbody>
            </table>
        </section>
    </main>