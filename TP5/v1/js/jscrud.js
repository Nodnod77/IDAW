function onFormSubmit() {
    event.preventDefault(); // empêche l'envoi du formulaire au serveur

    let nom = $("#inputNom").val();
    let prenom = $("#inputPrenom").val();
    let dateDeNaissance = $("#inputDateDeNaissance").val();
    let adoreLecours = $("#inputAdoreLeCours").is(":checked"); // Vérifie si la case est cochée
    let remarque = $('#inputRemarque').val();

    //oncrée une nouvelle ligne du tableau avec des cellules pour chaque donnée
    let newRow = `<tr>
      <td>${nom}</td>
      <td>${prenom}</td>
      <td>${dateDeNaissance}</td>
      <td>${adoreLecours ? 'Oui' : 'Non'}</td>
      <td>${remarque}</td>
      <td><button class="delete-btn">Delete</button></td>
      <td><button class="edit-btn">Edit</button></td>
    </tr>`;

    // Ajoute la nouvelle ligne au tableau
    $("#studentsTableBody").append(newRow);

    // on réinitialise les champs du formulaire
    $("#inputNom").val("");
    $("#inputPrenom").val("");
    $("#inputDateDeNaissance").val("");
    $("#inputAdoreLeCours").prop("checked", false);
    $('#inputRemarque').val("");

    // mets un gestionnaires d'événements aux boutons "Delete" et "Edit"
    attachEventHandlers();
}

// on attahee les gestionnaires d'événements avec la foncion aux boutons "Delete" et "Edit"
function attachEventHandlers() {
    $(".delete-btn").on("click", function() {
        // on supp la ligne parente (la ligne du tableau) lorsque le bouton "Delete" est cliqué
        $(this).closest("tr").remove();
    });

    $(".edit-btn").on("click", function() {

        // on affiche les données dans le formulaire pour les modifier
        let row = $(this).closest("tr");
        let nom = row.find("td:eq(0)").text();
        let prenom = row.find("td:eq(1)").text();
        let dateDeNaissance = row.find("td:eq(2)").text();
        let adoreLecours = row.find("td:eq(3)").text() === 'Oui';
        let remarque = row.find("td:eq(4)").text();

        // Pré-remplir le formulaire avec les données de la ligne pour la modification
        $("#inputNom").val(nom);
        $("#inputPrenom").val(prenom);
        $("#inputDateDeNaissance").val(dateDeNaissance);
        $("#inputAdoreLeCours").prop("checked", adoreLecours);
        $('#inputRemarque').val(remarque);

        // Supprimer la ligne du tableau
        row.remove();
    });
}

// on mets les gestionnaires d'événements aux boutons "Delete" et "Edit" existants
attachEventHandlers();
