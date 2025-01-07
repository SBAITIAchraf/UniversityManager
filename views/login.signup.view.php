
    <style>
            .extra-fields {
                display: none; 
                margin-top: 10px;
            }
    </style>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">

                <form id="signupForm" action="../controller.classe.php/?action=Addprofil"  method="post">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">

              
                    <select id="status" name="statut" required="">
                        <option value="" placeholder="statut" disabled selected> Choisir le statut </option>
                        <option value="ADMIN">Administrateur</option>
                        <option value="PROF">Professeur</option>
                        <option value="STUD">Étudiant</option>
                    </select>

              
                    <div id="studentFields" class="extra-fields">
                        <input type="text" name="filiere" placeholder="Filière">
                        <input type="text" name="classe" placeholder="Classe">
                        <input type="file" name="photo" accept="image/*" placeholder="Photo de profil">
                    </div>

                    <div id="professorFields" class="extra-fields">
                        <input type="text" name="departement" placeholder="Département">
                        <input type="file" name="photo" accept="image/*" placeholder="Photo de profil">
                    </div>

                    <button>Sign up</button>
                </form>
            </div>

            <div class="login">
                <form   action="../controller.classe.php?action=show"  method="POST" >
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button>Login</button>
                </form>
            </div>
        </div>

        <script>
       
            document.getElementById('status').addEventListener('change', function () {
                const selectedStatus = this.value;
                const studentFields = document.getElementById('studentFields');
                const professorFields = document.getElementById('professorFields');

                studentFields.style.display = 'none';
                professorFields.style.display = 'none';

                if (selectedStatus === 'STUD') {
                    studentFields.style.display = 'block';
                } else if (selectedStatus === 'PROF') {
                    professorFields.style.display = 'block';
                }
            });
        </script>

