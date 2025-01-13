<div class="container">
    <div class="section">
        <h2>Ajouter une note</h2>
        <form action="controller.classe.php?action=SaveNote" method="POST">
          
            <div class="form-group">
                <label for="student">Étudiant :</label>
                <input type="text" id="student" name="student_log" value="<?php echo htmlspecialchars($_GET['student_log']); ?>" readonly>
            </div>
         
            <div class="form-group">
                <label for="prof">Professeur :</label>
                <input type="text" id="prof" name="prof_log" value="<?php echo htmlspecialchars($_GET['prof_log']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="student">Cours :</label>
                <input type="text" id="student" name="cours" value="<?php echo htmlspecialchars($_GET['course_titre']); ?>" readonly>
            </div>


            <!-- Note -->
            <div class="form-group">
                <label for="note">Note :</label>
                <input type="number" id="note" name="note" min="0" max="20" step="0.01" required>
            </div>

            <!-- Bouton d'envoi -->
            <div class="form-group">
                <button type="submit" class="btn">Ajouter la note</button>
            </div>
        </form>
    </div>
</div>
